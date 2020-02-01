export default function (js_elm) { // jquery selector
	this.lastDrag = 0;
	this.root = $(js_elm);
	this.separator = '<p class="delimiter p-3 m-0 w-100"></p>';
	
	this.findClosestContainer = function (htm_elm) {
		let isContainer = htm_elm.tagName.toLowerCase() === 'div' && !htm_elm.className.includes('no-nesting');
		let isRoot = htm_elm.isSameNode(this.root[0]);
		if (isContainer || isRoot) {
			return $(htm_elm);
		}
		return this.findClosestContainer(htm_elm.parentElement);
	}
	
	this.addSeparator = function (jq_elm) {
		jq_elm.after( $(this.separator) );
	}
	
	this.checkDescendent = function (child, parent) { // va fi folosita sa verific daca nu cumva container-ul e child al selectiei
		if (child.isSameNode(parent)) {
			return true;
		}
		if (child.isSameNode(this.root[0])) {
			return false;
		}
		return this.checkDescendent(child.parentElement, parent);
	}
	
	this.makeContainer = function (jq_elm) {
		this.addSeparator(jq_elm);
		jq_elm.attr('id', 'cms_'+Math.random().toString(36).substring(7));
		jq_elm.on('drop', function(e){
			let cascadeEvent = new Date().getTime() - this.lastDrag < 300;
			if (cascadeEvent) return;
			this.lastDrag = new Date().getTime();
			e.preventDefault();
			let transfered_id = e.originalEvent.dataTransfer.getData("transfered_id");
			let item = $('#'+transfered_id);
			let container = this.findClosestContainer(e.target);
			let target = $(e.target);
			let invalidMove = this.checkDescendent(target[0], item[0]) || item[0].tagName.toLowerCase() !== 'div';
			if (invalidMove) return;
			item.next('p').remove();
			if (container[0].isSameNode(e.target)) {
				container.append(item);
			} else {
				container.children().eq(target.index()).after(item);
			}
			this.addSeparator(item);
		}.bind(this));
		jq_elm.on('dragover', function (e){
			e.preventDefault();
		});
		
	}
	
	this.makeItem = function (jq_elm){
		jq_elm.attr('id', 'cms_'+Math.random().toString(36).substring(7));
		jq_elm.on('dragstart', function (e){
			e.originalEvent.dataTransfer.setData("transfered_id", e.target.id);
		}.bind(this));
		jq_elm.on('dragover', function (e){
			e.preventDefault();
		});
	}

	this.applyListeners = function (root) {
		// console.log(this)
		this.makeContainer(root);
		root.children().each(function(i, el) {
			let child = $(el);
			// console.log(this)
			this.makeItem(child);
			if (child.children().length) {
				this.applyListeners(child);
			}
		}.bind(this))
	}
	
	this.getNestLevel = function (element, max = 10) {
		let lvl = 0;
		for (let i=0; i<max; i++){
			if (element.isSameNode(this.root)){
				break;
			} else {
				element = element.parentElement;
				lvl++;
			}
		}
		return lvl;
	}
	
	this.applyListeners(this.root);
}

/*
$('.js-content-manager').on('drop', function (e){
	e.cancelBubble = true;
  e.preventDefault();
	
  let transfered_id = e.originalEvent.dataTransfer.getData("transfered_id");
	let transfered_elm = document.getElementById(transfered_id);
	let destination_elm = e.target;
	let root = $('.js-content-manager.root')[0];
	let transfered_elm_lvl = getNestLevel(transfered_elm, root);
	let destination_elm_lvl = getNestLevel(destination_elm, root);
	let allowNesting = root.dataset.nestingLevels.includes(destination_elm_lvl);
	
	if (transfered_elm.childElementCount > 0) {
		allowNesting = allowNesting && (root.dataset.nestingLevels.includes(transfered_elm_lvl+1));
	}
	if (allowNesting && transfered_elm_lvl === destination_elm_lvl) {
		// cand tragi un element peste un altul de acelasi lvl si se permite nesting-ul
		destination_elm.appendChild(transfered_elm);
	} else if (!allowNesting && transfered_elm_lvl === destination_elm_lvl) {
		if (destination_elm.clientHeight/2 < e.offsetY) {
			destination_elm.after(transfered_elm);
		} else {
			destination_elm.before(transfered_elm);
		}
	} else if (destination_elm_lvl < transfered_elm_lvl) {
		// cand despachetezi un item in mai multe bucati
		destination_elm.appendChild(transfered_elm);
	}
});*/