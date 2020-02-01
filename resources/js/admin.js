require('./public');

window.ClassicEditor = require('./ckeditor/ClassicEditor').default;
window.Tagify = require('@yaireo/tagify');
import debounce from 'lodash/debounce';
import ContentManager from './content_manager/content-manager';

$('.countMe').on('input change', function(e){
    let id = e.target.dataset.count;
    $('#'+id).text( e.target.value.length );
});

$('.cms-root').each(function(i, el){
	new ContentManager(el);
});

$('.photo-preview').on('change', function(){
    if (this.files && this.files[0]) {
        let id = this.dataset.preview;
        let reader = new FileReader();
        
        reader.onload = function(e) {
            let img = $('#'+id);
            img.attr('src', e.target.result);
            img.css('display', 'block');
        }

        reader.readAsDataURL(this.files[0]);
    }
});

$('.ck-editor').each( function(i, el){
    ClassicEditor
        .create( el )
        .then( editor => {
            el.style.display = 'block';
            console.log( Array.from( editor.ui.componentFactory.names() ) );
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        });
});

/*
    tagify
    <input type="text" [ optional
        data-debounce="400||100in cazul in care endpoint nu e url", 
        data-endpoint="url daca nu are ',', altfel e whitelist direct" ],
        data-pattern="regex string neingradit de '//'"
    >
    https://github.com/yairEO/tagify#installation
*/
$('.tagify-input').each( function(i, el){
    var endpoint = el.dataset.endpoint || '';
    var isUrlEndpoint = !endpoint.includes(',');
    var pattern = el.dataset.pattern ? new RegExp(el.dataset.pattern) : null;
    // in cazul in care e url, debounce, altfel debounce cat mai mic
    var debounce_time = el.dataset.debounce || (isUrlEndpoint ? 400 : 100);
    var whitelist = isUrlEndpoint ? [] : ( endpoint.split(',').map( tag => tag.trim() ) );
    var tagify = ( new Tagify(el, {whitelist, pattern}) )
        .on('input', debounce(function(e){
            if ( !endpoint || !isUrlEndpoint) return;
            let val = e.detail.value;
            if (val.length < 2) return;
            axios.get('/api/tags?like='+val)
                .then( function( res ){
                    tagify.settings.whitelist = res.data;
                    tagify.dropdown.show.call(tagify, val); // render the suggestions dropdown
                })
        }, debounce_time));
});

// $('#cms-submit').on('click', function(){
	// let data = _getContentRecursion( $('#js-form-content-manager-root') );
	// axios.post('/categories/remake', {data});
// })

// function _getContentRecursion(node, pl = []){
	// node.children().each(function(i, el) {
		// let elem = $(el);
		// if (elem.data('id')){
			// pl.push({
				// id: elem.data('id'),
				// category_id: node.data('id'),
				// name: elem.children('h5').text().trim()
			// });
		// }
		// if (elem.children().length) {
			// _getContentRecursion(elem, pl);
		// }
	// })
	// return pl;
// }
