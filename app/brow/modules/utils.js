'use strict';

var utils = function(application, privateScope) {
  this.createClass  = (function () {
    var self = this;

    function defineProps(target, props) {
      for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ('value' in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
      }
    }

    return function (Constructor, protoProps, staticProps) {
      if (protoProps) this.defineProps(Constructor.prototype, protoProps);
      if (staticProps) this.defineProps(Constructor, staticProps);
      return Constructor;
    };
  })();
  this.classCallCheck = function(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
      throw new TypeError('Cannot call a class as a function');
    }
  };
  this.inherits = function(subClass, superClass) {
    if (typeof superClass !== 'function' && superClass !== null) {
      throw new TypeError('Super expression must either be null or a function, not ' + typeof superClass);
    }
    subClass.prototype = Object.create(superClass && superClass.prototype, {
      constructor: {
        value: subClass,
        enumerable: false,
        writable: true,
        configurable: true
      }
    });
    if (superClass) subClass.__proto__ = superClass;
  };
  this.teleport = function(namespace) {
    if(typeof namespace === 'string') {
      if(typeof privateScope.namespaces[namespace] === 'object') {
        return privateScope.namespaces[namespace];
      } else {
        throw new ReferenceError('Can\'t teleport to unexisting namespace ' + namespace);
      }
    }
  };

  this.createBox = function(dependencies, callback) {

  }

  this.loadDependency = function(path) {
    path = {
      full: new String(path).toLowerCase(),
      route: path.full.toString().split(".")
    };
    console.log(path);
    if (typeof path.route === 'object' && path.route.length < 2) {
      throw new ReferenceError('Dependency cannot be loaded due to wrong path: ' + path);
      return {
        _loaded: false
      };
    }
    if (path.route[0] === 'root') {
      path.module = './' + path.route[1];
    } else {
      path.module = './' + path.route.join("/");
    }

    var loadedModule = require(path.module);
    // review this
    if (loadedModule.prototype.initializer === 'function') {
      loadedModule.prototype.initializer(application, privateScope);
    }

    return loadedModule;
  }
};

module.exports = utils;