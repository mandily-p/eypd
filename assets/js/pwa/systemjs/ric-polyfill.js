System.register([],function(){"use strict";return{setters:[],execute:function(){window.requestIdleCallback=window.requestIdleCallback||function(a){return setTimeout(function(){var b=Date.now();a({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-b))}})},1)},window.cancelIdleCallback=window.cancelIdleCallback||function(a){clearTimeout(a)}}}});