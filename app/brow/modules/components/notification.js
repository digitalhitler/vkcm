notifier = (function(w, d) {

  count = 0;

  myCreateElement = function(elem, attrs) {
    var el = d.createElement(elem);
    for (prop in attrs) {
      el.setAttribute(prop, attrs[prop]);
    }
    return el;
  }

  createContainer = function() {
    var container = myCreateElement('div', {class: 'notifier-container', id: 'notifier-container'});
    d.body.appendChild(container);
  }

  show = function(title, msg, type, icon, timeout) {

    if (typeof timeout != 'number') timeout = 0;

    var container = d.querySelector('.notifier-container'),
        ntf       = myCreateElement('div', {class: 'notifier ' + type}),
        ntfTitle  = myCreateElement('h2',  {class: 'notifier-title'}),
        ntfBody   = myCreateElement('div', {class: 'notifier-body'}),
        ntfImg    = myCreateElement('div', {class: 'notifier-img'}),
        img       = myCreateElement('img', {class: 'img', src: icon}),
        ntfClose  = myCreateElement('button',{class: 'notifier-close', type: 'button'});

    ntfTitle.innerHTML = title;
    ntfBody.innerHTML  = msg;
    ntfClose.innerHTML = '&times;';

    if (icon.length > 0) {
      ntfImg.appendChild(img);
    }

    ntf.appendChild(ntfClose);
    ntf.appendChild(ntfImg);
    ntf.appendChild(ntfTitle);
    ntf.appendChild(ntfBody);

    container.appendChild(ntf);

    ntfImg.style.height = ntfImg.parentNode.offsetHeight + 'px' || null;

    count += 1;

    setTimeout(function() {
      ntf.className += ' shown';
      ntf.setAttribute('id', 'notifier-' + count);
    }, 100);

    if (timeout != 0) {

      setTimeout(function() {
        hide(ntf)
      }, timeout);

    }

    ntfClose.addEventListener('click', function() {
      hide(ntf);
    });

    return ntf;

  }

  hide = function(elem) {

    elem.className = elem.className.replace(' shown', '');

    setTimeout(function() {
      elem.parentNode.removeChild(elem);
    }, 600);

  }

  createContainer();

  return {
    show: show,
    hide: hide
  }

})(window, document);