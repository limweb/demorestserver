var commonjsGlobal = typeof globalThis !== "undefined" ? globalThis : typeof window !== "undefined" ? window : typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : {};
function getDefaultExportFromCjs(x) {
  return x && x.__esModule && Object.prototype.hasOwnProperty.call(x, "default") ? x["default"] : x;
}
function createCommonjsModule(fn, basedir, module) {
  return module = {
    path: basedir,
    exports: {},
    require: function(path, base) {
      return commonjsRequire(path, base === void 0 || base === null ? module.path : base);
    }
  }, fn(module, module.exports), module.exports;
}
function commonjsRequire() {
  throw new Error("Dynamic requires are not currently supported by @rollup/plugin-commonjs");
}
var vueCuteTimeline = createCommonjsModule(function(module, exports) {
  (function(global2, factory) {
    factory(exports);
  })(commonjsGlobal, function(exports2) {
    (function() {
      if (typeof document !== "undefined") {
        var head = document.head || document.getElementsByTagName("head")[0], style = document.createElement("style"), css = " .timeline { padding: 0; position: relative; list-style: none; font-family: PingFangSC-light, Avenir, Helvetica, Arial, Hiragino Sans GB, Microsoft YaHei, sans-serif; -webkit-font-smoothing: antialiased; margin: 10px 20px; } .timeline:after { position: absolute; content: ''; left: 0; top: 0; width: 1px; height: 100%; background-color: var(--timelineTheme); } .timeline-item { position: relative; margin: 1.5em 0 0 28px; padding-bottom: 1.5em; border-bottom: 1px dotted var(--timelineTheme); } .timeline-item:last-child { border-bottom: none; } .timeline-circle { position: absolute; top: .28em; left: -34px; width: 10px; height: 10px; border-radius: 50%; border: 1px solid var(--timelineTheme); background-color: var(--timelineTheme); z-index: 1; box-sizing: content-box; } .timeline-circle.hollow { background-color: var(--timelineBg); } .timeline-title { position: relative; display: inline-block; /** * BFC inline-block \u5143\u7D20\u4E0E\u5176\u5144\u5F1F\u5143\u7D20\u3001\u5B50\u5143\u7D20\u548C\u7236\u5143\u7D20\u7684\u5916\u8FB9\u8DDD\u90FD\u4E0D\u4F1A\u6298\u53E0\uFF08\u5305\u62EC\u5176\u7236\u5143\u7D20\u548C\u5B50\u5143\u7D20\uFF09 */ cursor: crosshair; margin: -.15em 0 15px 28px } .timeline-title:not(:first-child) { margin-top: 28px; } .timeline-title-circle { left: -36px; top: .15em; width: 16px; height: 16px; } .timeline-others { width: 40px; height: auto; top: .2em; left: -48px; line-height: 1; padding: 2px 0; text-align: center; border: none; background-color: var(--timelineBg); } ";
        style.type = "text/css";
        if (style.styleSheet) {
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
      }
    })();
    var Timeline2 = {
      render: function() {
        var _vm = this;
        var _h = _vm.$createElement;
        var _c = _vm._self._c || _h;
        return _c("ul", {ref: "timeline", staticClass: "timeline"}, [_vm._t("default")], 2);
      },
      staticRenderFns: [],
      name: "Timeline",
      props: {
        timelineTheme: {
          type: String,
          default: "#dbdde0"
        },
        timelineBg: {
          type: String,
          default: "#fff"
        }
      },
      mounted: function mounted() {
        var timeline = this.$refs.timeline;
        timeline.style.setProperty("--timelineTheme", this.timelineTheme);
        timeline.style.setProperty("--timelineBg", this.timelineBg);
      }
    };
    (function() {
      if (typeof document !== "undefined") {
        var head = document.head || document.getElementsByTagName("head")[0], style = document.createElement("style"), css = "";
        style.type = "text/css";
        if (style.styleSheet) {
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
      }
    })();
    var timelineItemBase = {
      name: "TimelineItemBase",
      props: {
        bgColor: {
          type: String,
          default: ""
        },
        lineColor: {
          type: String,
          default: ""
        },
        hollow: {
          type: Boolean,
          default: false
        },
        fontColor: {
          type: String,
          default: "#37414a"
        }
      },
      data: function data() {
        return {
          slotOthers: false
        };
      },
      computed: {
        circleStyle: function circleStyle() {
          if (!this.bgColor && !this.lineColor && !this.hollow) {
            return;
          }
          var style = {};
          if (this.bgColor) {
            style = {
              "border-color": this.bgColor,
              "background-color": this.bgColor
            };
          }
          if (this.lineColor) {
            style = Object.assign({}, style, {
              "border-color": this.lineColor
            });
          }
          return style;
        },
        itemStyle: function itemStyle() {
          return {
            color: this.fontColor
          };
        },
        slotClass: function slotClass() {
          var className = "";
          if (this.slotOthers) {
            className = "timeline-others";
          } else if (this.hollow) {
            className = "hollow";
          }
          return className;
        }
      },
      mounted: function mounted() {
        this.slotOthers = !!this.$refs.others.innerHTML;
      }
    };
    (function() {
      if (typeof document !== "undefined") {
        var head = document.head || document.getElementsByTagName("head")[0], style = document.createElement("style"), css = "";
        style.type = "text/css";
        if (style.styleSheet) {
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
      }
    })();
    var TimelineItem2 = {
      render: function() {
        var _vm = this;
        var _h = _vm.$createElement;
        var _c = _vm._self._c || _h;
        return _c("li", {staticClass: "timeline-item", style: _vm.itemStyle}, [_c("div", {ref: "others", staticClass: "timeline-circle", class: _vm.slotClass, style: _vm.circleStyle}, [_vm._t("others")], 2), _vm._v(" "), _vm._t("default")], 2);
      },
      staticRenderFns: [],
      extends: timelineItemBase
    };
    (function() {
      if (typeof document !== "undefined") {
        var head = document.head || document.getElementsByTagName("head")[0], style = document.createElement("style"), css = "";
        style.type = "text/css";
        if (style.styleSheet) {
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }
        head.appendChild(style);
      }
    })();
    var TimelineTitle2 = {
      render: function() {
        var _vm = this;
        var _h = _vm.$createElement;
        var _c = _vm._self._c || _h;
        return _c("li", {staticClass: "timeline-title", style: _vm.itemStyle}, [_c("div", {ref: "others", staticClass: "timeline-circle timeline-title-circle", class: _vm.slotClass, style: _vm.circleStyle}, [_vm._t("others")], 2), _vm._v(" "), _vm._t("default")], 2);
      },
      staticRenderFns: [],
      extends: timelineItemBase
    };
    if (typeof window !== "undefined" && window.Vue) {
      window.Vue.component(Timeline2.name, Timeline2);
      window.Vue.component(TimelineItem2.name, TimelineItem2);
      window.Vue.component(TimelineTitle2.name, TimelineTitle2);
    }
    exports2.Timeline = Timeline2;
    exports2.TimelineItem = TimelineItem2;
    exports2.TimelineTitle = TimelineTitle2;
    Object.defineProperty(exports2, "__esModule", {value: true});
  });
});
var __pika_web_default_export_for_treeshaking__ = /* @__PURE__ */ getDefaultExportFromCjs(vueCuteTimeline);
var Timeline = vueCuteTimeline.Timeline;
var TimelineItem = vueCuteTimeline.TimelineItem;
var TimelineTitle = vueCuteTimeline.TimelineTitle;
export default __pika_web_default_export_for_treeshaking__;
export {Timeline, TimelineItem, TimelineTitle, vueCuteTimeline as __moduleExports};
