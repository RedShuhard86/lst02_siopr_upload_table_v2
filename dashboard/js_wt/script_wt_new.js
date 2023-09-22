/*! jQuery v1.12.4 | (c) jQuery Foundation | jquery.org/license */
!function (a, b) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = a.document ? b(a, !0) : function (a) {
        if (!a.document) throw new Error("jQuery requires a window with a document");
        return b(a)
    } : b(a)
}("undefined" != typeof window ? window : this, function (a, b) {
    var c = [], d = a.document, e = c.slice, f = c.concat, g = c.push, h = c.indexOf, i = {}, j = i.toString,
        k = i.hasOwnProperty, l = {}, m = "1.12.4", n = function (a, b) {
            return new n.fn.init(a, b)
        }, o = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, p = /^-ms-/, q = /-([\da-z])/gi, r = function (a, b) {
            return b.toUpperCase()
        };
    n.fn = n.prototype = {
        jquery: m, constructor: n, selector: "", length: 0, toArray: function () {
            return e.call(this)
        }, get: function (a) {
            return null != a ? 0 > a ? this[a + this.length] : this[a] : e.call(this)
        }, pushStack: function (a) {
            var b = n.merge(this.constructor(), a);
            return b.prevObject = this, b.context = this.context, b
        }, each: function (a) {
            return n.each(this, a)
        }, map: function (a) {
            return this.pushStack(n.map(this, function (b, c) {
                return a.call(b, c, b)
            }))
        }, slice: function () {
            return this.pushStack(e.apply(this, arguments))
        }, first: function () {
            return this.eq(0)
        }, last: function () {
            return this.eq(-1)
        }, eq: function (a) {
            var b = this.length, c = +a + (0 > a ? b : 0);
            return this.pushStack(c >= 0 && b > c ? [this[c]] : [])
        }, end: function () {
            return this.prevObject || this.constructor()
        }, push: g, sort: c.sort, splice: c.splice
    }, n.extend = n.fn.extend = function () {
        var a, b, c, d, e, f, g = arguments[0] || {}, h = 1, i = arguments.length, j = !1;
        for ("boolean" == typeof g && (j = g, g = arguments[h] || {}, h++), "object" == typeof g || n.isFunction(g) || (g = {}), h === i && (g = this, h--); i > h; h++) if (null != (e = arguments[h])) for (d in e) a = g[d], c = e[d], g !== c && (j && c && (n.isPlainObject(c) || (b = n.isArray(c))) ? (b ? (b = !1, f = a && n.isArray(a) ? a : []) : f = a && n.isPlainObject(a) ? a : {}, g[d] = n.extend(j, f, c)) : void 0 !== c && (g[d] = c));
        return g
    }, n.extend({
        expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (a) {
            throw new Error(a)
        }, noop: function () {
        }, isFunction: function (a) {
            return "function" === n.type(a)
        }, isArray: Array.isArray || function (a) {
            return "array" === n.type(a)
        }, isWindow: function (a) {
            return null != a && a == a.window
        }, isNumeric: function (a) {
            var b = a && a.toString();
            return !n.isArray(a) && b - parseFloat(b) + 1 >= 0
        }, isEmptyObject: function (a) {
            var b;
            for (b in a) return !1;
            return !0
        }, isPlainObject: function (a) {
            var b;
            if (!a || "object" !== n.type(a) || a.nodeType || n.isWindow(a)) return !1;
            try {
                if (a.constructor && !k.call(a, "constructor") && !k.call(a.constructor.prototype, "isPrototypeOf")) return !1
            } catch (c) {
                return !1
            }
            if (!l.ownFirst) for (b in a) return k.call(a, b);
            for (b in a) ;
            return void 0 === b || k.call(a, b)
        }, type: function (a) {
            return null == a ? a + "" : "object" == typeof a || "function" == typeof a ? i[j.call(a)] || "object" : typeof a
        }, globalEval: function (b) {
            b && n.trim(b) && (a.execScript || function (b) {
                a.eval.call(a, b)
            })(b)
        }, camelCase: function (a) {
            return a.replace(p, "ms-").replace(q, r)
        }, nodeName: function (a, b) {
            return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase()
        }, each: function (a, b) {
            var c, d = 0;
            if (s(a)) {
                for (c = a.length; c > d; d++) if (b.call(a[d], d, a[d]) === !1) break
            } else for (d in a) if (b.call(a[d], d, a[d]) === !1) break;
            return a
        }, trim: function (a) {
            return null == a ? "" : (a + "").replace(o, "")
        }, makeArray: function (a, b) {
            var c = b || [];
            return null != a && (s(Object(a)) ? n.merge(c, "string" == typeof a ? [a] : a) : g.call(c, a)), c
        }, inArray: function (a, b, c) {
            var d;
            if (b) {
                if (h) return h.call(b, a, c);
                for (d = b.length, c = c ? 0 > c ? Math.max(0, d + c) : c : 0; d > c; c++) if (c in b && b[c] === a) return c
            }
            return -1
        }, merge: function (a, b) {
            var c = +b.length, d = 0, e = a.length;
            while (c > d) a[e++] = b[d++];
            if (c !== c) while (void 0 !== b[d]) a[e++] = b[d++];
            return a.length = e, a
        }, grep: function (a, b, c) {
            for (var d, e = [], f = 0, g = a.length, h = !c; g > f; f++) d = !b(a[f], f), d !== h && e.push(a[f]);
            return e
        }, map: function (a, b, c) {
            var d, e, g = 0, h = [];
            if (s(a)) for (d = a.length; d > g; g++) e = b(a[g], g, c), null != e && h.push(e); else for (g in a) e = b(a[g], g, c), null != e && h.push(e);
            return f.apply([], h)
        }, guid: 1, proxy: function (a, b) {
            var c, d, f;
            return "string" == typeof b && (f = a[b], b = a, a = f), n.isFunction(a) ? (c = e.call(arguments, 2), d = function () {
                return a.apply(b || this, c.concat(e.call(arguments)))
            }, d.guid = a.guid = a.guid || n.guid++, d) : void 0
        }, now: function () {
            return +new Date
        }, support: l
    }), "function" == typeof Symbol && (n.fn[Symbol.iterator] = c[Symbol.iterator]), n.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (a, b) {
        i["[object " + b + "]"] = b.toLowerCase()
    });

    function s(a) {
        var b = !!a && "length" in a && a.length, c = n.type(a);
        return "function" === c || n.isWindow(a) ? !1 : "array" === c || 0 === b || "number" == typeof b && b > 0 && b - 1 in a
    }

    var t = function (a) {
        var b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u = "sizzle" + 1 * new Date,
            v = a.document, w = 0, x = 0, y = ga(), z = ga(), A = ga(), B = function (a, b) {
                return a === b && (l = !0), 0
            }, C = 1 << 31, D = {}.hasOwnProperty, E = [], F = E.pop, G = E.push, H = E.push, I = E.slice,
            J = function (a, b) {
                for (var c = 0, d = a.length; d > c; c++) if (a[c] === b) return c;
                return -1
            },
            K = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            L = "[\\x20\\t\\r\\n\\f]", M = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            N = "\\[" + L + "*(" + M + ")(?:" + L + "*([*^$|!~]?=)" + L + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + M + "))|)" + L + "*\\]",
            O = ":(" + M + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + N + ")*)|.*)\\)|)",
            P = new RegExp(L + "+", "g"),
            Q = new RegExp("^" + L + "+|((?:^|[^\\\\])(?:\\\\.)*)" + L + "+$", "g"),
            R = new RegExp("^" + L + "*," + L + "*"), S = new RegExp("^" + L + "*([>+~]|" + L + ")" + L + "*"),
            T = new RegExp("=" + L + "*([^\\]'\"]*?)" + L + "*\\]", "g"), U = new RegExp(O),
            V = new RegExp("^" + M + "$"), W = {
                ID: new RegExp("^#(" + M + ")"),
                CLASS: new RegExp("^\\.(" + M + ")"),
                TAG: new RegExp("^(" + M + "|[*])"),
                ATTR: new RegExp("^" + N),
                PSEUDO: new RegExp("^" + O),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + L + "*(even|odd|(([+-]|)(\\d*)n|)" + L + "*(?:([+-]|)" + L + "*(\\d+)|))" + L + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + K + ")$", "i"),
                needsContext: new RegExp("^" + L + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + L + "*((?:-\\d)?\\d*)" + L + "*\\)|)(?=[^-]|$)", "i")
            }, X = /^(?:input|select|textarea|button)$/i, Y = /^h\d$/i, Z = /^[^{]+\{\s*\[native \w/,
            $ = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, _ = /[+~]/, aa = /'|\\/g,
            ba = new RegExp("\\\\([\\da-f]{1,6}" + L + "?|(" + L + ")|.)", "ig"), ca = function (a, b, c) {
                var d = "0x" + b - 65536;
                return d !== d || c ? b : 0 > d ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320)
            }, da = function () {
                m()
            };
        try {
            H.apply(E = I.call(v.childNodes), v.childNodes), E[v.childNodes.length].nodeType
        } catch (ea) {
            H = {
                apply: E.length ? function (a, b) {
                    G.apply(a, I.call(b))
                } : function (a, b) {
                    var c = a.length, d = 0;
                    while (a[c++] = b[d++]) ;
                    a.length = c - 1
                }
            }
        }

        function fa(a, b, d, e) {
            var f, h, j, k, l, o, r, s, w = b && b.ownerDocument, x = b ? b.nodeType : 9;
            if (d = d || [], "string" != typeof a || !a || 1 !== x && 9 !== x && 11 !== x) return d;
            if (!e && ((b ? b.ownerDocument || b : v) !== n && m(b), b = b || n, p)) {
                if (11 !== x && (o = $.exec(a))) if (f = o[1]) {
                    if (9 === x) {
                        if (!(j = b.getElementById(f))) return d;
                        if (j.id === f) return d.push(j), d
                    } else if (w && (j = w.getElementById(f)) && t(b, j) && j.id === f) return d.push(j), d
                } else {
                    if (o[2]) return H.apply(d, b.getElementsByTagName(a)), d;
                    if ((f = o[3]) && c.getElementsByClassName && b.getElementsByClassName) return H.apply(d, b.getElementsByClassName(f)), d
                }
                if (c.qsa && !A[a + " "] && (!q || !q.test(a))) {
                    if (1 !== x) w = b, s = a; else if ("object" !== b.nodeName.toLowerCase()) {
                        (k = b.getAttribute("id")) ? k = k.replace(aa, "\\$&") : b.setAttribute("id", k = u), r = g(a), h = r.length, l = V.test(k) ? "#" + k : "[id='" + k + "']";
                        while (h--) r[h] = l + " " + qa(r[h]);
                        s = r.join(","), w = _.test(a) && oa(b.parentNode) || b
                    }
                    if (s) try {
                        return H.apply(d, w.querySelectorAll(s)), d
                    } catch (y) {
                    } finally {
                        k === u && b.removeAttribute("id")
                    }
                }
            }
            return i(a.replace(Q, "$1"), b, d, e)
        }

        function ga() {
            var a = [];

            function b(c, e) {
                return a.push(c + " ") > d.cacheLength && delete b[a.shift()], b[c + " "] = e
            }

            return b
        }

        function ha(a) {
            return a[u] = !0, a
        }

        function ia(a) {
            var b = n.createElement("div");
            try {
                return !!a(b)
            } catch (c) {
                return !1
            } finally {
                b.parentNode && b.parentNode.removeChild(b), b = null
            }
        }

        function ja(a, b) {
            var c = a.split("|"), e = c.length;
            while (e--) d.attrHandle[c[e]] = b
        }

        function ka(a, b) {
            var c = b && a,
                d = c && 1 === a.nodeType && 1 === b.nodeType && (~b.sourceIndex || C) - (~a.sourceIndex || C);
            if (d) return d;
            if (c) while (c = c.nextSibling) if (c === b) return -1;
            return a ? 1 : -1
        }

        function la(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return "input" === c && b.type === a
            }
        }

        function ma(a) {
            return function (b) {
                var c = b.nodeName.toLowerCase();
                return ("input" === c || "button" === c) && b.type === a
            }
        }

        function na(a) {
            return ha(function (b) {
                return b = +b, ha(function (c, d) {
                    var e, f = a([], c.length, b), g = f.length;
                    while (g--) c[e = f[g]] && (c[e] = !(d[e] = c[e]))
                })
            })
        }

        function oa(a) {
            return a && "undefined" != typeof a.getElementsByTagName && a
        }

        c = fa.support = {}, f = fa.isXML = function (a) {
            var b = a && (a.ownerDocument || a).documentElement;
            return b ? "HTML" !== b.nodeName : !1
        }, m = fa.setDocument = function (a) {
            var b, e, g = a ? a.ownerDocument || a : v;
            return g !== n && 9 === g.nodeType && g.documentElement ? (n = g, o = n.documentElement, p = !f(n), (e = n.defaultView) && e.top !== e && (e.addEventListener ? e.addEventListener("unload", da, !1) : e.attachEvent && e.attachEvent("onunload", da)), c.attributes = ia(function (a) {
                return a.className = "i", !a.getAttribute("className")
            }), c.getElementsByTagName = ia(function (a) {
                return a.appendChild(n.createComment("")), !a.getElementsByTagName("*").length
            }), c.getElementsByClassName = Z.test(n.getElementsByClassName), c.getById = ia(function (a) {
                return o.appendChild(a).id = u, !n.getElementsByName || !n.getElementsByName(u).length
            }), c.getById ? (d.find.ID = function (a, b) {
                if ("undefined" != typeof b.getElementById && p) {
                    var c = b.getElementById(a);
                    return c ? [c] : []
                }
            }, d.filter.ID = function (a) {
                var b = a.replace(ba, ca);
                return function (a) {
                    return a.getAttribute("id") === b
                }
            }) : (delete d.find.ID, d.filter.ID = function (a) {
                var b = a.replace(ba, ca);
                return function (a) {
                    var c = "undefined" != typeof a.getAttributeNode && a.getAttributeNode("id");
                    return c && c.value === b
                }
            }), d.find.TAG = c.getElementsByTagName ? function (a, b) {
                return "undefined" != typeof b.getElementsByTagName ? b.getElementsByTagName(a) : c.qsa ? b.querySelectorAll(a) : void 0
            } : function (a, b) {
                var c, d = [], e = 0, f = b.getElementsByTagName(a);
                if ("*" === a) {
                    while (c = f[e++]) 1 === c.nodeType && d.push(c);
                    return d
                }
                return f
            }, d.find.CLASS = c.getElementsByClassName && function (a, b) {
                return "undefined" != typeof b.getElementsByClassName && p ? b.getElementsByClassName(a) : void 0
            }, r = [], q = [], (c.qsa = Z.test(n.querySelectorAll)) && (ia(function (a) {
                o.appendChild(a).innerHTML = "<a id='" + u + "'></a><select id='" + u + "-\r\\' msallowcapture=''><option selected=''></option></select>", a.querySelectorAll("[msallowcapture^='']").length && q.push("[*^$]=" + L + "*(?:''|\"\")"), a.querySelectorAll("[selected]").length || q.push("\\[" + L + "*(?:value|" + K + ")"), a.querySelectorAll("[id~=" + u + "-]").length || q.push("~="), a.querySelectorAll(":checked").length || q.push(":checked"), a.querySelectorAll("a#" + u + "+*").length || q.push(".#.+[+~]")
            }), ia(function (a) {
                var b = n.createElement("input");
                b.setAttribute("type", "hidden"), a.appendChild(b).setAttribute("name", "D"), a.querySelectorAll("[name=d]").length && q.push("name" + L + "*[*^$|!~]?="), a.querySelectorAll(":enabled").length || q.push(":enabled", ":disabled"), a.querySelectorAll("*,:x"), q.push(",.*:")
            })), (c.matchesSelector = Z.test(s = o.matches || o.webkitMatchesSelector || o.mozMatchesSelector || o.oMatchesSelector || o.msMatchesSelector)) && ia(function (a) {
                c.disconnectedMatch = s.call(a, "div"), s.call(a, "[s!='']:x"), r.push("!=", O)
            }), q = q.length && new RegExp(q.join("|")), r = r.length && new RegExp(r.join("|")), b = Z.test(o.compareDocumentPosition), t = b || Z.test(o.contains) ? function (a, b) {
                var c = 9 === a.nodeType ? a.documentElement : a, d = b && b.parentNode;
                return a === d || !(!d || 1 !== d.nodeType || !(c.contains ? c.contains(d) : a.compareDocumentPosition && 16 & a.compareDocumentPosition(d)))
            } : function (a, b) {
                if (b) while (b = b.parentNode) if (b === a) return !0;
                return !1
            }, B = b ? function (a, b) {
                if (a === b) return l = !0, 0;
                var d = !a.compareDocumentPosition - !b.compareDocumentPosition;
                return d ? d : (d = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1, 1 & d || !c.sortDetached && b.compareDocumentPosition(a) === d ? a === n || a.ownerDocument === v && t(v, a) ? -1 : b === n || b.ownerDocument === v && t(v, b) ? 1 : k ? J(k, a) - J(k, b) : 0 : 4 & d ? -1 : 1)
            } : function (a, b) {
                if (a === b) return l = !0, 0;
                var c, d = 0, e = a.parentNode, f = b.parentNode, g = [a], h = [b];
                if (!e || !f) return a === n ? -1 : b === n ? 1 : e ? -1 : f ? 1 : k ? J(k, a) - J(k, b) : 0;
                if (e === f) return ka(a, b);
                c = a;
                while (c = c.parentNode) g.unshift(c);
                c = b;
                while (c = c.parentNode) h.unshift(c);
                while (g[d] === h[d]) d++;
                return d ? ka(g[d], h[d]) : g[d] === v ? -1 : h[d] === v ? 1 : 0
            }, n) : n
        }, fa.matches = function (a, b) {
            return fa(a, null, null, b)
        }, fa.matchesSelector = function (a, b) {
            if ((a.ownerDocument || a) !== n && m(a), b = b.replace(T, "='$1']"), c.matchesSelector && p && !A[b + " "] && (!r || !r.test(b)) && (!q || !q.test(b))) try {
                var d = s.call(a, b);
                if (d || c.disconnectedMatch || a.document && 11 !== a.document.nodeType) return d
            } catch (e) {
            }
            return fa(b, n, null, [a]).length > 0
        }, fa.contains = function (a, b) {
            return (a.ownerDocument || a) !== n && m(a), t(a, b)
        }, fa.attr = function (a, b) {
            (a.ownerDocument || a) !== n && m(a);
            var e = d.attrHandle[b.toLowerCase()],
                f = e && D.call(d.attrHandle, b.toLowerCase()) ? e(a, b, !p) : void 0;
            return void 0 !== f ? f : c.attributes || !p ? a.getAttribute(b) : (f = a.getAttributeNode(b)) && f.specified ? f.value : null
        }, fa.error = function (a) {
            throw new Error("Syntax error, unrecognized expression: " + a)
        }, fa.uniqueSort = function (a) {
            var b, d = [], e = 0, f = 0;
            if (l = !c.detectDuplicates, k = !c.sortStable && a.slice(0), a.sort(B), l) {
                while (b = a[f++]) b === a[f] && (e = d.push(f));
                while (e--) a.splice(d[e], 1)
            }
            return k = null, a
        }, e = fa.getText = function (a) {
            var b, c = "", d = 0, f = a.nodeType;
            if (f) {
                if (1 === f || 9 === f || 11 === f) {
                    if ("string" == typeof a.textContent) return a.textContent;
                    for (a = a.firstChild; a; a = a.nextSibling) c += e(a)
                } else if (3 === f || 4 === f) return a.nodeValue
            } else while (b = a[d++]) c += e(b);
            return c
        }, d = fa.selectors = {
            cacheLength: 50,
            createPseudo: ha,
            match: W,
            attrHandle: {},
            find: {},
            relative: {
                ">": {dir: "parentNode", first: !0},
                " ": {dir: "parentNode"},
                "+": {dir: "previousSibling", first: !0},
                "~": {dir: "previousSibling"}
            },
            preFilter: {
                ATTR: function (a) {
                    return a[1] = a[1].replace(ba, ca), a[3] = (a[3] || a[4] || a[5] || "").replace(ba, ca), "~=" === a[2] && (a[3] = " " + a[3] + " "), a.slice(0, 4)
                }, CHILD: function (a) {
                    return a[1] = a[1].toLowerCase(), "nth" === a[1].slice(0, 3) ? (a[3] || fa.error(a[0]), a[4] = +(a[4] ? a[5] + (a[6] || 1) : 2 * ("even" === a[3] || "odd" === a[3])), a[5] = +(a[7] + a[8] || "odd" === a[3])) : a[3] && fa.error(a[0]), a
                }, PSEUDO: function (a) {
                    var b, c = !a[6] && a[2];
                    return W.CHILD.test(a[0]) ? null : (a[3] ? a[2] = a[4] || a[5] || "" : c && U.test(c) && (b = g(c, !0)) && (b = c.indexOf(")", c.length - b) - c.length) && (a[0] = a[0].slice(0, b), a[2] = c.slice(0, b)), a.slice(0, 3))
                }
            },
            filter: {
                TAG: function (a) {
                    var b = a.replace(ba, ca).toLowerCase();
                    return "*" === a ? function () {
                        return !0
                    } : function (a) {
                        return a.nodeName && a.nodeName.toLowerCase() === b
                    }
                }, CLASS: function (a) {
                    var b = y[a + " "];
                    return b || (b = new RegExp("(^|" + L + ")" + a + "(" + L + "|$)")) && y(a, function (a) {
                        return b.test("string" == typeof a.className && a.className || "undefined" != typeof a.getAttribute && a.getAttribute("class") || "")
                    })
                }, ATTR: function (a, b, c) {
                    return function (d) {
                        var e = fa.attr(d, a);
                        return null == e ? "!=" === b : b ? (e += "", "=" === b ? e === c : "!=" === b ? e !== c : "^=" === b ? c && 0 === e.indexOf(c) : "*=" === b ? c && e.indexOf(c) > -1 : "$=" === b ? c && e.slice(-c.length) === c : "~=" === b ? (" " + e.replace(P, " ") + " ").indexOf(c) > -1 : "|=" === b ? e === c || e.slice(0, c.length + 1) === c + "-" : !1) : !0
                    }
                }, CHILD: function (a, b, c, d, e) {
                    var f = "nth" !== a.slice(0, 3), g = "last" !== a.slice(-4), h = "of-type" === b;
                    return 1 === d && 0 === e ? function (a) {
                        return !!a.parentNode
                    } : function (b, c, i) {
                        var j, k, l, m, n, o, p = f !== g ? "nextSibling" : "previousSibling", q = b.parentNode,
                            r = h && b.nodeName.toLowerCase(), s = !i && !h, t = !1;
                        if (q) {
                            if (f) {
                                while (p) {
                                    m = b;
                                    while (m = m[p]) if (h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) return !1;
                                    o = p = "only" === a && !o && "nextSibling"
                                }
                                return !0
                            }
                            if (o = [g ? q.firstChild : q.lastChild], g && s) {
                                m = q, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n && j[2], m = n && q.childNodes[n];
                                while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) if (1 === m.nodeType && ++t && m === b) {
                                    k[a] = [w, n, t];
                                    break
                                }
                            } else if (s && (m = b, l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), j = k[a] || [], n = j[0] === w && j[1], t = n), t === !1) while (m = ++n && m && m[p] || (t = n = 0) || o.pop()) if ((h ? m.nodeName.toLowerCase() === r : 1 === m.nodeType) && ++t && (s && (l = m[u] || (m[u] = {}), k = l[m.uniqueID] || (l[m.uniqueID] = {}), k[a] = [w, t]), m === b)) break;
                            return t -= e, t === d || t % d === 0 && t / d >= 0
                        }
                    }
                }, PSEUDO: function (a, b) {
                    var c,
                        e = d.pseudos[a] || d.setFilters[a.toLowerCase()] || fa.error("unsupported pseudo: " + a);
                    return e[u] ? e(b) : e.length > 1 ? (c = [a, a, "", b], d.setFilters.hasOwnProperty(a.toLowerCase()) ? ha(function (a, c) {
                        var d, f = e(a, b), g = f.length;
                        while (g--) d = J(a, f[g]), a[d] = !(c[d] = f[g])
                    }) : function (a) {
                        return e(a, 0, c)
                    }) : e
                }
            },
            pseudos: {
                not: ha(function (a) {
                    var b = [], c = [], d = h(a.replace(Q, "$1"));
                    return d[u] ? ha(function (a, b, c, e) {
                        var f, g = d(a, null, e, []), h = a.length;
                        while (h--) (f = g[h]) && (a[h] = !(b[h] = f))
                    }) : function (a, e, f) {
                        return b[0] = a, d(b, null, f, c), b[0] = null, !c.pop()
                    }
                }), has: ha(function (a) {
                    return function (b) {
                        return fa(a, b).length > 0
                    }
                }), contains: ha(function (a) {
                    return a = a.replace(ba, ca), function (b) {
                        return (b.textContent || b.innerText || e(b)).indexOf(a) > -1
                    }
                }), lang: ha(function (a) {
                    return V.test(a || "") || fa.error("unsupported lang: " + a), a = a.replace(ba, ca).toLowerCase(), function (b) {
                        var c;
                        do if (c = p ? b.lang : b.getAttribute("xml:lang") || b.getAttribute("lang")) return c = c.toLowerCase(), c === a || 0 === c.indexOf(a + "-"); while ((b = b.parentNode) && 1 === b.nodeType);
                        return !1
                    }
                }), target: function (b) {
                    var c = a.location && a.location.hash;
                    return c && c.slice(1) === b.id
                }, root: function (a) {
                    return a === o
                }, focus: function (a) {
                    return a === n.activeElement && (!n.hasFocus || n.hasFocus()) && !!(a.type || a.href || ~a.tabIndex)
                }, enabled: function (a) {
                    return a.disabled === !1
                }, disabled: function (a) {
                    return a.disabled === !0
                }, checked: function (a) {
                    var b = a.nodeName.toLowerCase();
                    return "input" === b && !!a.checked || "option" === b && !!a.selected
                }, selected: function (a) {
                    return a.parentNode && a.parentNode.selectedIndex, a.selected === !0
                }, empty: function (a) {
                    for (a = a.firstChild; a; a = a.nextSibling) if (a.nodeType < 6) return !1;
                    return !0
                }, parent: function (a) {
                    return !d.pseudos.empty(a)
                }, header: function (a) {
                    return Y.test(a.nodeName)
                }, input: function (a) {
                    return X.test(a.nodeName)
                }, button: function (a) {
                    var b = a.nodeName.toLowerCase();
                    return "input" === b && "button" === a.type || "button" === b
                }, text: function (a) {
                    var b;
                    return "input" === a.nodeName.toLowerCase() && "text" === a.type && (null == (b = a.getAttribute("type")) || "text" === b.toLowerCase())
                }, first: na(function () {
                    return [0]
                }), last: na(function (a, b) {
                    return [b - 1]
                }), eq: na(function (a, b, c) {
                    return [0 > c ? c + b : c]
                }), even: na(function (a, b) {
                    for (var c = 0; b > c; c += 2) a.push(c);
                    return a
                }), odd: na(function (a, b) {
                    for (var c = 1; b > c; c += 2) a.push(c);
                    return a
                }), lt: na(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; --d >= 0;) a.push(d);
                    return a
                }), gt: na(function (a, b, c) {
                    for (var d = 0 > c ? c + b : c; ++d < b;) a.push(d);
                    return a
                })
            }
        }, d.pseudos.nth = d.pseudos.eq;
        for (b in{radio: !0, checkbox: !0, file: !0, password: !0, image: !0}) d.pseudos[b] = la(b);
        for (b in{submit: !0, reset: !0}) d.pseudos[b] = ma(b);

        function pa() {
        }

        pa.prototype = d.filters = d.pseudos, d.setFilters = new pa, g = fa.tokenize = function (a, b) {
            var c, e, f, g, h, i, j, k = z[a + " "];
            if (k) return b ? 0 : k.slice(0);
            h = a, i = [], j = d.preFilter;
            while (h) {
                c && !(e = R.exec(h)) || (e && (h = h.slice(e[0].length) || h), i.push(f = [])), c = !1, (e = S.exec(h)) && (c = e.shift(), f.push({
                    value: c,
                    type: e[0].replace(Q, " ")
                }), h = h.slice(c.length));
                for (g in d.filter) !(e = W[g].exec(h)) || j[g] && !(e = j[g](e)) || (c = e.shift(), f.push({
                    value: c,
                    type: g,
                    matches: e
                }), h = h.slice(c.length));
                if (!c) break
            }
            return b ? h.length : h ? fa.error(a) : z(a, i).slice(0)
        };

        function qa(a) {
            for (var b = 0, c = a.length, d = ""; c > b; b++) d += a[b].value;
            return d
        }

        function ra(a, b, c) {
            var d = b.dir, e = c && "parentNode" === d, f = x++;
            return b.first ? function (b, c, f) {
                while (b = b[d]) if (1 === b.nodeType || e) return a(b, c, f)
            } : function (b, c, g) {
                var h, i, j, k = [w, f];
                if (g) {
                    while (b = b[d]) if ((1 === b.nodeType || e) && a(b, c, g)) return !0
                } else while (b = b[d]) if (1 === b.nodeType || e) {
                    if (j = b[u] || (b[u] = {}), i = j[b.uniqueID] || (j[b.uniqueID] = {}), (h = i[d]) && h[0] === w && h[1] === f) return k[2] = h[2];
                    if (i[d] = k, k[2] = a(b, c, g)) return !0
                }
            }
        }

        function sa(a) {
            return a.length > 1 ? function (b, c, d) {
                var e = a.length;
                while (e--) if (!a[e](b, c, d)) return !1;
                return !0
            } : a[0]
        }

        function ta(a, b, c) {
            for (var d = 0, e = b.length; e > d; d++) fa(a, b[d], c);
            return c
        }

        function ua(a, b, c, d, e) {
            for (var f, g = [], h = 0, i = a.length, j = null != b; i > h; h++) (f = a[h]) && (c && !c(f, d, e) || (g.push(f), j && b.push(h)));
            return g
        }

        function va(a, b, c, d, e, f) {
            return d && !d[u] && (d = va(d)), e && !e[u] && (e = va(e, f)), ha(function (f, g, h, i) {
                var j, k, l, m = [], n = [], o = g.length, p = f || ta(b || "*", h.nodeType ? [h] : h, []),
                    q = !a || !f && b ? p : ua(p, m, a, h, i), r = c ? e || (f ? a : o || d) ? [] : g : q;
                if (c && c(q, r, h, i), d) {
                    j = ua(r, n), d(j, [], h, i), k = j.length;
                    while (k--) (l = j[k]) && (r[n[k]] = !(q[n[k]] = l))
                }
                if (f) {
                    if (e || a) {
                        if (e) {
                            j = [], k = r.length;
                            while (k--) (l = r[k]) && j.push(q[k] = l);
                            e(null, r = [], j, i)
                        }
                        k = r.length;
                        while (k--) (l = r[k]) && (j = e ? J(f, l) : m[k]) > -1 && (f[j] = !(g[j] = l))
                    }
                } else r = ua(r === g ? r.splice(o, r.length) : r), e ? e(null, g, r, i) : H.apply(g, r)
            })
        }

        function wa(a) {
            for (var b, c, e, f = a.length, g = d.relative[a[0].type], h = g || d.relative[" "], i = g ? 1 : 0, k = ra(function (a) {
                return a === b
            }, h, !0), l = ra(function (a) {
                return J(b, a) > -1
            }, h, !0), m = [function (a, c, d) {
                var e = !g && (d || c !== j) || ((b = c).nodeType ? k(a, c, d) : l(a, c, d));
                return b = null, e
            }]; f > i; i++) if (c = d.relative[a[i].type]) m = [ra(sa(m), c)]; else {
                if (c = d.filter[a[i].type].apply(null, a[i].matches), c[u]) {
                    for (e = ++i; f > e; e++) if (d.relative[a[e].type]) break;
                    return va(i > 1 && sa(m), i > 1 && qa(a.slice(0, i - 1).concat({value: " " === a[i - 2].type ? "*" : ""})).replace(Q, "$1"), c, e > i && wa(a.slice(i, e)), f > e && wa(a = a.slice(e)), f > e && qa(a))
                }
                m.push(c)
            }
            return sa(m)
        }

        function xa(a, b) {
            var c = b.length > 0, e = a.length > 0, f = function (f, g, h, i, k) {
                var l, o, q, r = 0, s = "0", t = f && [], u = [], v = j, x = f || e && d.find.TAG("*", k),
                    y = w += null == v ? 1 : Math.random() || .1, z = x.length;
                for (k && (j = g === n || g || k); s !== z && null != (l = x[s]); s++) {
                    if (e && l) {
                        o = 0, g || l.ownerDocument === n || (m(l), h = !p);
                        while (q = a[o++]) if (q(l, g || n, h)) {
                            i.push(l);
                            break
                        }
                        k && (w = y)
                    }
                    c && ((l = !q && l) && r--, f && t.push(l))
                }
                if (r += s, c && s !== r) {
                    o = 0;
                    while (q = b[o++]) q(t, u, g, h);
                    if (f) {
                        if (r > 0) while (s--) t[s] || u[s] || (u[s] = F.call(i));
                        u = ua(u)
                    }
                    H.apply(i, u), k && !f && u.length > 0 && r + b.length > 1 && fa.uniqueSort(i)
                }
                return k && (w = y, j = v), t
            };
            return c ? ha(f) : f
        }

        return h = fa.compile = function (a, b) {
            var c, d = [], e = [], f = A[a + " "];
            if (!f) {
                b || (b = g(a)), c = b.length;
                while (c--) f = wa(b[c]), f[u] ? d.push(f) : e.push(f);
                f = A(a, xa(e, d)), f.selector = a
            }
            return f
        }, i = fa.select = function (a, b, e, f) {
            var i, j, k, l, m, n = "function" == typeof a && a, o = !f && g(a = n.selector || a);
            if (e = e || [], 1 === o.length) {
                if (j = o[0] = o[0].slice(0), j.length > 2 && "ID" === (k = j[0]).type && c.getById && 9 === b.nodeType && p && d.relative[j[1].type]) {
                    if (b = (d.find.ID(k.matches[0].replace(ba, ca), b) || [])[0], !b) return e;
                    n && (b = b.parentNode), a = a.slice(j.shift().value.length)
                }
                i = W.needsContext.test(a) ? 0 : j.length;
                while (i--) {
                    if (k = j[i], d.relative[l = k.type]) break;
                    if ((m = d.find[l]) && (f = m(k.matches[0].replace(ba, ca), _.test(j[0].type) && oa(b.parentNode) || b))) {
                        if (j.splice(i, 1), a = f.length && qa(j), !a) return H.apply(e, f), e;
                        break
                    }
                }
            }
            return (n || h(a, o))(f, b, !p, e, !b || _.test(a) && oa(b.parentNode) || b), e
        }, c.sortStable = u.split("").sort(B).join("") === u, c.detectDuplicates = !!l, m(), c.sortDetached = ia(function (a) {
            return 1 & a.compareDocumentPosition(n.createElement("div"))
        }), ia(function (a) {
            return a.innerHTML = "<a href='#'></a>", "#" === a.firstChild.getAttribute("href")
        }) || ja("type|href|height|width", function (a, b, c) {
            return c ? void 0 : a.getAttribute(b, "type" === b.toLowerCase() ? 1 : 2)
        }), c.attributes && ia(function (a) {
            return a.innerHTML = "<input/>", a.firstChild.setAttribute("value", ""), "" === a.firstChild.getAttribute("value")
        }) || ja("value", function (a, b, c) {
            return c || "input" !== a.nodeName.toLowerCase() ? void 0 : a.defaultValue
        }), ia(function (a) {
            return null == a.getAttribute("disabled")
        }) || ja(K, function (a, b, c) {
            var d;
            return c ? void 0 : a[b] === !0 ? b.toLowerCase() : (d = a.getAttributeNode(b)) && d.specified ? d.value : null
        }), fa
    }(a);
    n.find = t, n.expr = t.selectors, n.expr[":"] = n.expr.pseudos, n.uniqueSort = n.unique = t.uniqueSort, n.text = t.getText, n.isXMLDoc = t.isXML, n.contains = t.contains;
    var u = function (a, b, c) {
        var d = [], e = void 0 !== c;
        while ((a = a[b]) && 9 !== a.nodeType) if (1 === a.nodeType) {
            if (e && n(a).is(c)) break;
            d.push(a)
        }
        return d
    }, v = function (a, b) {
        for (var c = []; a; a = a.nextSibling) 1 === a.nodeType && a !== b && c.push(a);
        return c
    }, w = n.expr.match.needsContext, x = /^<([\w-]+)\s*\/?>(?:<\/\1>|)$/, y = /^.[^:#\[\.,]*$/;

    function z(a, b, c) {
        if (n.isFunction(b)) return n.grep(a, function (a, d) {
            return !!b.call(a, d, a) !== c
        });
        if (b.nodeType) return n.grep(a, function (a) {
            return a === b !== c
        });
        if ("string" == typeof b) {
            if (y.test(b)) return n.filter(b, a, c);
            b = n.filter(b, a)
        }
        return n.grep(a, function (a) {
            return n.inArray(a, b) > -1 !== c
        })
    }

    n.filter = function (a, b, c) {
        var d = b[0];
        return c && (a = ":not(" + a + ")"), 1 === b.length && 1 === d.nodeType ? n.find.matchesSelector(d, a) ? [d] : [] : n.find.matches(a, n.grep(b, function (a) {
            return 1 === a.nodeType
        }))
    }, n.fn.extend({
        find: function (a) {
            var b, c = [], d = this, e = d.length;
            if ("string" != typeof a) return this.pushStack(n(a).filter(function () {
                for (b = 0; e > b; b++) if (n.contains(d[b], this)) return !0
            }));
            for (b = 0; e > b; b++) n.find(a, d[b], c);
            return c = this.pushStack(e > 1 ? n.unique(c) : c), c.selector = this.selector ? this.selector + " " + a : a, c
        }, filter: function (a) {
            return this.pushStack(z(this, a || [], !1))
        }, not: function (a) {
            return this.pushStack(z(this, a || [], !0))
        }, is: function (a) {
            return !!z(this, "string" == typeof a && w.test(a) ? n(a) : a || [], !1).length
        }
    });
    var A, B = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, C = n.fn.init = function (a, b, c) {
        var e, f;
        if (!a) return this;
        if (c = c || A, "string" == typeof a) {
            if (e = "<" === a.charAt(0) && ">" === a.charAt(a.length - 1) && a.length >= 3 ? [null, a, null] : B.exec(a), !e || !e[1] && b) return !b || b.jquery ? (b || c).find(a) : this.constructor(b).find(a);
            if (e[1]) {
                if (b = b instanceof n ? b[0] : b, n.merge(this, n.parseHTML(e[1], b && b.nodeType ? b.ownerDocument || b : d, !0)), x.test(e[1]) && n.isPlainObject(b)) for (e in b) n.isFunction(this[e]) ? this[e](b[e]) : this.attr(e, b[e]);
                return this
            }
            if (f = d.getElementById(e[2]), f && f.parentNode) {
                if (f.id !== e[2]) return A.find(a);
                this.length = 1, this[0] = f
            }
            return this.context = d, this.selector = a, this
        }
        return a.nodeType ? (this.context = this[0] = a, this.length = 1, this) : n.isFunction(a) ? "undefined" != typeof c.ready ? c.ready(a) : a(n) : (void 0 !== a.selector && (this.selector = a.selector, this.context = a.context), n.makeArray(a, this))
    };
    C.prototype = n.fn, A = n(d);
    var D = /^(?:parents|prev(?:Until|All))/, E = {children: !0, contents: !0, next: !0, prev: !0};
    n.fn.extend({
        has: function (a) {
            var b, c = n(a, this), d = c.length;
            return this.filter(function () {
                for (b = 0; d > b; b++) if (n.contains(this, c[b])) return !0
            })
        }, closest: function (a, b) {
            for (var c, d = 0, e = this.length, f = [], g = w.test(a) || "string" != typeof a ? n(a, b || this.context) : 0; e > d; d++) for (c = this[d]; c && c !== b; c = c.parentNode) if (c.nodeType < 11 && (g ? g.index(c) > -1 : 1 === c.nodeType && n.find.matchesSelector(c, a))) {
                f.push(c);
                break
            }
            return this.pushStack(f.length > 1 ? n.uniqueSort(f) : f)
        }, index: function (a) {
            return a ? "string" == typeof a ? n.inArray(this[0], n(a)) : n.inArray(a.jquery ? a[0] : a, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        }, add: function (a, b) {
            return this.pushStack(n.uniqueSort(n.merge(this.get(), n(a, b))))
        }, addBack: function (a) {
            return this.add(null == a ? this.prevObject : this.prevObject.filter(a))
        }
    });

    function F(a, b) {
        do a = a[b]; while (a && 1 !== a.nodeType);
        return a
    }

    n.each({
        parent: function (a) {
            var b = a.parentNode;
            return b && 11 !== b.nodeType ? b : null
        }, parents: function (a) {
            return u(a, "parentNode")
        }, parentsUntil: function (a, b, c) {
            return u(a, "parentNode", c)
        }, next: function (a) {
            return F(a, "nextSibling")
        }, prev: function (a) {
            return F(a, "previousSibling")
        }, nextAll: function (a) {
            return u(a, "nextSibling")
        }, prevAll: function (a) {
            return u(a, "previousSibling")
        }, nextUntil: function (a, b, c) {
            return u(a, "nextSibling", c)
        }, prevUntil: function (a, b, c) {
            return u(a, "previousSibling", c)
        }, siblings: function (a) {
            return v((a.parentNode || {}).firstChild, a)
        }, children: function (a) {
            return v(a.firstChild)
        }, contents: function (a) {
            return n.nodeName(a, "iframe") ? a.contentDocument || a.contentWindow.document : n.merge([], a.childNodes)
        }
    }, function (a, b) {
        n.fn[a] = function (c, d) {
            var e = n.map(this, b, c);
            return "Until" !== a.slice(-5) && (d = c), d && "string" == typeof d && (e = n.filter(d, e)), this.length > 1 && (E[a] || (e = n.uniqueSort(e)), D.test(a) && (e = e.reverse())), this.pushStack(e)
        }
    });
    var G = /\S+/g;

    function H(a) {
        var b = {};
        return n.each(a.match(G) || [], function (a, c) {
            b[c] = !0
        }), b
    }

    n.Callbacks = function (a) {
        a = "string" == typeof a ? H(a) : n.extend({}, a);
        var b, c, d, e, f = [], g = [], h = -1, i = function () {
            for (e = a.once, d = b = !0; g.length; h = -1) {
                c = g.shift();
                while (++h < f.length) f[h].apply(c[0], c[1]) === !1 && a.stopOnFalse && (h = f.length, c = !1)
            }
            a.memory || (c = !1), b = !1, e && (f = c ? [] : "")
        }, j = {
            add: function () {
                return f && (c && !b && (h = f.length - 1, g.push(c)), function d(b) {
                    n.each(b, function (b, c) {
                        n.isFunction(c) ? a.unique && j.has(c) || f.push(c) : c && c.length && "string" !== n.type(c) && d(c)
                    })
                }(arguments), c && !b && i()), this
            }, remove: function () {
                return n.each(arguments, function (a, b) {
                    var c;
                    while ((c = n.inArray(b, f, c)) > -1) f.splice(c, 1), h >= c && h--
                }), this
            }, has: function (a) {
                return a ? n.inArray(a, f) > -1 : f.length > 0
            }, empty: function () {
                return f && (f = []), this
            }, disable: function () {
                return e = g = [], f = c = "", this
            }, disabled: function () {
                return !f
            }, lock: function () {
                return e = !0, c || j.disable(), this
            }, locked: function () {
                return !!e
            }, fireWith: function (a, c) {
                return e || (c = c || [], c = [a, c.slice ? c.slice() : c], g.push(c), b || i()), this
            }, fire: function () {
                return j.fireWith(this, arguments), this
            }, fired: function () {
                return !!d
            }
        };
        return j
    }, n.extend({
        Deferred: function (a) {
            var b = [["resolve", "done", n.Callbacks("once memory"), "resolved"], ["reject", "fail", n.Callbacks("once memory"), "rejected"], ["notify", "progress", n.Callbacks("memory")]],
                c = "pending", d = {
                    state: function () {
                        return c
                    }, always: function () {
                        return e.done(arguments).fail(arguments), this
                    }, then: function () {
                        var a = arguments;
                        return n.Deferred(function (c) {
                            n.each(b, function (b, f) {
                                var g = n.isFunction(a[b]) && a[b];
                                e[f[1]](function () {
                                    var a = g && g.apply(this, arguments);
                                    a && n.isFunction(a.promise) ? a.promise().progress(c.notify).done(c.resolve).fail(c.reject) : c[f[0] + "With"](this === d ? c.promise() : this, g ? [a] : arguments)
                                })
                            }), a = null
                        }).promise()
                    }, promise: function (a) {
                        return null != a ? n.extend(a, d) : d
                    }
                }, e = {};
            return d.pipe = d.then, n.each(b, function (a, f) {
                var g = f[2], h = f[3];
                d[f[1]] = g.add, h && g.add(function () {
                    c = h
                }, b[1 ^ a][2].disable, b[2][2].lock), e[f[0]] = function () {
                    return e[f[0] + "With"](this === e ? d : this, arguments), this
                }, e[f[0] + "With"] = g.fireWith
            }), d.promise(e), a && a.call(e, e), e
        }, when: function (a) {
            var b = 0, c = e.call(arguments), d = c.length, f = 1 !== d || a && n.isFunction(a.promise) ? d : 0,
                g = 1 === f ? a : n.Deferred(), h = function (a, b, c) {
                    return function (d) {
                        b[a] = this, c[a] = arguments.length > 1 ? e.call(arguments) : d, c === i ? g.notifyWith(b, c) : --f || g.resolveWith(b, c)
                    }
                }, i, j, k;
            if (d > 1) for (i = new Array(d), j = new Array(d), k = new Array(d); d > b; b++) c[b] && n.isFunction(c[b].promise) ? c[b].promise().progress(h(b, j, i)).done(h(b, k, c)).fail(g.reject) : --f;
            return f || g.resolveWith(k, c), g.promise()
        }
    });
    var I;
    n.fn.ready = function (a) {
        return n.ready.promise().done(a), this
    }, n.extend({
        isReady: !1, readyWait: 1, holdReady: function (a) {
            a ? n.readyWait++ : n.ready(!0)
        }, ready: function (a) {
            (a === !0 ? --n.readyWait : n.isReady) || (n.isReady = !0, a !== !0 && --n.readyWait > 0 || (I.resolveWith(d, [n]), n.fn.triggerHandler && (n(d).triggerHandler("ready"), n(d).off("ready"))))
        }
    });

    function J() {
        d.addEventListener ? (d.removeEventListener("DOMContentLoaded", K), a.removeEventListener("load", K)) : (d.detachEvent("onreadystatechange", K), a.detachEvent("onload", K))
    }

    function K() {
        (d.addEventListener || "load" === a.event.type || "complete" === d.readyState) && (J(), n.ready())
    }

    n.ready.promise = function (b) {
        if (!I) if (I = n.Deferred(), "complete" === d.readyState || "loading" !== d.readyState && !d.documentElement.doScroll) a.setTimeout(n.ready); else if (d.addEventListener) d.addEventListener("DOMContentLoaded", K), a.addEventListener("load", K); else {
            d.attachEvent("onreadystatechange", K), a.attachEvent("onload", K);
            var c = !1;
            try {
                c = null == a.frameElement && d.documentElement
            } catch (e) {
            }
            c && c.doScroll && !function f() {
                if (!n.isReady) {
                    try {
                        c.doScroll("left")
                    } catch (b) {
                        return a.setTimeout(f, 50)
                    }
                    J(), n.ready()
                }
            }()
        }
        return I.promise(b)
    }, n.ready.promise();
    var L;
    for (L in n(l)) break;
    l.ownFirst = "0" === L, l.inlineBlockNeedsLayout = !1, n(function () {
        var a, b, c, e;
        c = d.getElementsByTagName("body")[0], c && c.style && (b = d.createElement("div"), e = d.createElement("div"), e.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", c.appendChild(e).appendChild(b), "undefined" != typeof b.style.zoom && (b.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", l.inlineBlockNeedsLayout = a = 3 === b.offsetWidth, a && (c.style.zoom = 1)), c.removeChild(e))
    }), function () {
        var a = d.createElement("div");
        l.deleteExpando = !0;
        try {
            delete a.test
        } catch (b) {
            l.deleteExpando = !1
        }
        a = null
    }();
    var M = function (a) {
        var b = n.noData[(a.nodeName + " ").toLowerCase()], c = +a.nodeType || 1;
        return 1 !== c && 9 !== c ? !1 : !b || b !== !0 && a.getAttribute("classid") === b
    }, N = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, O = /([A-Z])/g;

    function P(a, b, c) {
        if (void 0 === c && 1 === a.nodeType) {
            var d = "data-" + b.replace(O, "-$1").toLowerCase();
            if (c = a.getAttribute(d), "string" == typeof c) {
                try {
                    c = "true" === c ? !0 : "false" === c ? !1 : "null" === c ? null : +c + "" === c ? +c : N.test(c) ? n.parseJSON(c) : c
                } catch (e) {
                }
                n.data(a, b, c)
            } else c = void 0;
        }
        return c
    }

    function Q(a) {
        var b;
        for (b in a) if (("data" !== b || !n.isEmptyObject(a[b])) && "toJSON" !== b) return !1;
        return !0
    }

    function R(a, b, d, e) {
        if (M(a)) {
            var f, g, h = n.expando, i = a.nodeType, j = i ? n.cache : a, k = i ? a[h] : a[h] && h;
            if (k && j[k] && (e || j[k].data) || void 0 !== d || "string" != typeof b) return k || (k = i ? a[h] = c.pop() || n.guid++ : h), j[k] || (j[k] = i ? {} : {toJSON: n.noop}), "object" != typeof b && "function" != typeof b || (e ? j[k] = n.extend(j[k], b) : j[k].data = n.extend(j[k].data, b)), g = j[k], e || (g.data || (g.data = {}), g = g.data), void 0 !== d && (g[n.camelCase(b)] = d), "string" == typeof b ? (f = g[b], null == f && (f = g[n.camelCase(b)])) : f = g, f
        }
    }

    function S(a, b, c) {
        if (M(a)) {
            var d, e, f = a.nodeType, g = f ? n.cache : a, h = f ? a[n.expando] : n.expando;
            if (g[h]) {
                if (b && (d = c ? g[h] : g[h].data)) {
                    n.isArray(b) ? b = b.concat(n.map(b, n.camelCase)) : b in d ? b = [b] : (b = n.camelCase(b), b = b in d ? [b] : b.split(" ")), e = b.length;
                    while (e--) delete d[b[e]];
                    if (c ? !Q(d) : !n.isEmptyObject(d)) return
                }
                (c || (delete g[h].data, Q(g[h]))) && (f ? n.cleanData([a], !0) : l.deleteExpando || g != g.window ? delete g[h] : g[h] = void 0)
            }
        }
    }

    n.extend({
        cache: {},
        noData: {"applet ": !0, "embed ": !0, "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},
        hasData: function (a) {
            return a = a.nodeType ? n.cache[a[n.expando]] : a[n.expando], !!a && !Q(a)
        },
        data: function (a, b, c) {
            return R(a, b, c)
        },
        removeData: function (a, b) {
            return S(a, b)
        },
        _data: function (a, b, c) {
            return R(a, b, c, !0)
        },
        _removeData: function (a, b) {
            return S(a, b, !0)
        }
    }), n.fn.extend({
        data: function (a, b) {
            var c, d, e, f = this[0], g = f && f.attributes;
            if (void 0 === a) {
                if (this.length && (e = n.data(f), 1 === f.nodeType && !n._data(f, "parsedAttrs"))) {
                    c = g.length;
                    while (c--) g[c] && (d = g[c].name, 0 === d.indexOf("data-") && (d = n.camelCase(d.slice(5)), P(f, d, e[d])));
                    n._data(f, "parsedAttrs", !0)
                }
                return e
            }
            return "object" == typeof a ? this.each(function () {
                n.data(this, a)
            }) : arguments.length > 1 ? this.each(function () {
                n.data(this, a, b)
            }) : f ? P(f, a, n.data(f, a)) : void 0
        }, removeData: function (a) {
            return this.each(function () {
                n.removeData(this, a)
            })
        }
    }), n.extend({
        queue: function (a, b, c) {
            var d;
            return a ? (b = (b || "fx") + "queue", d = n._data(a, b), c && (!d || n.isArray(c) ? d = n._data(a, b, n.makeArray(c)) : d.push(c)), d || []) : void 0
        }, dequeue: function (a, b) {
            b = b || "fx";
            var c = n.queue(a, b), d = c.length, e = c.shift(), f = n._queueHooks(a, b), g = function () {
                n.dequeue(a, b)
            };
            "inprogress" === e && (e = c.shift(), d--), e && ("fx" === b && c.unshift("inprogress"), delete f.stop, e.call(a, g, f)), !d && f && f.empty.fire()
        }, _queueHooks: function (a, b) {
            var c = b + "queueHooks";
            return n._data(a, c) || n._data(a, c, {
                empty: n.Callbacks("once memory").add(function () {
                    n._removeData(a, b + "queue"), n._removeData(a, c)
                })
            })
        }
    }), n.fn.extend({
        queue: function (a, b) {
            var c = 2;
            return "string" != typeof a && (b = a, a = "fx", c--), arguments.length < c ? n.queue(this[0], a) : void 0 === b ? this : this.each(function () {
                var c = n.queue(this, a, b);
                n._queueHooks(this, a), "fx" === a && "inprogress" !== c[0] && n.dequeue(this, a)
            })
        }, dequeue: function (a) {
            return this.each(function () {
                n.dequeue(this, a)
            })
        }, clearQueue: function (a) {
            return this.queue(a || "fx", [])
        }, promise: function (a, b) {
            var c, d = 1, e = n.Deferred(), f = this, g = this.length, h = function () {
                --d || e.resolveWith(f, [f])
            };
            "string" != typeof a && (b = a, a = void 0), a = a || "fx";
            while (g--) c = n._data(f[g], a + "queueHooks"), c && c.empty && (d++, c.empty.add(h));
            return h(), e.promise(b)
        }
    }), function () {
        var a;
        l.shrinkWrapBlocks = function () {
            if (null != a) return a;
            a = !1;
            var b, c, e;
            return c = d.getElementsByTagName("body")[0], c && c.style ? (b = d.createElement("div"), e = d.createElement("div"), e.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", c.appendChild(e).appendChild(b), "undefined" != typeof b.style.zoom && (b.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", b.appendChild(d.createElement("div")).style.width = "5px", a = 3 !== b.offsetWidth), c.removeChild(e), a) : void 0
        }
    }();
    var T = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        U = new RegExp("^(?:([+-])=|)(" + T + ")([a-z%]*)$", "i"), V = ["Top", "Right", "Bottom", "Left"],
        W = function (a, b) {
            return a = b || a, "none" === n.css(a, "display") || !n.contains(a.ownerDocument, a)
        };

    function X(a, b, c, d) {
        var e, f = 1, g = 20, h = d ? function () {
                return d.cur()
            } : function () {
                return n.css(a, b, "")
            }, i = h(), j = c && c[3] || (n.cssNumber[b] ? "" : "px"),
            k = (n.cssNumber[b] || "px" !== j && +i) && U.exec(n.css(a, b));
        if (k && k[3] !== j) {
            j = j || k[3], c = c || [], k = +i || 1;
            do f = f || ".5", k /= f, n.style(a, b, k + j); while (f !== (f = h() / i) && 1 !== f && --g)
        }
        return c && (k = +k || +i || 0, e = c[1] ? k + (c[1] + 1) * c[2] : +c[2], d && (d.unit = j, d.start = k, d.end = e)), e
    }

    var Y = function (a, b, c, d, e, f, g) {
            var h = 0, i = a.length, j = null == c;
            if ("object" === n.type(c)) {
                e = !0;
                for (h in c) Y(a, b, h, c[h], !0, f, g)
            } else if (void 0 !== d && (e = !0, n.isFunction(d) || (g = !0), j && (g ? (b.call(a, d), b = null) : (j = b, b = function (a, b, c) {
                return j.call(n(a), c)
            })), b)) for (; i > h; h++) b(a[h], c, g ? d : d.call(a[h], h, b(a[h], c)));
            return e ? a : j ? b.call(a) : i ? b(a[0], c) : f
        }, Z = /^(?:checkbox|radio)$/i, $ = /<([\w:-]+)/, _ = /^$|\/(?:java|ecma)script/i, aa = /^\s+/,
        ba = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|dialog|figcaption|figure|footer|header|hgroup|main|mark|meter|nav|output|picture|progress|section|summary|template|time|video";

    function ca(a) {
        var b = ba.split("|"), c = a.createDocumentFragment();
        if (c.createElement) while (b.length) c.createElement(b.pop());
        return c
    }

    !function () {
        var a = d.createElement("div"), b = d.createDocumentFragment(), c = d.createElement("input");
        a.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", l.leadingWhitespace = 3 === a.firstChild.nodeType, l.tbody = !a.getElementsByTagName("tbody").length, l.htmlSerialize = !!a.getElementsByTagName("link").length, l.html5Clone = "<:nav></:nav>" !== d.createElement("nav").cloneNode(!0).outerHTML, c.type = "checkbox", c.checked = !0, b.appendChild(c), l.appendChecked = c.checked, a.innerHTML = "<textarea>x</textarea>", l.noCloneChecked = !!a.cloneNode(!0).lastChild.defaultValue, b.appendChild(a), c = d.createElement("input"), c.setAttribute("type", "radio"), c.setAttribute("checked", "checked"), c.setAttribute("name", "t"), a.appendChild(c), l.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, l.noCloneEvent = !!a.addEventListener, a[n.expando] = 1, l.attributes = !a.getAttribute(n.expando)
    }();
    var da = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: l.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    };
    da.optgroup = da.option, da.tbody = da.tfoot = da.colgroup = da.caption = da.thead, da.th = da.td;

    function ea(a, b) {
        var c, d, e = 0,
            f = "undefined" != typeof a.getElementsByTagName ? a.getElementsByTagName(b || "*") : "undefined" != typeof a.querySelectorAll ? a.querySelectorAll(b || "*") : void 0;
        if (!f) for (f = [], c = a.childNodes || a; null != (d = c[e]); e++) !b || n.nodeName(d, b) ? f.push(d) : n.merge(f, ea(d, b));
        return void 0 === b || b && n.nodeName(a, b) ? n.merge([a], f) : f
    }

    function fa(a, b) {
        for (var c, d = 0; null != (c = a[d]); d++) n._data(c, "globalEval", !b || n._data(b[d], "globalEval"))
    }

    var ga = /<|&#?\w+;/, ha = /<tbody/i;

    function ia(a) {
        Z.test(a.type) && (a.defaultChecked = a.checked)
    }

    function ja(a, b, c, d, e) {
        for (var f, g, h, i, j, k, m, o = a.length, p = ca(b), q = [], r = 0; o > r; r++) if (g = a[r], g || 0 === g) if ("object" === n.type(g)) n.merge(q, g.nodeType ? [g] : g); else if (ga.test(g)) {
            i = i || p.appendChild(b.createElement("div")), j = ($.exec(g) || ["", ""])[1].toLowerCase(), m = da[j] || da._default, i.innerHTML = m[1] + n.htmlPrefilter(g) + m[2], f = m[0];
            while (f--) i = i.lastChild;
            if (!l.leadingWhitespace && aa.test(g) && q.push(b.createTextNode(aa.exec(g)[0])), !l.tbody) {
                g = "table" !== j || ha.test(g) ? "<table>" !== m[1] || ha.test(g) ? 0 : i : i.firstChild, f = g && g.childNodes.length;
                while (f--) n.nodeName(k = g.childNodes[f], "tbody") && !k.childNodes.length && g.removeChild(k)
            }
            n.merge(q, i.childNodes), i.textContent = "";
            while (i.firstChild) i.removeChild(i.firstChild);
            i = p.lastChild
        } else q.push(b.createTextNode(g));
        i && p.removeChild(i), l.appendChecked || n.grep(ea(q, "input"), ia), r = 0;
        while (g = q[r++]) if (d && n.inArray(g, d) > -1) e && e.push(g); else if (h = n.contains(g.ownerDocument, g), i = ea(p.appendChild(g), "script"), h && fa(i), c) {
            f = 0;
            while (g = i[f++]) _.test(g.type || "") && c.push(g)
        }
        return i = null, p
    }

    !function () {
        var b, c, e = d.createElement("div");
        for (b in{
            submit: !0,
            change: !0,
            focusin: !0
        }) c = "on" + b, (l[b] = c in a) || (e.setAttribute(c, "t"), l[b] = e.attributes[c].expando === !1);
        e = null
    }();
    var ka = /^(?:input|select|textarea)$/i, la = /^key/, ma = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        na = /^(?:focusinfocus|focusoutblur)$/, oa = /^([^.]*)(?:\.(.+)|)/;

    function pa() {
        return !0
    }

    function qa() {
        return !1
    }

    function ra() {
        try {
            return d.activeElement
        } catch (a) {
        }
    }

    function sa(a, b, c, d, e, f) {
        var g, h;
        if ("object" == typeof b) {
            "string" != typeof c && (d = d || c, c = void 0);
            for (h in b) sa(a, h, c, d, b[h], f);
            return a
        }
        if (null == d && null == e ? (e = c, d = c = void 0) : null == e && ("string" == typeof c ? (e = d, d = void 0) : (e = d, d = c, c = void 0)), e === !1) e = qa; else if (!e) return a;
        return 1 === f && (g = e, e = function (a) {
            return n().off(a), g.apply(this, arguments)
        }, e.guid = g.guid || (g.guid = n.guid++)), a.each(function () {
            n.event.add(this, b, e, d, c)
        })
    }

    n.event = {
        global: {},
        add: function (a, b, c, d, e) {
            var f, g, h, i, j, k, l, m, o, p, q, r = n._data(a);
            if (r) {
                c.handler && (i = c, c = i.handler, e = i.selector), c.guid || (c.guid = n.guid++), (g = r.events) || (g = r.events = {}), (k = r.handle) || (k = r.handle = function (a) {
                    return "undefined" == typeof n || a && n.event.triggered === a.type ? void 0 : n.event.dispatch.apply(k.elem, arguments)
                }, k.elem = a), b = (b || "").match(G) || [""], h = b.length;
                while (h--) f = oa.exec(b[h]) || [], o = q = f[1], p = (f[2] || "").split(".").sort(), o && (j = n.event.special[o] || {}, o = (e ? j.delegateType : j.bindType) || o, j = n.event.special[o] || {}, l = n.extend({
                    type: o,
                    origType: q,
                    data: d,
                    handler: c,
                    guid: c.guid,
                    selector: e,
                    needsContext: e && n.expr.match.needsContext.test(e),
                    namespace: p.join(".")
                }, i), (m = g[o]) || (m = g[o] = [], m.delegateCount = 0, j.setup && j.setup.call(a, d, p, k) !== !1 || (a.addEventListener ? a.addEventListener(o, k, !1) : a.attachEvent && a.attachEvent("on" + o, k))), j.add && (j.add.call(a, l), l.handler.guid || (l.handler.guid = c.guid)), e ? m.splice(m.delegateCount++, 0, l) : m.push(l), n.event.global[o] = !0);
                a = null
            }
        },
        remove: function (a, b, c, d, e) {
            var f, g, h, i, j, k, l, m, o, p, q, r = n.hasData(a) && n._data(a);
            if (r && (k = r.events)) {
                b = (b || "").match(G) || [""], j = b.length;
                while (j--) if (h = oa.exec(b[j]) || [], o = q = h[1], p = (h[2] || "").split(".").sort(), o) {
                    l = n.event.special[o] || {}, o = (d ? l.delegateType : l.bindType) || o, m = k[o] || [], h = h[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), i = f = m.length;
                    while (f--) g = m[f], !e && q !== g.origType || c && c.guid !== g.guid || h && !h.test(g.namespace) || d && d !== g.selector && ("**" !== d || !g.selector) || (m.splice(f, 1), g.selector && m.delegateCount--, l.remove && l.remove.call(a, g));
                    i && !m.length && (l.teardown && l.teardown.call(a, p, r.handle) !== !1 || n.removeEvent(a, o, r.handle), delete k[o])
                } else for (o in k) n.event.remove(a, o + b[j], c, d, !0);
                n.isEmptyObject(k) && (delete r.handle, n._removeData(a, "events"))
            }
        },
        trigger: function (b, c, e, f) {
            var g, h, i, j, l, m, o, p = [e || d], q = k.call(b, "type") ? b.type : b,
                r = k.call(b, "namespace") ? b.namespace.split(".") : [];
            if (i = m = e = e || d, 3 !== e.nodeType && 8 !== e.nodeType && !na.test(q + n.event.triggered) && (q.indexOf(".") > -1 && (r = q.split("."), q = r.shift(), r.sort()), h = q.indexOf(":") < 0 && "on" + q, b = b[n.expando] ? b : new n.Event(q, "object" == typeof b && b), b.isTrigger = f ? 2 : 3, b.namespace = r.join("."), b.rnamespace = b.namespace ? new RegExp("(^|\\.)" + r.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, b.result = void 0, b.target || (b.target = e), c = null == c ? [b] : n.makeArray(c, [b]), l = n.event.special[q] || {}, f || !l.trigger || l.trigger.apply(e, c) !== !1)) {
                if (!f && !l.noBubble && !n.isWindow(e)) {
                    for (j = l.delegateType || q, na.test(j + q) || (i = i.parentNode); i; i = i.parentNode) p.push(i), m = i;
                    m === (e.ownerDocument || d) && p.push(m.defaultView || m.parentWindow || a)
                }
                o = 0;
                while ((i = p[o++]) && !b.isPropagationStopped()) b.type = o > 1 ? j : l.bindType || q, g = (n._data(i, "events") || {})[b.type] && n._data(i, "handle"), g && g.apply(i, c), g = h && i[h], g && g.apply && M(i) && (b.result = g.apply(i, c), b.result === !1 && b.preventDefault());
                if (b.type = q, !f && !b.isDefaultPrevented() && (!l._default || l._default.apply(p.pop(), c) === !1) && M(e) && h && e[q] && !n.isWindow(e)) {
                    m = e[h], m && (e[h] = null), n.event.triggered = q;
                    try {
                        e[q]()
                    } catch (s) {
                    }
                    n.event.triggered = void 0, m && (e[h] = m)
                }
                return b.result
            }
        },
        dispatch: function (a) {
            a = n.event.fix(a);
            var b, c, d, f, g, h = [], i = e.call(arguments), j = (n._data(this, "events") || {})[a.type] || [],
                k = n.event.special[a.type] || {};
            if (i[0] = a, a.delegateTarget = this, !k.preDispatch || k.preDispatch.call(this, a) !== !1) {
                h = n.event.handlers.call(this, a, j), b = 0;
                while ((f = h[b++]) && !a.isPropagationStopped()) {
                    a.currentTarget = f.elem, c = 0;
                    while ((g = f.handlers[c++]) && !a.isImmediatePropagationStopped()) a.rnamespace && !a.rnamespace.test(g.namespace) || (a.handleObj = g, a.data = g.data, d = ((n.event.special[g.origType] || {}).handle || g.handler).apply(f.elem, i), void 0 !== d && (a.result = d) === !1 && (a.preventDefault(), a.stopPropagation()))
                }
                return k.postDispatch && k.postDispatch.call(this, a), a.result
            }
        },
        handlers: function (a, b) {
            var c, d, e, f, g = [], h = b.delegateCount, i = a.target;
            if (h && i.nodeType && ("click" !== a.type || isNaN(a.button) || a.button < 1)) for (; i != this; i = i.parentNode || this) if (1 === i.nodeType && (i.disabled !== !0 || "click" !== a.type)) {
                for (d = [], c = 0; h > c; c++) f = b[c], e = f.selector + " ", void 0 === d[e] && (d[e] = f.needsContext ? n(e, this).index(i) > -1 : n.find(e, this, null, [i]).length), d[e] && d.push(f);
                d.length && g.push({elem: i, handlers: d})
            }
            return h < b.length && g.push({elem: this, handlers: b.slice(h)}), g
        },
        fix: function (a) {
            if (a[n.expando]) return a;
            var b, c, e, f = a.type, g = a, h = this.fixHooks[f];
            h || (this.fixHooks[f] = h = ma.test(f) ? this.mouseHooks : la.test(f) ? this.keyHooks : {}), e = h.props ? this.props.concat(h.props) : this.props, a = new n.Event(g), b = e.length;
            while (b--) c = e[b], a[c] = g[c];
            return a.target || (a.target = g.srcElement || d), 3 === a.target.nodeType && (a.target = a.target.parentNode), a.metaKey = !!a.metaKey, h.filter ? h.filter(a, g) : a
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget detail eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "), filter: function (a, b) {
                return null == a.which && (a.which = null != b.charCode ? b.charCode : b.keyCode), a
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (a, b) {
                var c, e, f, g = b.button, h = b.fromElement;
                return null == a.pageX && null != b.clientX && (e = a.target.ownerDocument || d, f = e.documentElement, c = e.body, a.pageX = b.clientX + (f && f.scrollLeft || c && c.scrollLeft || 0) - (f && f.clientLeft || c && c.clientLeft || 0), a.pageY = b.clientY + (f && f.scrollTop || c && c.scrollTop || 0) - (f && f.clientTop || c && c.clientTop || 0)), !a.relatedTarget && h && (a.relatedTarget = h === a.target ? b.toElement : h), a.which || void 0 === g || (a.which = 1 & g ? 1 : 2 & g ? 3 : 4 & g ? 2 : 0), a
            }
        },
        special: {
            load: {noBubble: !0}, focus: {
                trigger: function () {
                    if (this !== ra() && this.focus) try {
                        return this.focus(), !1
                    } catch (a) {
                    }
                }, delegateType: "focusin"
            }, blur: {
                trigger: function () {
                    return this === ra() && this.blur ? (this.blur(), !1) : void 0
                }, delegateType: "focusout"
            }, click: {
                trigger: function () {
                    return n.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                }, _default: function (a) {
                    return n.nodeName(a.target, "a")
                }
            }, beforeunload: {
                postDispatch: function (a) {
                    void 0 !== a.result && a.originalEvent && (a.originalEvent.returnValue = a.result)
                }
            }
        },
        simulate: function (a, b, c) {
            var d = n.extend(new n.Event, c, {type: a, isSimulated: !0});
            n.event.trigger(d, null, b), d.isDefaultPrevented() && c.preventDefault()
        }
    }, n.removeEvent = d.removeEventListener ? function (a, b, c) {
        a.removeEventListener && a.removeEventListener(b, c)
    } : function (a, b, c) {
        var d = "on" + b;
        a.detachEvent && ("undefined" == typeof a[d] && (a[d] = null), a.detachEvent(d, c))
    }, n.Event = function (a, b) {
        return this instanceof n.Event ? (a && a.type ? (this.originalEvent = a, this.type = a.type, this.isDefaultPrevented = a.defaultPrevented || void 0 === a.defaultPrevented && a.returnValue === !1 ? pa : qa) : this.type = a, b && n.extend(this, b), this.timeStamp = a && a.timeStamp || n.now(), void (this[n.expando] = !0)) : new n.Event(a, b)
    }, n.Event.prototype = {
        constructor: n.Event,
        isDefaultPrevented: qa,
        isPropagationStopped: qa,
        isImmediatePropagationStopped: qa,
        preventDefault: function () {
            var a = this.originalEvent;
            this.isDefaultPrevented = pa, a && (a.preventDefault ? a.preventDefault() : a.returnValue = !1)
        },
        stopPropagation: function () {
            var a = this.originalEvent;
            this.isPropagationStopped = pa, a && !this.isSimulated && (a.stopPropagation && a.stopPropagation(), a.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            var a = this.originalEvent;
            this.isImmediatePropagationStopped = pa, a && a.stopImmediatePropagation && a.stopImmediatePropagation(), this.stopPropagation()
        }
    }, n.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function (a, b) {
        n.event.special[a] = {
            delegateType: b, bindType: b, handle: function (a) {
                var c, d = this, e = a.relatedTarget, f = a.handleObj;
                return e && (e === d || n.contains(d, e)) || (a.type = f.origType, c = f.handler.apply(this, arguments), a.type = b), c
            }
        }
    }), l.submit || (n.event.special.submit = {
        setup: function () {
            return n.nodeName(this, "form") ? !1 : void n.event.add(this, "click._submit keypress._submit", function (a) {
                var b = a.target,
                    c = n.nodeName(b, "input") || n.nodeName(b, "button") ? n.prop(b, "form") : void 0;
                c && !n._data(c, "submit") && (n.event.add(c, "submit._submit", function (a) {
                    a._submitBubble = !0
                }), n._data(c, "submit", !0))
            })
        }, postDispatch: function (a) {
            a._submitBubble && (delete a._submitBubble, this.parentNode && !a.isTrigger && n.event.simulate("submit", this.parentNode, a))
        }, teardown: function () {
            return n.nodeName(this, "form") ? !1 : void n.event.remove(this, "._submit")
        }
    }), l.change || (n.event.special.change = {
        setup: function () {
            return ka.test(this.nodeName) ? ("checkbox" !== this.type && "radio" !== this.type || (n.event.add(this, "propertychange._change", function (a) {
                "checked" === a.originalEvent.propertyName && (this._justChanged = !0)
            }), n.event.add(this, "click._change", function (a) {
                this._justChanged && !a.isTrigger && (this._justChanged = !1), n.event.simulate("change", this, a)
            })), !1) : void n.event.add(this, "beforeactivate._change", function (a) {
                var b = a.target;
                ka.test(b.nodeName) && !n._data(b, "change") && (n.event.add(b, "change._change", function (a) {
                    !this.parentNode || a.isSimulated || a.isTrigger || n.event.simulate("change", this.parentNode, a)
                }), n._data(b, "change", !0))
            })
        }, handle: function (a) {
            var b = a.target;
            return this !== b || a.isSimulated || a.isTrigger || "radio" !== b.type && "checkbox" !== b.type ? a.handleObj.handler.apply(this, arguments) : void 0
        }, teardown: function () {
            return n.event.remove(this, "._change"), !ka.test(this.nodeName)
        }
    }), l.focusin || n.each({focus: "focusin", blur: "focusout"}, function (a, b) {
        var c = function (a) {
            n.event.simulate(b, a.target, n.event.fix(a))
        };
        n.event.special[b] = {
            setup: function () {
                var d = this.ownerDocument || this, e = n._data(d, b);
                e || d.addEventListener(a, c, !0), n._data(d, b, (e || 0) + 1)
            }, teardown: function () {
                var d = this.ownerDocument || this, e = n._data(d, b) - 1;
                e ? n._data(d, b, e) : (d.removeEventListener(a, c, !0), n._removeData(d, b))
            }
        }
    }), n.fn.extend({
        on: function (a, b, c, d) {
            return sa(this, a, b, c, d)
        }, one: function (a, b, c, d) {
            return sa(this, a, b, c, d, 1)
        }, off: function (a, b, c) {
            var d, e;
            if (a && a.preventDefault && a.handleObj) return d = a.handleObj, n(a.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace : d.origType, d.selector, d.handler), this;
            if ("object" == typeof a) {
                for (e in a) this.off(e, b, a[e]);
                return this
            }
            return b !== !1 && "function" != typeof b || (c = b, b = void 0), c === !1 && (c = qa), this.each(function () {
                n.event.remove(this, a, c, b)
            })
        }, trigger: function (a, b) {
            return this.each(function () {
                n.event.trigger(a, b, this)
            })
        }, triggerHandler: function (a, b) {
            var c = this[0];
            return c ? n.event.trigger(a, b, c, !0) : void 0
        }
    });
    var ta = / jQuery\d+="(?:null|\d+)"/g, ua = new RegExp("<(?:" + ba + ")[\\s/>]", "i"),
        va = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:-]+)[^>]*)\/>/gi,
        wa = /<script|<style|<link/i, xa = /checked\s*(?:[^=]|=\s*.checked.)/i, ya = /^true\/(.*)/,
        za = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, Aa = ca(d),
        Ba = Aa.appendChild(d.createElement("div"));

    function Ca(a, b) {
        return n.nodeName(a, "table") && n.nodeName(11 !== b.nodeType ? b : b.firstChild, "tr") ? a.getElementsByTagName("tbody")[0] || a.appendChild(a.ownerDocument.createElement("tbody")) : a
    }

    function Da(a) {
        return a.type = (null !== n.find.attr(a, "type")) + "/" + a.type, a
    }

    function Ea(a) {
        var b = ya.exec(a.type);
        return b ? a.type = b[1] : a.removeAttribute("type"), a
    }

    function Fa(a, b) {
        if (1 === b.nodeType && n.hasData(a)) {
            var c, d, e, f = n._data(a), g = n._data(b, f), h = f.events;
            if (h) {
                delete g.handle, g.events = {};
                for (c in h) for (d = 0, e = h[c].length; e > d; d++) n.event.add(b, c, h[c][d])
            }
            g.data && (g.data = n.extend({}, g.data))
        }
    }

    function Ga(a, b) {
        var c, d, e;
        if (1 === b.nodeType) {
            if (c = b.nodeName.toLowerCase(), !l.noCloneEvent && b[n.expando]) {
                e = n._data(b);
                for (d in e.events) n.removeEvent(b, d, e.handle);
                b.removeAttribute(n.expando)
            }
            "script" === c && b.text !== a.text ? (Da(b).text = a.text, Ea(b)) : "object" === c ? (b.parentNode && (b.outerHTML = a.outerHTML), l.html5Clone && a.innerHTML && !n.trim(b.innerHTML) && (b.innerHTML = a.innerHTML)) : "input" === c && Z.test(a.type) ? (b.defaultChecked = b.checked = a.checked, b.value !== a.value && (b.value = a.value)) : "option" === c ? b.defaultSelected = b.selected = a.defaultSelected : "input" !== c && "textarea" !== c || (b.defaultValue = a.defaultValue)
        }
    }

    function Ha(a, b, c, d) {
        b = f.apply([], b);
        var e, g, h, i, j, k, m = 0, o = a.length, p = o - 1, q = b[0], r = n.isFunction(q);
        if (r || o > 1 && "string" == typeof q && !l.checkClone && xa.test(q)) return a.each(function (e) {
            var f = a.eq(e);
            r && (b[0] = q.call(this, e, f.html())), Ha(f, b, c, d)
        });
        if (o && (k = ja(b, a[0].ownerDocument, !1, a, d), e = k.firstChild, 1 === k.childNodes.length && (k = e), e || d)) {
            for (i = n.map(ea(k, "script"), Da), h = i.length; o > m; m++) g = k, m !== p && (g = n.clone(g, !0, !0), h && n.merge(i, ea(g, "script"))), c.call(a[m], g, m);
            if (h) for (j = i[i.length - 1].ownerDocument, n.map(i, Ea), m = 0; h > m; m++) g = i[m], _.test(g.type || "") && !n._data(g, "globalEval") && n.contains(j, g) && (g.src ? n._evalUrl && n._evalUrl(g.src) : n.globalEval((g.text || g.textContent || g.innerHTML || "").replace(za, "")));
            k = e = null
        }
        return a
    }

    function Ia(a, b, c) {
        for (var d, e = b ? n.filter(b, a) : a, f = 0; null != (d = e[f]); f++) c || 1 !== d.nodeType || n.cleanData(ea(d)), d.parentNode && (c && n.contains(d.ownerDocument, d) && fa(ea(d, "script")), d.parentNode.removeChild(d));
        return a
    }

    n.extend({
        htmlPrefilter: function (a) {
            return a.replace(va, "<$1></$2>")
        }, clone: function (a, b, c) {
            var d, e, f, g, h, i = n.contains(a.ownerDocument, a);
            if (l.html5Clone || n.isXMLDoc(a) || !ua.test("<" + a.nodeName + ">") ? f = a.cloneNode(!0) : (Ba.innerHTML = a.outerHTML, Ba.removeChild(f = Ba.firstChild)), !(l.noCloneEvent && l.noCloneChecked || 1 !== a.nodeType && 11 !== a.nodeType || n.isXMLDoc(a))) for (d = ea(f), h = ea(a), g = 0; null != (e = h[g]); ++g) d[g] && Ga(e, d[g]);
            if (b) if (c) for (h = h || ea(a), d = d || ea(f), g = 0; null != (e = h[g]); g++) Fa(e, d[g]); else Fa(a, f);
            return d = ea(f, "script"), d.length > 0 && fa(d, !i && ea(a, "script")), d = h = e = null, f
        }, cleanData: function (a, b) {
            for (var d, e, f, g, h = 0, i = n.expando, j = n.cache, k = l.attributes, m = n.event.special; null != (d = a[h]); h++) if ((b || M(d)) && (f = d[i], g = f && j[f])) {
                if (g.events) for (e in g.events) m[e] ? n.event.remove(d, e) : n.removeEvent(d, e, g.handle);
                j[f] && (delete j[f], k || "undefined" == typeof d.removeAttribute ? d[i] = void 0 : d.removeAttribute(i), c.push(f))
            }
        }
    }), n.fn.extend({
        domManip: Ha, detach: function (a) {
            return Ia(this, a, !0)
        }, remove: function (a) {
            return Ia(this, a)
        }, text: function (a) {
            return Y(this, function (a) {
                return void 0 === a ? n.text(this) : this.empty().append((this[0] && this[0].ownerDocument || d).createTextNode(a))
            }, null, a, arguments.length)
        }, append: function () {
            return Ha(this, arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = Ca(this, a);
                    b.appendChild(a)
                }
            })
        }, prepend: function () {
            return Ha(this, arguments, function (a) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var b = Ca(this, a);
                    b.insertBefore(a, b.firstChild)
                }
            })
        }, before: function () {
            return Ha(this, arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this)
            })
        }, after: function () {
            return Ha(this, arguments, function (a) {
                this.parentNode && this.parentNode.insertBefore(a, this.nextSibling)
            })
        }, empty: function () {
            for (var a, b = 0; null != (a = this[b]); b++) {
                1 === a.nodeType && n.cleanData(ea(a, !1));
                while (a.firstChild) a.removeChild(a.firstChild);
                a.options && n.nodeName(a, "select") && (a.options.length = 0)
            }
            return this
        }, clone: function (a, b) {
            return a = null == a ? !1 : a, b = null == b ? a : b, this.map(function () {
                return n.clone(this, a, b)
            })
        }, html: function (a) {
            return Y(this, function (a) {
                var b = this[0] || {}, c = 0, d = this.length;
                if (void 0 === a) return 1 === b.nodeType ? b.innerHTML.replace(ta, "") : void 0;
                if ("string" == typeof a && !wa.test(a) && (l.htmlSerialize || !ua.test(a)) && (l.leadingWhitespace || !aa.test(a)) && !da[($.exec(a) || ["", ""])[1].toLowerCase()]) {
                    a = n.htmlPrefilter(a);
                    try {
                        for (; d > c; c++) b = this[c] || {}, 1 === b.nodeType && (n.cleanData(ea(b, !1)), b.innerHTML = a);
                        b = 0
                    } catch (e) {
                    }
                }
                b && this.empty().append(a)
            }, null, a, arguments.length)
        }, replaceWith: function () {
            var a = [];
            return Ha(this, arguments, function (b) {
                var c = this.parentNode;
                n.inArray(this, a) < 0 && (n.cleanData(ea(this)), c && c.replaceChild(b, this))
            }, a)
        }
    }), n.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (a, b) {
        n.fn[a] = function (a) {
            for (var c, d = 0, e = [], f = n(a), h = f.length - 1; h >= d; d++) c = d === h ? this : this.clone(!0), n(f[d])[b](c), g.apply(e, c.get());
            return this.pushStack(e)
        }
    });
    var Ja, Ka = {HTML: "block", BODY: "block"};

    function La(a, b) {
        var c = n(b.createElement(a)).appendTo(b.body), d = n.css(c[0], "display");
        return c.detach(), d
    }

    function Ma(a) {
        var b = d, c = Ka[a];
        return c || (c = La(a, b), "none" !== c && c || (Ja = (Ja || n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement), b = (Ja[0].contentWindow || Ja[0].contentDocument).document, b.write(), b.close(), c = La(a, b), Ja.detach()), Ka[a] = c), c
    }

    var Na = /^margin/, Oa = new RegExp("^(" + T + ")(?!px)[a-z%]+$", "i"), Pa = function (a, b, c, d) {
        var e, f, g = {};
        for (f in b) g[f] = a.style[f], a.style[f] = b[f];
        e = c.apply(a, d || []);
        for (f in b) a.style[f] = g[f];
        return e
    }, Qa = d.documentElement;
    !function () {
        var b, c, e, f, g, h, i = d.createElement("div"), j = d.createElement("div");
        if (j.style) {
            j.style.cssText = "float:left;opacity:.5", l.opacity = "0.5" === j.style.opacity, l.cssFloat = !!j.style.cssFloat, j.style.backgroundClip = "content-box", j.cloneNode(!0).style.backgroundClip = "", l.clearCloneStyle = "content-box" === j.style.backgroundClip, i = d.createElement("div"), i.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", j.innerHTML = "", i.appendChild(j), l.boxSizing = "" === j.style.boxSizing || "" === j.style.MozBoxSizing || "" === j.style.WebkitBoxSizing, n.extend(l, {
                reliableHiddenOffsets: function () {
                    return null == b && k(), f
                }, boxSizingReliable: function () {
                    return null == b && k(), e
                }, pixelMarginRight: function () {
                    return null == b && k(), c
                }, pixelPosition: function () {
                    return null == b && k(), b
                }, reliableMarginRight: function () {
                    return null == b && k(), g
                }, reliableMarginLeft: function () {
                    return null == b && k(), h
                }
            });

            function k() {
                var k, l, m = d.documentElement;
                m.appendChild(i), j.style.cssText = "-webkit-box-sizing:border-box;box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", b = e = h = !1, c = g = !0, a.getComputedStyle && (l = a.getComputedStyle(j), b = "1%" !== (l || {}).top, h = "2px" === (l || {}).marginLeft, e = "4px" === (l || {width: "4px"}).width, j.style.marginRight = "50%", c = "4px" === (l || {marginRight: "4px"}).marginRight, k = j.appendChild(d.createElement("div")), k.style.cssText = j.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", k.style.marginRight = k.style.width = "0", j.style.width = "1px", g = !parseFloat((a.getComputedStyle(k) || {}).marginRight), j.removeChild(k)), j.style.display = "none", f = 0 === j.getClientRects().length, f && (j.style.display = "", j.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", j.childNodes[0].style.borderCollapse = "separate", k = j.getElementsByTagName("td"), k[0].style.cssText = "margin:0;border:0;padding:0;display:none", f = 0 === k[0].offsetHeight, f && (k[0].style.display = "", k[1].style.display = "none", f = 0 === k[0].offsetHeight)), m.removeChild(i)
            }
        }
    }();
    var Ra, Sa, Ta = /^(top|right|bottom|left)$/;
    a.getComputedStyle ? (Ra = function (b) {
        var c = b.ownerDocument.defaultView;
        return c && c.opener || (c = a), c.getComputedStyle(b)
    }, Sa = function (a, b, c) {
        var d, e, f, g, h = a.style;
        return c = c || Ra(a), g = c ? c.getPropertyValue(b) || c[b] : void 0, "" !== g && void 0 !== g || n.contains(a.ownerDocument, a) || (g = n.style(a, b)), c && !l.pixelMarginRight() && Oa.test(g) && Na.test(b) && (d = h.width, e = h.minWidth, f = h.maxWidth, h.minWidth = h.maxWidth = h.width = g, g = c.width, h.width = d, h.minWidth = e, h.maxWidth = f), void 0 === g ? g : g + ""
    }) : Qa.currentStyle && (Ra = function (a) {
        return a.currentStyle
    }, Sa = function (a, b, c) {
        var d, e, f, g, h = a.style;
        return c = c || Ra(a), g = c ? c[b] : void 0, null == g && h && h[b] && (g = h[b]), Oa.test(g) && !Ta.test(b) && (d = h.left, e = a.runtimeStyle, f = e && e.left, f && (e.left = a.currentStyle.left), h.left = "fontSize" === b ? "1em" : g, g = h.pixelLeft + "px", h.left = d, f && (e.left = f)), void 0 === g ? g : g + "" || "auto"
    });

    function Ua(a, b) {
        return {
            get: function () {
                return a() ? void delete this.get : (this.get = b).apply(this, arguments)
            }
        }
    }

    var Va = /alpha\([^)]*\)/i, Wa = /opacity\s*=\s*([^)]*)/i, Xa = /^(none|table(?!-c[ea]).+)/,
        Ya = new RegExp("^(" + T + ")(.*)$", "i"),
        Za = {position: "absolute", visibility: "hidden", display: "block"},
        $a = {letterSpacing: "0", fontWeight: "400"}, _a = ["Webkit", "O", "Moz", "ms"],
        ab = d.createElement("div").style;

    function bb(a) {
        if (a in ab) return a;
        var b = a.charAt(0).toUpperCase() + a.slice(1), c = _a.length;
        while (c--) if (a = _a[c] + b, a in ab) return a
    }

    function cb(a, b) {
        for (var c, d, e, f = [], g = 0, h = a.length; h > g; g++) d = a[g], d.style && (f[g] = n._data(d, "olddisplay"), c = d.style.display, b ? (f[g] || "none" !== c || (d.style.display = ""), "" === d.style.display && W(d) && (f[g] = n._data(d, "olddisplay", Ma(d.nodeName)))) : (e = W(d), (c && "none" !== c || !e) && n._data(d, "olddisplay", e ? c : n.css(d, "display"))));
        for (g = 0; h > g; g++) d = a[g], d.style && (b && "none" !== d.style.display && "" !== d.style.display || (d.style.display = b ? f[g] || "" : "none"));
        return a
    }

    function db(a, b, c) {
        var d = Ya.exec(b);
        return d ? Math.max(0, d[1] - (c || 0)) + (d[2] || "px") : b
    }

    function eb(a, b, c, d, e) {
        for (var f = c === (d ? "border" : "content") ? 4 : "width" === b ? 1 : 0, g = 0; 4 > f; f += 2) "margin" === c && (g += n.css(a, c + V[f], !0, e)), d ? ("content" === c && (g -= n.css(a, "padding" + V[f], !0, e)), "margin" !== c && (g -= n.css(a, "border" + V[f] + "Width", !0, e))) : (g += n.css(a, "padding" + V[f], !0, e), "padding" !== c && (g += n.css(a, "border" + V[f] + "Width", !0, e)));
        return g
    }

    function fb(a, b, c) {
        var d = !0, e = "width" === b ? a.offsetWidth : a.offsetHeight, f = Ra(a),
            g = l.boxSizing && "border-box" === n.css(a, "boxSizing", !1, f);
        if (0 >= e || null == e) {
            if (e = Sa(a, b, f), (0 > e || null == e) && (e = a.style[b]), Oa.test(e)) return e;
            d = g && (l.boxSizingReliable() || e === a.style[b]), e = parseFloat(e) || 0
        }
        return e + eb(a, b, c || (g ? "border" : "content"), d, f) + "px"
    }

    n.extend({
        cssHooks: {
            opacity: {
                get: function (a, b) {
                    if (b) {
                        var c = Sa(a, "opacity");
                        return "" === c ? "1" : c
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {"float": l.cssFloat ? "cssFloat" : "styleFloat"},
        style: function (a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e, f, g, h = n.camelCase(b), i = a.style;
                if (b = n.cssProps[h] || (n.cssProps[h] = bb(h) || h), g = n.cssHooks[b] || n.cssHooks[h], void 0 === c) return g && "get" in g && void 0 !== (e = g.get(a, !1, d)) ? e : i[b];
                if (f = typeof c, "string" === f && (e = U.exec(c)) && e[1] && (c = X(a, b, e), f = "number"), null != c && c === c && ("number" === f && (c += e && e[3] || (n.cssNumber[h] ? "" : "px")), l.clearCloneStyle || "" !== c || 0 !== b.indexOf("background") || (i[b] = "inherit"), !(g && "set" in g && void 0 === (c = g.set(a, c, d))))) try {
                    i[b] = c
                } catch (j) {
                }
            }
        },
        css: function (a, b, c, d) {
            var e, f, g, h = n.camelCase(b);
            return b = n.cssProps[h] || (n.cssProps[h] = bb(h) || h), g = n.cssHooks[b] || n.cssHooks[h], g && "get" in g && (f = g.get(a, !0, c)), void 0 === f && (f = Sa(a, b, d)), "normal" === f && b in $a && (f = $a[b]), "" === c || c ? (e = parseFloat(f), c === !0 || isFinite(e) ? e || 0 : f) : f
        }
    }), n.each(["height", "width"], function (a, b) {
        n.cssHooks[b] = {
            get: function (a, c, d) {
                return c ? Xa.test(n.css(a, "display")) && 0 === a.offsetWidth ? Pa(a, Za, function () {
                    return fb(a, b, d)
                }) : fb(a, b, d) : void 0
            }, set: function (a, c, d) {
                var e = d && Ra(a);
                return db(a, c, d ? eb(a, b, d, l.boxSizing && "border-box" === n.css(a, "boxSizing", !1, e), e) : 0)
            }
        }
    }), l.opacity || (n.cssHooks.opacity = {
        get: function (a, b) {
            return Wa.test((b && a.currentStyle ? a.currentStyle.filter : a.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : b ? "1" : ""
        }, set: function (a, b) {
            var c = a.style, d = a.currentStyle, e = n.isNumeric(b) ? "alpha(opacity=" + 100 * b + ")" : "",
                f = d && d.filter || c.filter || "";
            c.zoom = 1, (b >= 1 || "" === b) && "" === n.trim(f.replace(Va, "")) && c.removeAttribute && (c.removeAttribute("filter"), "" === b || d && !d.filter) || (c.filter = Va.test(f) ? f.replace(Va, e) : f + " " + e)
        }
    }), n.cssHooks.marginRight = Ua(l.reliableMarginRight, function (a, b) {
        return b ? Pa(a, {display: "inline-block"}, Sa, [a, "marginRight"]) : void 0
    }), n.cssHooks.marginLeft = Ua(l.reliableMarginLeft, function (a, b) {
        return b ? (parseFloat(Sa(a, "marginLeft")) || (n.contains(a.ownerDocument, a) ? a.getBoundingClientRect().left - Pa(a, {
            marginLeft: 0
        }, function () {
            return a.getBoundingClientRect().left
        }) : 0)) + "px" : void 0
    }), n.each({margin: "", padding: "", border: "Width"}, function (a, b) {
        n.cssHooks[a + b] = {
            expand: function (c) {
                for (var d = 0, e = {}, f = "string" == typeof c ? c.split(" ") : [c]; 4 > d; d++) e[a + V[d] + b] = f[d] || f[d - 2] || f[0];
                return e
            }
        }, Na.test(a) || (n.cssHooks[a + b].set = db)
    }), n.fn.extend({
        css: function (a, b) {
            return Y(this, function (a, b, c) {
                var d, e, f = {}, g = 0;
                if (n.isArray(b)) {
                    for (d = Ra(a), e = b.length; e > g; g++) f[b[g]] = n.css(a, b[g], !1, d);
                    return f
                }
                return void 0 !== c ? n.style(a, b, c) : n.css(a, b)
            }, a, b, arguments.length > 1)
        }, show: function () {
            return cb(this, !0)
        }, hide: function () {
            return cb(this)
        }, toggle: function (a) {
            return "boolean" == typeof a ? a ? this.show() : this.hide() : this.each(function () {
                W(this) ? n(this).show() : n(this).hide()
            })
        }
    });

    function gb(a, b, c, d, e) {
        return new gb.prototype.init(a, b, c, d, e)
    }

    n.Tween = gb, gb.prototype = {
        constructor: gb, init: function (a, b, c, d, e, f) {
            this.elem = a, this.prop = c, this.easing = e || n.easing._default, this.options = b, this.start = this.now = this.cur(), this.end = d, this.unit = f || (n.cssNumber[c] ? "" : "px")
        }, cur: function () {
            var a = gb.propHooks[this.prop];
            return a && a.get ? a.get(this) : gb.propHooks._default.get(this)
        }, run: function (a) {
            var b, c = gb.propHooks[this.prop];
            return this.options.duration ? this.pos = b = n.easing[this.easing](a, this.options.duration * a, 0, 1, this.options.duration) : this.pos = b = a, this.now = (this.end - this.start) * b + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), c && c.set ? c.set(this) : gb.propHooks._default.set(this), this
        }
    }, gb.prototype.init.prototype = gb.prototype, gb.propHooks = {
        _default: {
            get: function (a) {
                var b;
                return 1 !== a.elem.nodeType || null != a.elem[a.prop] && null == a.elem.style[a.prop] ? a.elem[a.prop] : (b = n.css(a.elem, a.prop, ""), b && "auto" !== b ? b : 0)
            }, set: function (a) {
                n.fx.step[a.prop] ? n.fx.step[a.prop](a) : 1 !== a.elem.nodeType || null == a.elem.style[n.cssProps[a.prop]] && !n.cssHooks[a.prop] ? a.elem[a.prop] = a.now : n.style(a.elem, a.prop, a.now + a.unit)
            }
        }
    }, gb.propHooks.scrollTop = gb.propHooks.scrollLeft = {
        set: function (a) {
            a.elem.nodeType && a.elem.parentNode && (a.elem[a.prop] = a.now)
        }
    }, n.easing = {
        linear: function (a) {
            return a
        }, swing: function (a) {
            return .5 - Math.cos(a * Math.PI) / 2
        }, _default: "swing"
    }, n.fx = gb.prototype.init, n.fx.step = {};
    var hb, ib, jb = /^(?:toggle|show|hide)$/, kb = /queueHooks$/;

    function lb() {
        return a.setTimeout(function () {
            hb = void 0
        }), hb = n.now()
    }

    function mb(a, b) {
        var c, d = {height: a}, e = 0;
        for (b = b ? 1 : 0; 4 > e; e += 2 - b) c = V[e], d["margin" + c] = d["padding" + c] = a;
        return b && (d.opacity = d.width = a), d
    }

    function nb(a, b, c) {
        for (var d, e = (qb.tweeners[b] || []).concat(qb.tweeners["*"]), f = 0, g = e.length; g > f; f++) if (d = e[f].call(c, b, a)) return d
    }

    function ob(a, b, c) {
        var d, e, f, g, h, i, j, k, m = this, o = {}, p = a.style, q = a.nodeType && W(a),
            r = n._data(a, "fxshow");
        c.queue || (h = n._queueHooks(a, "fx"), null == h.unqueued && (h.unqueued = 0, i = h.empty.fire, h.empty.fire = function () {
            h.unqueued || i()
        }), h.unqueued++, m.always(function () {
            m.always(function () {
                h.unqueued--, n.queue(a, "fx").length || h.empty.fire()
            })
        })), 1 === a.nodeType && ("height" in b || "width" in b) && (c.overflow = [p.overflow, p.overflowX, p.overflowY], j = n.css(a, "display"), k = "none" === j ? n._data(a, "olddisplay") || Ma(a.nodeName) : j, "inline" === k && "none" === n.css(a, "float") && (l.inlineBlockNeedsLayout && "inline" !== Ma(a.nodeName) ? p.zoom = 1 : p.display = "inline-block")), c.overflow && (p.overflow = "hidden", l.shrinkWrapBlocks() || m.always(function () {
            p.overflow = c.overflow[0], p.overflowX = c.overflow[1], p.overflowY = c.overflow[2]
        }));
        for (d in b) if (e = b[d], jb.exec(e)) {
            if (delete b[d], f = f || "toggle" === e, e === (q ? "hide" : "show")) {
                if ("show" !== e || !r || void 0 === r[d]) continue;
                q = !0
            }
            o[d] = r && r[d] || n.style(a, d)
        } else j = void 0;
        if (n.isEmptyObject(o)) "inline" === ("none" === j ? Ma(a.nodeName) : j) && (p.display = j); else {
            r ? "hidden" in r && (q = r.hidden) : r = n._data(a, "fxshow", {}), f && (r.hidden = !q), q ? n(a).show() : m.done(function () {
                n(a).hide()
            }), m.done(function () {
                var b;
                n._removeData(a, "fxshow");
                for (b in o) n.style(a, b, o[b])
            });
            for (d in o) g = nb(q ? r[d] : 0, d, m), d in r || (r[d] = g.start, q && (g.end = g.start, g.start = "width" === d || "height" === d ? 1 : 0))
        }
    }

    function pb(a, b) {
        var c, d, e, f, g;
        for (c in a) if (d = n.camelCase(c), e = b[d], f = a[c], n.isArray(f) && (e = f[1], f = a[c] = f[0]), c !== d && (a[d] = f, delete a[c]), g = n.cssHooks[d], g && "expand" in g) {
            f = g.expand(f), delete a[d];
            for (c in f) c in a || (a[c] = f[c], b[c] = e)
        } else b[d] = e
    }

    function qb(a, b, c) {
        var d, e, f = 0, g = qb.prefilters.length, h = n.Deferred().always(function () {
            delete i.elem
        }), i = function () {
            if (e) return !1;
            for (var b = hb || lb(), c = Math.max(0, j.startTime + j.duration - b), d = c / j.duration || 0, f = 1 - d, g = 0, i = j.tweens.length; i > g; g++) j.tweens[g].run(f);
            return h.notifyWith(a, [j, f, c]), 1 > f && i ? c : (h.resolveWith(a, [j]), !1)
        }, j = h.promise({
            elem: a,
            props: n.extend({}, b),
            opts: n.extend(!0, {specialEasing: {}, easing: n.easing._default}, c),
            originalProperties: b,
            originalOptions: c,
            startTime: hb || lb(),
            duration: c.duration,
            tweens: [],
            createTween: function (b, c) {
                var d = n.Tween(a, j.opts, b, c, j.opts.specialEasing[b] || j.opts.easing);
                return j.tweens.push(d), d
            },
            stop: function (b) {
                var c = 0, d = b ? j.tweens.length : 0;
                if (e) return this;
                for (e = !0; d > c; c++) j.tweens[c].run(1);
                return b ? (h.notifyWith(a, [j, 1, 0]), h.resolveWith(a, [j, b])) : h.rejectWith(a, [j, b]), this
            }
        }), k = j.props;
        for (pb(k, j.opts.specialEasing); g > f; f++) if (d = qb.prefilters[f].call(j, a, k, j.opts)) return n.isFunction(d.stop) && (n._queueHooks(j.elem, j.opts.queue).stop = n.proxy(d.stop, d)), d;
        return n.map(k, nb, j), n.isFunction(j.opts.start) && j.opts.start.call(a, j), n.fx.timer(n.extend(i, {
            elem: a,
            anim: j,
            queue: j.opts.queue
        })), j.progress(j.opts.progress).done(j.opts.done, j.opts.complete).fail(j.opts.fail).always(j.opts.always)
    }

    n.Animation = n.extend(qb, {
        tweeners: {
            "*": [function (a, b) {
                var c = this.createTween(a, b);
                return X(c.elem, a, U.exec(b), c), c
            }]
        }, tweener: function (a, b) {
            n.isFunction(a) ? (b = a, a = ["*"]) : a = a.match(G);
            for (var c, d = 0, e = a.length; e > d; d++) c = a[d], qb.tweeners[c] = qb.tweeners[c] || [], qb.tweeners[c].unshift(b)
        }, prefilters: [ob], prefilter: function (a, b) {
            b ? qb.prefilters.unshift(a) : qb.prefilters.push(a)
        }
    }), n.speed = function (a, b, c) {
        var d = a && "object" == typeof a ? n.extend({}, a) : {
            complete: c || !c && b || n.isFunction(a) && a,
            duration: a,
            easing: c && b || b && !n.isFunction(b) && b
        };
        return d.duration = n.fx.off ? 0 : "number" == typeof d.duration ? d.duration : d.duration in n.fx.speeds ? n.fx.speeds[d.duration] : n.fx.speeds._default, null != d.queue && d.queue !== !0 || (d.queue = "fx"), d.old = d.complete, d.complete = function () {
            n.isFunction(d.old) && d.old.call(this), d.queue && n.dequeue(this, d.queue)
        }, d
    }, n.fn.extend({
        fadeTo: function (a, b, c, d) {
            return this.filter(W).css("opacity", 0).show().end().animate({opacity: b}, a, c, d)
        }, animate: function (a, b, c, d) {
            var e = n.isEmptyObject(a), f = n.speed(b, c, d), g = function () {
                var b = qb(this, n.extend({}, a), f);
                (e || n._data(this, "finish")) && b.stop(!0)
            };
            return g.finish = g, e || f.queue === !1 ? this.each(g) : this.queue(f.queue, g)
        }, stop: function (a, b, c) {
            var d = function (a) {
                var b = a.stop;
                delete a.stop, b(c)
            };
            return "string" != typeof a && (c = b, b = a, a = void 0), b && a !== !1 && this.queue(a || "fx", []), this.each(function () {
                var b = !0, e = null != a && a + "queueHooks", f = n.timers, g = n._data(this);
                if (e) g[e] && g[e].stop && d(g[e]); else for (e in g) g[e] && g[e].stop && kb.test(e) && d(g[e]);
                for (e = f.length; e--;) f[e].elem !== this || null != a && f[e].queue !== a || (f[e].anim.stop(c), b = !1, f.splice(e, 1));
                !b && c || n.dequeue(this, a)
            })
        }, finish: function (a) {
            return a !== !1 && (a = a || "fx"), this.each(function () {
                var b, c = n._data(this), d = c[a + "queue"], e = c[a + "queueHooks"], f = n.timers,
                    g = d ? d.length : 0;
                for (c.finish = !0, n.queue(this, a, []), e && e.stop && e.stop.call(this, !0), b = f.length; b--;) f[b].elem === this && f[b].queue === a && (f[b].anim.stop(!0), f.splice(b, 1));
                for (b = 0; g > b; b++) d[b] && d[b].finish && d[b].finish.call(this);
                delete c.finish
            })
        }
    }), n.each(["toggle", "show", "hide"], function (a, b) {
        var c = n.fn[b];
        n.fn[b] = function (a, d, e) {
            return null == a || "boolean" == typeof a ? c.apply(this, arguments) : this.animate(mb(b, !0), a, d, e)
        }
    }), n.each({
        slideDown: mb("show"),
        slideUp: mb("hide"),
        slideToggle: mb("toggle"),
        fadeIn: {opacity: "show"},
        fadeOut: {opacity: "hide"},
        fadeToggle: {opacity: "toggle"}
    }, function (a, b) {
        n.fn[a] = function (a, c, d) {
            return this.animate(b, a, c, d)
        }
    }), n.timers = [], n.fx.tick = function () {
        var a, b = n.timers, c = 0;
        for (hb = n.now(); c < b.length; c++) a = b[c], a() || b[c] !== a || b.splice(c--, 1);
        b.length || n.fx.stop(), hb = void 0
    }, n.fx.timer = function (a) {
        n.timers.push(a), a() ? n.fx.start() : n.timers.pop()
    }, n.fx.interval = 13, n.fx.start = function () {
        ib || (ib = a.setInterval(n.fx.tick, n.fx.interval))
    }, n.fx.stop = function () {
        a.clearInterval(ib), ib = null
    }, n.fx.speeds = {slow: 600, fast: 200, _default: 400}, n.fn.delay = function (b, c) {
        return b = n.fx ? n.fx.speeds[b] || b : b, c = c || "fx", this.queue(c, function (c, d) {
            var e = a.setTimeout(c, b);
            d.stop = function () {
                a.clearTimeout(e)
            }
        })
    }, function () {
        var a, b = d.createElement("input"), c = d.createElement("div"), e = d.createElement("select"),
            f = e.appendChild(d.createElement("option"));
        c = d.createElement("div"), c.setAttribute("className", "t"), c.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", a = c.getElementsByTagName("a")[0], b.setAttribute("type", "checkbox"), c.appendChild(b), a = c.getElementsByTagName("a")[0], a.style.cssText = "top:1px", l.getSetAttribute = "t" !== c.className, l.style = /top/.test(a.getAttribute("style")), l.hrefNormalized = "/a" === a.getAttribute("href"), l.checkOn = !!b.value, l.optSelected = f.selected, l.enctype = !!d.createElement("form").enctype, e.disabled = !0, l.optDisabled = !f.disabled, b = d.createElement("input"), b.setAttribute("value", ""), l.input = "" === b.getAttribute("value"), b.value = "t", b.setAttribute("type", "radio"), l.radioValue = "t" === b.value
    }();
    var rb = /\r/g, sb = /[\x20\t\r\n\f]+/g;
    n.fn.extend({
        val: function (a) {
            var b, c, d, e = this[0];
            {
                if (arguments.length) return d = n.isFunction(a), this.each(function (c) {
                    var e;
                    1 === this.nodeType && (e = d ? a.call(this, c, n(this).val()) : a, null == e ? e = "" : "number" == typeof e ? e += "" : n.isArray(e) && (e = n.map(e, function (a) {
                        return null == a ? "" : a + ""
                    })), b = n.valHooks[this.type] || n.valHooks[this.nodeName.toLowerCase()], b && "set" in b && void 0 !== b.set(this, e, "value") || (this.value = e))
                });
                if (e) return b = n.valHooks[e.type] || n.valHooks[e.nodeName.toLowerCase()], b && "get" in b && void 0 !== (c = b.get(e, "value")) ? c : (c = e.value, "string" == typeof c ? c.replace(rb, "") : null == c ? "" : c)
            }
        }
    }), n.extend({
        valHooks: {
            option: {
                get: function (a) {
                    var b = n.find.attr(a, "value");
                    return null != b ? b : n.trim(n.text(a)).replace(sb, " ")
                }
            }, select: {
                get: function (a) {
                    for (var b, c, d = a.options, e = a.selectedIndex, f = "select-one" === a.type || 0 > e, g = f ? null : [], h = f ? e + 1 : d.length, i = 0 > e ? h : f ? e : 0; h > i; i++) if (c = d[i], (c.selected || i === e) && (l.optDisabled ? !c.disabled : null === c.getAttribute("disabled")) && (!c.parentNode.disabled || !n.nodeName(c.parentNode, "optgroup"))) {
                        if (b = n(c).val(), f) return b;
                        g.push(b)
                    }
                    return g
                }, set: function (a, b) {
                    var c, d, e = a.options, f = n.makeArray(b), g = e.length;
                    while (g--) if (d = e[g], n.inArray(n.valHooks.option.get(d), f) > -1) try {
                        d.selected = c = !0
                    } catch (h) {
                        d.scrollHeight
                    } else d.selected = !1;
                    return c || (a.selectedIndex = -1), e
                }
            }
        }
    }), n.each(["radio", "checkbox"], function () {
        n.valHooks[this] = {
            set: function (a, b) {
                return n.isArray(b) ? a.checked = n.inArray(n(a).val(), b) > -1 : void 0
            }
        }, l.checkOn || (n.valHooks[this].get = function (a) {
            return null === a.getAttribute("value") ? "on" : a.value
        })
    });
    var tb, ub, vb = n.expr.attrHandle, wb = /^(?:checked|selected)$/i, xb = l.getSetAttribute, yb = l.input;
    n.fn.extend({
        attr: function (a, b) {
            return Y(this, n.attr, a, b, arguments.length > 1)
        }, removeAttr: function (a) {
            return this.each(function () {
                n.removeAttr(this, a)
            })
        }
    }), n.extend({
        attr: function (a, b, c) {
            var d, e, f = a.nodeType;
            if (3 !== f && 8 !== f && 2 !== f) return "undefined" == typeof a.getAttribute ? n.prop(a, b, c) : (1 === f && n.isXMLDoc(a) || (b = b.toLowerCase(), e = n.attrHooks[b] || (n.expr.match.bool.test(b) ? ub : tb)), void 0 !== c ? null === c ? void n.removeAttr(a, b) : e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : (a.setAttribute(b, c + ""), c) : e && "get" in e && null !== (d = e.get(a, b)) ? d : (d = n.find.attr(a, b), null == d ? void 0 : d))
        }, attrHooks: {
            type: {
                set: function (a, b) {
                    if (!l.radioValue && "radio" === b && n.nodeName(a, "input")) {
                        var c = a.value;
                        return a.setAttribute("type", b), c && (a.value = c), b
                    }
                }
            }
        }, removeAttr: function (a, b) {
            var c, d, e = 0, f = b && b.match(G);
            if (f && 1 === a.nodeType) while (c = f[e++]) d = n.propFix[c] || c, n.expr.match.bool.test(c) ? yb && xb || !wb.test(c) ? a[d] = !1 : a[n.camelCase("default-" + c)] = a[d] = !1 : n.attr(a, c, ""), a.removeAttribute(xb ? c : d)
        }
    }), ub = {
        set: function (a, b, c) {
            return b === !1 ? n.removeAttr(a, c) : yb && xb || !wb.test(c) ? a.setAttribute(!xb && n.propFix[c] || c, c) : a[n.camelCase("default-" + c)] = a[c] = !0, c
        }
    }, n.each(n.expr.match.bool.source.match(/\w+/g), function (a, b) {
        var c = vb[b] || n.find.attr;
        yb && xb || !wb.test(b) ? vb[b] = function (a, b, d) {
            var e, f;
            return d || (f = vb[b], vb[b] = e, e = null != c(a, b, d) ? b.toLowerCase() : null, vb[b] = f), e
        } : vb[b] = function (a, b, c) {
            return c ? void 0 : a[n.camelCase("default-" + b)] ? b.toLowerCase() : null
        }
    }), yb && xb || (n.attrHooks.value = {
        set: function (a, b, c) {
            return n.nodeName(a, "input") ? void (a.defaultValue = b) : tb && tb.set(a, b, c)
        }
    }), xb || (tb = {
        set: function (a, b, c) {
            var d = a.getAttributeNode(c);
            return d || a.setAttributeNode(d = a.ownerDocument.createAttribute(c)), d.value = b += "", "value" === c || b === a.getAttribute(c) ? b : void 0
        }
    }, vb.id = vb.name = vb.coords = function (a, b, c) {
        var d;
        return c ? void 0 : (d = a.getAttributeNode(b)) && "" !== d.value ? d.value : null
    }, n.valHooks.button = {
        get: function (a, b) {
            var c = a.getAttributeNode(b);
            return c && c.specified ? c.value : void 0
        }, set: tb.set
    }, n.attrHooks.contenteditable = {
        set: function (a, b, c) {
            tb.set(a, "" === b ? !1 : b, c)
        }
    }, n.each(["width", "height"], function (a, b) {
        n.attrHooks[b] = {
            set: function (a, c) {
                return "" === c ? (a.setAttribute(b, "auto"), c) : void 0
            }
        }
    })), l.style || (n.attrHooks.style = {
        get: function (a) {
            return a.style.cssText || void 0
        }, set: function (a, b) {
            return a.style.cssText = b + ""
        }
    });
    var zb = /^(?:input|select|textarea|button|object)$/i, Ab = /^(?:a|area)$/i;
    n.fn.extend({
        prop: function (a, b) {
            return Y(this, n.prop, a, b, arguments.length > 1)
        }, removeProp: function (a) {
            return a = n.propFix[a] || a, this.each(function () {
                try {
                    this[a] = void 0, delete this[a]
                } catch (b) {
                }
            })
        }
    }), n.extend({
        prop: function (a, b, c) {
            var d, e, f = a.nodeType;
            if (3 !== f && 8 !== f && 2 !== f) return 1 === f && n.isXMLDoc(a) || (b = n.propFix[b] || b, e = n.propHooks[b]), void 0 !== c ? e && "set" in e && void 0 !== (d = e.set(a, c, b)) ? d : a[b] = c : e && "get" in e && null !== (d = e.get(a, b)) ? d : a[b]
        }, propHooks: {
            tabIndex: {
                get: function (a) {
                    var b = n.find.attr(a, "tabindex");
                    return b ? parseInt(b, 10) : zb.test(a.nodeName) || Ab.test(a.nodeName) && a.href ? 0 : -1
                }
            }
        }, propFix: {"for": "htmlFor", "class": "className"}
    }), l.hrefNormalized || n.each(["href", "src"], function (a, b) {
        n.propHooks[b] = {
            get: function (a) {
                return a.getAttribute(b, 4)
            }
        }
    }), l.optSelected || (n.propHooks.selected = {
        get: function (a) {
            var b = a.parentNode;
            return b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex), null
        }, set: function (a) {
            var b = a.parentNode;
            b && (b.selectedIndex, b.parentNode && b.parentNode.selectedIndex)
        }
    }), n.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        n.propFix[this.toLowerCase()] = this
    }), l.enctype || (n.propFix.enctype = "encoding");
    var Bb = /[\t\r\n\f]/g;

    function Cb(a) {
        return n.attr(a, "class") || ""
    }

    n.fn.extend({
        addClass: function (a) {
            var b, c, d, e, f, g, h, i = 0;
            if (n.isFunction(a)) return this.each(function (b) {
                n(this).addClass(a.call(this, b, Cb(this)))
            });
            if ("string" == typeof a && a) {
                b = a.match(G) || [];
                while (c = this[i++]) if (e = Cb(c), d = 1 === c.nodeType && (" " + e + " ").replace(Bb, " ")) {
                    g = 0;
                    while (f = b[g++]) d.indexOf(" " + f + " ") < 0 && (d += f + " ");
                    h = n.trim(d), e !== h && n.attr(c, "class", h)
                }
            }
            return this
        }, removeClass: function (a) {
            var b, c, d, e, f, g, h, i = 0;
            if (n.isFunction(a)) return this.each(function (b) {
                n(this).removeClass(a.call(this, b, Cb(this)))
            });
            if (!arguments.length) return this.attr("class", "");
            if ("string" == typeof a && a) {
                b = a.match(G) || [];
                while (c = this[i++]) if (e = Cb(c), d = 1 === c.nodeType && (" " + e + " ").replace(Bb, " ")) {
                    g = 0;
                    while (f = b[g++]) while (d.indexOf(" " + f + " ") > -1) d = d.replace(" " + f + " ", " ");
                    h = n.trim(d), e !== h && n.attr(c, "class", h)
                }
            }
            return this
        }, toggleClass: function (a, b) {
            var c = typeof a;
            return "boolean" == typeof b && "string" === c ? b ? this.addClass(a) : this.removeClass(a) : n.isFunction(a) ? this.each(function (c) {
                n(this).toggleClass(a.call(this, c, Cb(this), b), b)
            }) : this.each(function () {
                var b, d, e, f;
                if ("string" === c) {
                    d = 0, e = n(this), f = a.match(G) || [];
                    while (b = f[d++]) e.hasClass(b) ? e.removeClass(b) : e.addClass(b)
                } else void 0 !== a && "boolean" !== c || (b = Cb(this), b && n._data(this, "__className__", b), n.attr(this, "class", b || a === !1 ? "" : n._data(this, "__className__") || ""))
            })
        }, hasClass: function (a) {
            var b, c, d = 0;
            b = " " + a + " ";
            while (c = this[d++]) if (1 === c.nodeType && (" " + Cb(c) + " ").replace(Bb, " ").indexOf(b) > -1) return !0;
            return !1
        }
    }), n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (a, b) {
        n.fn[b] = function (a, c) {
            return arguments.length > 0 ? this.on(b, null, a, c) : this.trigger(b)
        }
    }), n.fn.extend({
        hover: function (a, b) {
            return this.mouseenter(a).mouseleave(b || a)
        }
    });
    var Db = a.location, Eb = n.now(), Fb = /\?/,
        Gb = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    n.parseJSON = function (b) {
        if (a.JSON && a.JSON.parse) return a.JSON.parse(b + "");
        var c, d = null, e = n.trim(b + "");
        return e && !n.trim(e.replace(Gb, function (a, b, e, f) {
            return c && b && (d = 0), 0 === d ? a : (c = e || b, d += !f - !e, "")
        })) ? Function("return " + e)() : n.error("Invalid JSON: " + b)
    }, n.parseXML = function (b) {
        var c, d;
        if (!b || "string" != typeof b) return null;
        try {
            a.DOMParser ? (d = new a.DOMParser, c = d.parseFromString(b, "text/xml")) : (c = new a.ActiveXObject("Microsoft.XMLDOM"), c.async = "false", c.loadXML(b))
        } catch (e) {
            c = void 0
        }
        return c && c.documentElement && !c.getElementsByTagName("parsererror").length || n.error("Invalid XML: " + b), c
    };
    var Hb = /#.*$/, Ib = /([?&])_=[^&]*/, Jb = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        Kb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, Lb = /^(?:GET|HEAD)$/, Mb = /^\/\//,
        Nb = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, Ob = {}, Pb = {},
        Qb = "*/".concat("*"), Rb = Db.href, Sb = Nb.exec(Rb.toLowerCase()) || [];

    function Tb(a) {
        return function (b, c) {
            "string" != typeof b && (c = b, b = "*");
            var d, e = 0, f = b.toLowerCase().match(G) || [];
            if (n.isFunction(c)) while (d = f[e++]) "+" === d.charAt(0) ? (d = d.slice(1) || "*", (a[d] = a[d] || []).unshift(c)) : (a[d] = a[d] || []).push(c)
        }
    }

    function Ub(a, b, c, d) {
        var e = {}, f = a === Pb;

        function g(h) {
            var i;
            return e[h] = !0, n.each(a[h] || [], function (a, h) {
                var j = h(b, c, d);
                return "string" != typeof j || f || e[j] ? f ? !(i = j) : void 0 : (b.dataTypes.unshift(j), g(j), !1)
            }), i
        }

        return g(b.dataTypes[0]) || !e["*"] && g("*")
    }

    function Vb(a, b) {
        var c, d, e = n.ajaxSettings.flatOptions || {};
        for (d in b) void 0 !== b[d] && ((e[d] ? a : c || (c = {}))[d] = b[d]);
        return c && n.extend(!0, a, c), a
    }

    function Wb(a, b, c) {
        var d, e, f, g, h = a.contents, i = a.dataTypes;
        while ("*" === i[0]) i.shift(), void 0 === e && (e = a.mimeType || b.getResponseHeader("Content-Type"));
        if (e) for (g in h) if (h[g] && h[g].test(e)) {
            i.unshift(g);
            break
        }
        if (i[0] in c) f = i[0]; else {
            for (g in c) {
                if (!i[0] || a.converters[g + " " + i[0]]) {
                    f = g;
                    break
                }
                d || (d = g)
            }
            f = f || d
        }
        return f ? (f !== i[0] && i.unshift(f), c[f]) : void 0
    }

    function Xb(a, b, c, d) {
        var e, f, g, h, i, j = {}, k = a.dataTypes.slice();
        if (k[1]) for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
        f = k.shift();
        while (f) if (a.responseFields[f] && (c[a.responseFields[f]] = b), !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)), i = f, f = k.shift()) if ("*" === f) f = i; else if ("*" !== i && i !== f) {
            if (g = j[i + " " + f] || j["* " + f], !g) for (e in j) if (h = e.split(" "), h[1] === f && (g = j[i + " " + h[0]] || j["* " + h[0]])) {
                g === !0 ? g = j[e] : j[e] !== !0 && (f = h[0], k.unshift(h[1]));
                break
            }
            if (g !== !0) if (g && a["throws"]) b = g(b); else try {
                b = g(b)
            } catch (l) {
                return {state: "parsererror", error: g ? l : "No conversion from " + i + " to " + f}
            }
        }
        return {state: "success", data: b}
    }

    n.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: Rb,
            type: "GET",
            isLocal: Kb.test(Sb[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": Qb,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/},
            responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
            converters: {"* text": String, "text html": !0, "text json": n.parseJSON, "text xml": n.parseXML},
            flatOptions: {url: !0, context: !0}
        },
        ajaxSetup: function (a, b) {
            return b ? Vb(Vb(a, n.ajaxSettings), b) : Vb(n.ajaxSettings, a)
        },
        ajaxPrefilter: Tb(Ob),
        ajaxTransport: Tb(Pb),
        ajax: function (b, c) {
            "object" == typeof b && (c = b, b = void 0), c = c || {};
            var d, e, f, g, h, i, j, k, l = n.ajaxSetup({}, c), m = l.context || l,
                o = l.context && (m.nodeType || m.jquery) ? n(m) : n.event, p = n.Deferred(),
                q = n.Callbacks("once memory"), r = l.statusCode || {}, s = {}, t = {}, u = 0, v = "canceled",
                w = {
                    readyState: 0, getResponseHeader: function (a) {
                        var b;
                        if (2 === u) {
                            if (!k) {
                                k = {};
                                while (b = Jb.exec(g)) k[b[1].toLowerCase()] = b[2]
                            }
                            b = k[a.toLowerCase()]
                        }
                        return null == b ? null : b
                    }, getAllResponseHeaders: function () {
                        return 2 === u ? g : null
                    }, setRequestHeader: function (a, b) {
                        var c = a.toLowerCase();
                        return u || (a = t[c] = t[c] || a, s[a] = b), this
                    }, overrideMimeType: function (a) {
                        return u || (l.mimeType = a), this
                    }, statusCode: function (a) {
                        var b;
                        if (a) if (2 > u) for (b in a) r[b] = [r[b], a[b]]; else w.always(a[w.status]);
                        return this
                    }, abort: function (a) {
                        var b = a || v;
                        return j && j.abort(b), y(0, b), this
                    }
                };
            if (p.promise(w).complete = q.add, w.success = w.done, w.error = w.fail, l.url = ((b || l.url || Rb) + "").replace(Hb, "").replace(Mb, Sb[1] + "//"), l.type = c.method || c.type || l.method || l.type, l.dataTypes = n.trim(l.dataType || "*").toLowerCase().match(G) || [""], null == l.crossDomain && (d = Nb.exec(l.url.toLowerCase()), l.crossDomain = !(!d || d[1] === Sb[1] && d[2] === Sb[2] && (d[3] || ("http:" === d[1] ? "80" : "443")) === (Sb[3] || ("http:" === Sb[1] ? "80" : "443")))), l.data && l.processData && "string" != typeof l.data && (l.data = n.param(l.data, l.traditional)), Ub(Ob, l, c, w), 2 === u) return w;
            i = n.event && l.global, i && 0 === n.active++ && n.event.trigger("ajaxStart"), l.type = l.type.toUpperCase(), l.hasContent = !Lb.test(l.type), f = l.url, l.hasContent || (l.data && (f = l.url += (Fb.test(f) ? "&" : "?") + l.data, delete l.data), l.cache === !1 && (l.url = Ib.test(f) ? f.replace(Ib, "$1_=" + Eb++) : f + (Fb.test(f) ? "&" : "?") + "_=" + Eb++)), l.ifModified && (n.lastModified[f] && w.setRequestHeader("If-Modified-Since", n.lastModified[f]), n.etag[f] && w.setRequestHeader("If-None-Match", n.etag[f])), (l.data && l.hasContent && l.contentType !== !1 || c.contentType) && w.setRequestHeader("Content-Type", l.contentType), w.setRequestHeader("Accept", l.dataTypes[0] && l.accepts[l.dataTypes[0]] ? l.accepts[l.dataTypes[0]] + ("*" !== l.dataTypes[0] ? ", " + Qb + "; q=0.01" : "") : l.accepts["*"]);
            for (e in l.headers) w.setRequestHeader(e, l.headers[e]);
            if (l.beforeSend && (l.beforeSend.call(m, w, l) === !1 || 2 === u)) return w.abort();
            v = "abort";
            for (e in{success: 1, error: 1, complete: 1}) w[e](l[e]);
            if (j = Ub(Pb, l, c, w)) {
                if (w.readyState = 1, i && o.trigger("ajaxSend", [w, l]), 2 === u) return w;
                l.async && l.timeout > 0 && (h = a.setTimeout(function () {
                    w.abort("timeout")
                }, l.timeout));
                try {
                    u = 1, j.send(s, y)
                } catch (x) {
                    if (!(2 > u)) throw x;
                    y(-1, x)
                }
            } else y(-1, "No Transport");

            function y(b, c, d, e) {
                var k, s, t, v, x, y = c;
                2 !== u && (u = 2, h && a.clearTimeout(h), j = void 0, g = e || "", w.readyState = b > 0 ? 4 : 0, k = b >= 200 && 300 > b || 304 === b, d && (v = Wb(l, w, d)), v = Xb(l, v, w, k), k ? (l.ifModified && (x = w.getResponseHeader("Last-Modified"), x && (n.lastModified[f] = x), x = w.getResponseHeader("etag"), x && (n.etag[f] = x)), 204 === b || "HEAD" === l.type ? y = "nocontent" : 304 === b ? y = "notmodified" : (y = v.state, s = v.data, t = v.error, k = !t)) : (t = y, !b && y || (y = "error", 0 > b && (b = 0))), w.status = b, w.statusText = (c || y) + "", k ? p.resolveWith(m, [s, y, w]) : p.rejectWith(m, [w, y, t]), w.statusCode(r), r = void 0, i && o.trigger(k ? "ajaxSuccess" : "ajaxError", [w, l, k ? s : t]), q.fireWith(m, [w, y]), i && (o.trigger("ajaxComplete", [w, l]), --n.active || n.event.trigger("ajaxStop")))
            }

            return w
        },
        getJSON: function (a, b, c) {
            return n.get(a, b, c, "json")
        },
        getScript: function (a, b) {
            return n.get(a, void 0, b, "script")
        }
    }), n.each(["get", "post"], function (a, b) {
        n[b] = function (a, c, d, e) {
            return n.isFunction(c) && (e = e || d, d = c, c = void 0), n.ajax(n.extend({
                url: a,
                type: b,
                dataType: e,
                data: c,
                success: d
            }, n.isPlainObject(a) && a))
        }
    }), n._evalUrl = function (a) {
        return n.ajax({url: a, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, "throws": !0})
    }, n.fn.extend({
        wrapAll: function (a) {
            if (n.isFunction(a)) return this.each(function (b) {
                n(this).wrapAll(a.call(this, b))
            });
            if (this[0]) {
                var b = n(a, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && b.insertBefore(this[0]), b.map(function () {
                    var a = this;
                    while (a.firstChild && 1 === a.firstChild.nodeType) a = a.firstChild;
                    return a
                }).append(this)
            }
            return this
        }, wrapInner: function (a) {
            return n.isFunction(a) ? this.each(function (b) {
                n(this).wrapInner(a.call(this, b))
            }) : this.each(function () {
                var b = n(this), c = b.contents();
                c.length ? c.wrapAll(a) : b.append(a)
            })
        }, wrap: function (a) {
            var b = n.isFunction(a);
            return this.each(function (c) {
                n(this).wrapAll(b ? a.call(this, c) : a)
            })
        }, unwrap: function () {
            return this.parent().each(function () {
                n.nodeName(this, "body") || n(this).replaceWith(this.childNodes)
            }).end()
        }
    });

    function Yb(a) {
        return a.style && a.style.display || n.css(a, "display")
    }

    function Zb(a) {
        if (!n.contains(a.ownerDocument || d, a)) return !0;
        while (a && 1 === a.nodeType) {
            if ("none" === Yb(a) || "hidden" === a.type) return !0;
            a = a.parentNode
        }
        return !1
    }

    n.expr.filters.hidden = function (a) {
        return l.reliableHiddenOffsets() ? a.offsetWidth <= 0 && a.offsetHeight <= 0 && !a.getClientRects().length : Zb(a)
    }, n.expr.filters.visible = function (a) {
        return !n.expr.filters.hidden(a)
    };
    var $b = /%20/g, _b = /\[\]$/, ac = /\r?\n/g, bc = /^(?:submit|button|image|reset|file)$/i,
        cc = /^(?:input|select|textarea|keygen)/i;

    function dc(a, b, c, d) {
        var e;
        if (n.isArray(b)) n.each(b, function (b, e) {
            c || _b.test(a) ? d(a, e) : dc(a + "[" + ("object" == typeof e && null != e ? b : "") + "]", e, c, d)
        }); else if (c || "object" !== n.type(b)) d(a, b); else for (e in b) dc(a + "[" + e + "]", b[e], c, d)
    }

    n.param = function (a, b) {
        var c, d = [], e = function (a, b) {
            b = n.isFunction(b) ? b() : null == b ? "" : b, d[d.length] = encodeURIComponent(a) + "=" + encodeURIComponent(b)
        };
        if (void 0 === b && (b = n.ajaxSettings && n.ajaxSettings.traditional), n.isArray(a) || a.jquery && !n.isPlainObject(a)) n.each(a, function () {
            e(this.name, this.value)
        }); else for (c in a) dc(c, a[c], b, e);
        return d.join("&").replace($b, "+")
    }, n.fn.extend({
        serialize: function () {
            return n.param(this.serializeArray())
        }, serializeArray: function () {
            return this.map(function () {
                var a = n.prop(this, "elements");
                return a ? n.makeArray(a) : this
            }).filter(function () {
                var a = this.type;
                return this.name && !n(this).is(":disabled") && cc.test(this.nodeName) && !bc.test(a) && (this.checked || !Z.test(a))
            }).map(function (a, b) {
                var c = n(this).val();
                return null == c ? null : n.isArray(c) ? n.map(c, function (a) {
                    return {name: b.name, value: a.replace(ac, "\r\n")}
                }) : {name: b.name, value: c.replace(ac, "\r\n")}
            }).get()
        }
    }), n.ajaxSettings.xhr = void 0 !== a.ActiveXObject ? function () {
        return this.isLocal ? ic() : d.documentMode > 8 ? hc() : /^(get|post|head|put|delete|options)$/i.test(this.type) && hc() || ic()
    } : hc;
    var ec = 0, fc = {}, gc = n.ajaxSettings.xhr();
    a.attachEvent && a.attachEvent("onunload", function () {
        for (var a in fc) fc[a](void 0, !0)
    }), l.cors = !!gc && "withCredentials" in gc, gc = l.ajax = !!gc, gc && n.ajaxTransport(function (b) {
        if (!b.crossDomain || l.cors) {
            var c;
            return {
                send: function (d, e) {
                    var f, g = b.xhr(), h = ++ec;
                    if (g.open(b.type, b.url, b.async, b.username, b.password), b.xhrFields) for (f in b.xhrFields) g[f] = b.xhrFields[f];
                    b.mimeType && g.overrideMimeType && g.overrideMimeType(b.mimeType), b.crossDomain || d["X-Requested-With"] || (d["X-Requested-With"] = "XMLHttpRequest");
                    for (f in d) void 0 !== d[f] && g.setRequestHeader(f, d[f] + "");
                    g.send(b.hasContent && b.data || null), c = function (a, d) {
                        var f, i, j;
                        if (c && (d || 4 === g.readyState)) if (delete fc[h], c = void 0, g.onreadystatechange = n.noop, d) 4 !== g.readyState && g.abort(); else {
                            j = {}, f = g.status, "string" == typeof g.responseText && (j.text = g.responseText);
                            try {
                                i = g.statusText
                            } catch (k) {
                                i = ""
                            }
                            f || !b.isLocal || b.crossDomain ? 1223 === f && (f = 204) : f = j.text ? 200 : 404
                        }
                        j && e(f, i, j, g.getAllResponseHeaders())
                    }, b.async ? 4 === g.readyState ? a.setTimeout(c) : g.onreadystatechange = fc[h] = c : c()
                }, abort: function () {
                    c && c(void 0, !0)
                }
            }
        }
    });

    function hc() {
        try {
            return new a.XMLHttpRequest
        } catch (b) {
        }
    }

    function ic() {
        try {
            return new a.ActiveXObject("Microsoft.XMLHTTP")
        } catch (b) {
        }
    }

    n.ajaxSetup({
        accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
        contents: {script: /\b(?:java|ecma)script\b/},
        converters: {
            "text script": function (a) {
                return n.globalEval(a), a
            }
        }
    }), n.ajaxPrefilter("script", function (a) {
        void 0 === a.cache && (a.cache = !1), a.crossDomain && (a.type = "GET", a.global = !1)
    }), n.ajaxTransport("script", function (a) {
        if (a.crossDomain) {
            var b, c = d.head || n("head")[0] || d.documentElement;
            return {
                send: function (e, f) {
                    b = d.createElement("script"), b.async = !0, a.scriptCharset && (b.charset = a.scriptCharset), b.src = a.url, b.onload = b.onreadystatechange = function (a, c) {
                        (c || !b.readyState || /loaded|complete/.test(b.readyState)) && (b.onload = b.onreadystatechange = null, b.parentNode && b.parentNode.removeChild(b), b = null, c || f(200, "success"))
                    }, c.insertBefore(b, c.firstChild)
                }, abort: function () {
                    b && b.onload(void 0, !0)
                }
            }
        }
    });
    var jc = [], kc = /(=)\?(?=&|$)|\?\?/;
    n.ajaxSetup({
        jsonp: "callback", jsonpCallback: function () {
            var a = jc.pop() || n.expando + "_" + Eb++;
            return this[a] = !0, a
        }
    }), n.ajaxPrefilter("json jsonp", function (b, c, d) {
        var e, f, g,
            h = b.jsonp !== !1 && (kc.test(b.url) ? "url" : "string" == typeof b.data && 0 === (b.contentType || "").indexOf("application/x-www-form-urlencoded") && kc.test(b.data) && "data");
        return h || "jsonp" === b.dataTypes[0] ? (e = b.jsonpCallback = n.isFunction(b.jsonpCallback) ? b.jsonpCallback() : b.jsonpCallback, h ? b[h] = b[h].replace(kc, "$1" + e) : b.jsonp !== !1 && (b.url += (Fb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e), b.converters["script json"] = function () {
            return g || n.error(e + " was not called"), g[0]
        }, b.dataTypes[0] = "json", f = a[e], a[e] = function () {
            g = arguments
        }, d.always(function () {
            void 0 === f ? n(a).removeProp(e) : a[e] = f, b[e] && (b.jsonpCallback = c.jsonpCallback, jc.push(e)), g && n.isFunction(f) && f(g[0]), g = f = void 0
        }), "script") : void 0
    }), n.parseHTML = function (a, b, c) {
        if (!a || "string" != typeof a) return null;
        "boolean" == typeof b && (c = b, b = !1), b = b || d;
        var e = x.exec(a), f = !c && [];
        return e ? [b.createElement(e[1])] : (e = ja([a], b, f), f && f.length && n(f).remove(), n.merge([], e.childNodes))
    };
    var lc = n.fn.load;
    n.fn.load = function (a, b, c) {
        if ("string" != typeof a && lc) return lc.apply(this, arguments);
        var d, e, f, g = this, h = a.indexOf(" ");
        return h > -1 && (d = n.trim(a.slice(h, a.length)), a = a.slice(0, h)), n.isFunction(b) ? (c = b, b = void 0) : b && "object" == typeof b && (e = "POST"), g.length > 0 && n.ajax({
            url: a,
            type: e || "GET",
            dataType: "html",
            data: b
        }).done(function (a) {
            f = arguments, g.html(d ? n("<div>").append(n.parseHTML(a)).find(d) : a)
        }).always(c && function (a, b) {
            g.each(function () {
                c.apply(this, f || [a.responseText, b, a])
            })
        }), this
    }, n.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (a, b) {
        n.fn[b] = function (a) {
            return this.on(b, a)
        }
    }), n.expr.filters.animated = function (a) {
        return n.grep(n.timers, function (b) {
            return a === b.elem
        }).length
    };

    function mc(a) {
        return n.isWindow(a) ? a : 9 === a.nodeType ? a.defaultView || a.parentWindow : !1
    }

    n.offset = {
        setOffset: function (a, b, c) {
            var d, e, f, g, h, i, j, k = n.css(a, "position"), l = n(a), m = {};
            "static" === k && (a.style.position = "relative"), h = l.offset(), f = n.css(a, "top"), i = n.css(a, "left"), j = ("absolute" === k || "fixed" === k) && n.inArray("auto", [f, i]) > -1, j ? (d = l.position(), g = d.top, e = d.left) : (g = parseFloat(f) || 0, e = parseFloat(i) || 0), n.isFunction(b) && (b = b.call(a, c, n.extend({}, h))), null != b.top && (m.top = b.top - h.top + g), null != b.left && (m.left = b.left - h.left + e), "using" in b ? b.using.call(a, m) : l.css(m)
        }
    }, n.fn.extend({
        offset: function (a) {
            if (arguments.length) return void 0 === a ? this : this.each(function (b) {
                n.offset.setOffset(this, a, b)
            });
            var b, c, d = {top: 0, left: 0}, e = this[0], f = e && e.ownerDocument;
            if (f) return b = f.documentElement, n.contains(b, e) ? ("undefined" != typeof e.getBoundingClientRect && (d = e.getBoundingClientRect()), c = mc(f), {
                top: d.top + (c.pageYOffset || b.scrollTop) - (b.clientTop || 0),
                left: d.left + (c.pageXOffset || b.scrollLeft) - (b.clientLeft || 0)
            }) : d
        }, position: function () {
            if (this[0]) {
                var a, b, c = {top: 0, left: 0}, d = this[0];
                return "fixed" === n.css(d, "position") ? b = d.getBoundingClientRect() : (a = this.offsetParent(), b = this.offset(), n.nodeName(a[0], "html") || (c = a.offset()), c.top += n.css(a[0], "borderTopWidth", !0), c.left += n.css(a[0], "borderLeftWidth", !0)), {
                    top: b.top - c.top - n.css(d, "marginTop", !0),
                    left: b.left - c.left - n.css(d, "marginLeft", !0)
                }
            }
        }, offsetParent: function () {
            return this.map(function () {
                var a = this.offsetParent;
                while (a && !n.nodeName(a, "html") && "static" === n.css(a, "position")) a = a.offsetParent;
                return a || Qa
            })
        }
    }), n.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (a, b) {
        var c = /Y/.test(b);
        n.fn[a] = function (d) {
            return Y(this, function (a, d, e) {
                var f = mc(a);
                return void 0 === e ? f ? b in f ? f[b] : f.document.documentElement[d] : a[d] : void (f ? f.scrollTo(c ? n(f).scrollLeft() : e, c ? e : n(f).scrollTop()) : a[d] = e)
            }, a, d, arguments.length, null)
        }
    }), n.each(["top", "left"], function (a, b) {
        n.cssHooks[b] = Ua(l.pixelPosition, function (a, c) {
            return c ? (c = Sa(a, b), Oa.test(c) ? n(a).position()[b] + "px" : c) : void 0
        })
    }), n.each({Height: "height", Width: "width"}, function (a, b) {
        n.each({
            padding: "inner" + a, content: b, "": "outer" + a
        }, function (c, d) {
            n.fn[d] = function (d, e) {
                var f = arguments.length && (c || "boolean" != typeof d),
                    g = c || (d === !0 || e === !0 ? "margin" : "border");
                return Y(this, function (b, c, d) {
                    var e;
                    return n.isWindow(b) ? b.document.documentElement["client" + a] : 9 === b.nodeType ? (e = b.documentElement, Math.max(b.body["scroll" + a], e["scroll" + a], b.body["offset" + a], e["offset" + a], e["client" + a])) : void 0 === d ? n.css(b, c, g) : n.style(b, c, d, g)
                }, b, f ? d : void 0, f, null)
            }
        })
    }), n.fn.extend({
        bind: function (a, b, c) {
            return this.on(a, null, b, c)
        }, unbind: function (a, b) {
            return this.off(a, null, b)
        }, delegate: function (a, b, c, d) {
            return this.on(b, a, c, d)
        }, undelegate: function (a, b, c) {
            return 1 === arguments.length ? this.off(a, "**") : this.off(b, a || "**", c)
        }
    }), n.fn.size = function () {
        return this.length
    }, n.fn.andSelf = n.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function () {
        return n
    });
    var nc = a.jQuery, oc = a.$;
    return n.noConflict = function (b) {
        return a.$ === n && (a.$ = oc), b && a.jQuery === n && (a.jQuery = nc), n
    }, b || (a.jQuery = a.$ = n), n
});
/*! jQuery UI - v1.12.1 - 2019-06-02
    * http://jqueryui.com
    * Includes: widget.js, position.js, data.js, disable-selection.js, focusable.js, form-reset-mixin.js, jquery-1-7.js, keycode.js, labels.js, scroll-parent.js, tabbable.js, unique-id.js, widgets/draggable.js, widgets/droppable.js, widgets/resizable.js, widgets/selectable.js, widgets/sortable.js, widgets/accordion.js, widgets/autocomplete.js, widgets/button.js, widgets/checkboxradio.js, widgets/controlgroup.js, widgets/datepicker.js, widgets/dialog.js, widgets/menu.js, widgets/mouse.js, widgets/progressbar.js, widgets/selectmenu.js, widgets/slider.js, widgets/spinner.js, widgets/tabs.js, widgets/tooltip.js, effect.js, effects/effect-blind.js, effects/effect-bounce.js, effects/effect-clip.js, effects/effect-drop.js, effects/effect-explode.js, effects/effect-fade.js, effects/effect-fold.js, effects/effect-highlight.js, effects/effect-puff.js, effects/effect-pulsate.js, effects/effect-scale.js, effects/effect-shake.js, effects/effect-size.js, effects/effect-slide.js, effects/effect-transfer.js
    * Copyright jQuery Foundation and other contributors; Licensed MIT */

(function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
})(function (t) {
    function e(t) {
        for (var e = t.css("visibility"); "inherit" === e;) t = t.parent(), e = t.css("visibility");
        return "hidden" !== e
    }

    function i(t) {
        for (var e, i; t.length && t[0] !== document;) {
            if (e = t.css("position"), ("absolute" === e || "relative" === e || "fixed" === e) && (i = parseInt(t.css("zIndex"), 10), !isNaN(i) && 0 !== i)) return i;
            t = t.parent()
        }
        return 0
    }

    function s() {
        this._curInst = null, this._keyEvent = !1, this._disabledInputs = [], this._datepickerShowing = !1, this._inDialog = !1, this._mainDivId = "ui-datepicker-div", this._inlineClass = "ui-datepicker-inline", this._appendClass = "ui-datepicker-append", this._triggerClass = "ui-datepicker-trigger", this._dialogClass = "ui-datepicker-dialog", this._disableClass = "ui-datepicker-disabled", this._unselectableClass = "ui-datepicker-unselectable", this._currentClass = "ui-datepicker-current-day", this._dayOverClass = "ui-datepicker-days-cell-over", this.regional = [], this.regional[""] = {
            closeText: "Done",
            prevText: "Prev",
            nextText: "Next",
            currentText: "Today",
            monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            dayNames: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            dayNamesShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            dayNamesMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            weekHeader: "Wk",
            dateFormat: "mm/dd/yy",
            firstDay: 0,
            isRTL: !1,
            showMonthAfterYear: !1,
            yearSuffix: ""
        }, this._defaults = {
            showOn: "focus",
            showAnim: "fadeIn",
            showOptions: {},
            defaultDate: null,
            appendText: "",
            buttonText: "...",
            buttonImage: "",
            buttonImageOnly: !1,
            hideIfNoPrevNext: !1,
            navigationAsDateFormat: !1,
            gotoCurrent: !1,
            changeMonth: !1,
            changeYear: !1,
            yearRange: "c-10:c+10",
            showOtherMonths: !1,
            selectOtherMonths: !1,
            showWeek: !1,
            calculateWeek: this.iso8601Week,
            shortYearCutoff: "+10",
            minDate: null,
            maxDate: null,
            duration: "fast",
            beforeShowDay: null,
            beforeShow: null,
            onSelect: null,
            onChangeMonthYear: null,
            onClose: null,
            numberOfMonths: 1,
            showCurrentAtPos: 0,
            stepMonths: 1,
            stepBigMonths: 12,
            altField: "",
            altFormat: "",
            constrainInput: !0,
            showButtonPanel: !1,
            autoSize: !1,
            disabled: !1
        }, t.extend(this._defaults, this.regional[""]), this.regional.en = t.extend(!0, {}, this.regional[""]), this.regional["en-US"] = t.extend(!0, {}, this.regional.en), this.dpDiv = n(t("<div id='" + this._mainDivId + "' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))
    }

    function n(e) {
        var i = "button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
        return e.on("mouseout", i, function () {
            t(this).removeClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && t(this).removeClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && t(this).removeClass("ui-datepicker-next-hover")
        }).on("mouseover", i, o)
    }

    function o() {
        t.datepicker._isDisabledDatepicker(p.inline ? p.dpDiv.parent()[0] : p.input[0]) || (t(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"), t(this).addClass("ui-state-hover"), -1 !== this.className.indexOf("ui-datepicker-prev") && t(this).addClass("ui-datepicker-prev-hover"), -1 !== this.className.indexOf("ui-datepicker-next") && t(this).addClass("ui-datepicker-next-hover"))
    }

    function a(e, i) {
        t.extend(e, i);
        for (var s in i) null == i[s] && (e[s] = i[s]);
        return e
    }

    function r(t) {
        return function () {
            var e = this.element.val();
            t.apply(this, arguments), this._refresh(), e !== this.element.val() && this._trigger("change")
        }
    }

    t.ui = t.ui || {}, t.ui.version = "1.12.1";
    var l = 0, h = Array.prototype.slice;
    t.cleanData = function (e) {
        return function (i) {
            var s, n, o;
            for (o = 0; null != (n = i[o]); o++) try {
                s = t._data(n, "events"), s && s.remove && t(n).triggerHandler("remove")
            } catch (a) {
            }
            e(i)
        }
    }(t.cleanData), t.widget = function (e, i, s) {
        var n, o, a, r = {}, l = e.split(".")[0];
        e = e.split(".")[1];
        var h = l + "-" + e;
        return s || (s = i, i = t.Widget), t.isArray(s) && (s = t.extend.apply(null, [{}].concat(s))), t.expr[":"][h.toLowerCase()] = function (e) {
            return !!t.data(e, h)
        }, t[l] = t[l] || {}, n = t[l][e], o = t[l][e] = function (t, e) {
            return this._createWidget ? (arguments.length && this._createWidget(t, e), void 0) : new o(t, e)
        }, t.extend(o, n, {
            version: s.version,
            _proto: t.extend({}, s),
            _childConstructors: []
        }), a = new i, a.options = t.widget.extend({}, a.options), t.each(s, function (e, s) {
            return t.isFunction(s) ? (r[e] = function () {
                function t() {
                    return i.prototype[e].apply(this, arguments)
                }

                function n(t) {
                    return i.prototype[e].apply(this, t)
                }

                return function () {
                    var e, i = this._super, o = this._superApply;
                    return this._super = t, this._superApply = n, e = s.apply(this, arguments), this._super = i, this._superApply = o, e
                }
            }(), void 0) : (r[e] = s, void 0)
        }), o.prototype = t.widget.extend(a, {widgetEventPrefix: n ? a.widgetEventPrefix || e : e}, r, {
            constructor: o,
            namespace: l,
            widgetName: e,
            widgetFullName: h
        }), n ? (t.each(n._childConstructors, function (e, i) {
            var s = i.prototype;
            t.widget(s.namespace + "." + s.widgetName, o, i._proto)
        }), delete n._childConstructors) : i._childConstructors.push(o), t.widget.bridge(e, o), o
    }, t.widget.extend = function (e) {
        for (var i, s, n = h.call(arguments, 1), o = 0, a = n.length; a > o; o++) for (i in n[o]) s = n[o][i], n[o].hasOwnProperty(i) && void 0 !== s && (e[i] = t.isPlainObject(s) ? t.isPlainObject(e[i]) ? t.widget.extend({}, e[i], s) : t.widget.extend({}, s) : s);
        return e
    }, t.widget.bridge = function (e, i) {
        var s = i.prototype.widgetFullName || e;
        t.fn[e] = function (n) {
            var o = "string" == typeof n, a = h.call(arguments, 1), r = this;
            return o ? this.length || "instance" !== n ? this.each(function () {
                var i, o = t.data(this, s);
                return "instance" === n ? (r = o, !1) : o ? t.isFunction(o[n]) && "_" !== n.charAt(0) ? (i = o[n].apply(o, a), i !== o && void 0 !== i ? (r = i && i.jquery ? r.pushStack(i.get()) : i, !1) : void 0) : t.error("no such method '" + n + "' for " + e + " widget instance") : t.error("cannot call methods on " + e + " prior to initialization; " + "attempted to call method '" + n + "'")
            }) : r = void 0 : (a.length && (n = t.widget.extend.apply(null, [n].concat(a))), this.each(function () {
                var e = t.data(this, s);
                e ? (e.option(n || {}), e._init && e._init()) : t.data(this, s, new i(n, this))
            })), r
        }
    }, t.Widget = function () {
    }, t.Widget._childConstructors = [], t.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: {classes: {}, disabled: !1, create: null},
        _createWidget: function (e, i) {
            i = t(i || this.defaultElement || this)[0], this.element = t(i), this.uuid = l++, this.eventNamespace = "." + this.widgetName + this.uuid, this.bindings = t(), this.hoverable = t(), this.focusable = t(), this.classesElementLookup = {}, i !== this && (t.data(i, this.widgetFullName, this), this._on(!0, this.element, {
                remove: function (t) {
                    t.target === i && this.destroy()
                }
            }), this.document = t(i.style ? i.ownerDocument : i.document || i), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)), this.options = t.widget.extend({}, this.options, this._getCreateOptions(), e), this._create(), this.options.disabled && this._setOptionDisabled(this.options.disabled), this._trigger("create", null, this._getCreateEventData()), this._init()
        },
        _getCreateOptions: function () {
            return {}
        },
        _getCreateEventData: t.noop,
        _create: t.noop,
        _init: t.noop,
        destroy: function () {
            var e = this;
            this._destroy(), t.each(this.classesElementLookup, function (t, i) {
                e._removeClass(i, t)
            }), this.element.off(this.eventNamespace).removeData(this.widgetFullName), this.widget().off(this.eventNamespace).removeAttr("aria-disabled"), this.bindings.off(this.eventNamespace)
        },
        _destroy: t.noop,
        widget: function () {
            return this.element
        },
        option: function (e, i) {
            var s, n, o, a = e;
            if (0 === arguments.length) return t.widget.extend({}, this.options);
            if ("string" == typeof e) if (a = {}, s = e.split("."), e = s.shift(), s.length) {
                for (n = a[e] = t.widget.extend({}, this.options[e]), o = 0; s.length - 1 > o; o++) n[s[o]] = n[s[o]] || {}, n = n[s[o]];
                if (e = s.pop(), 1 === arguments.length) return void 0 === n[e] ? null : n[e];
                n[e] = i
            } else {
                if (1 === arguments.length) return void 0 === this.options[e] ? null : this.options[e];
                a[e] = i
            }
            return this._setOptions(a), this
        },
        _setOptions: function (t) {
            var e;
            for (e in t) this._setOption(e, t[e]);
            return this
        },
        _setOption: function (t, e) {
            return "classes" === t && this._setOptionClasses(e), this.options[t] = e, "disabled" === t && this._setOptionDisabled(e), this
        },
        _setOptionClasses: function (e) {
            var i, s, n;
            for (i in e) n = this.classesElementLookup[i], e[i] !== this.options.classes[i] && n && n.length && (s = t(n.get()), this._removeClass(n, i), s.addClass(this._classes({
                element: s,
                keys: i,
                classes: e,
                add: !0
            })))
        },
        _setOptionDisabled: function (t) {
            this._toggleClass(this.widget(), this.widgetFullName + "-disabled", null, !!t), t && (this._removeClass(this.hoverable, null, "ui-state-hover"), this._removeClass(this.focusable, null, "ui-state-focus"))
        },
        enable: function () {
            return this._setOptions({disabled: !1})
        },
        disable: function () {
            return this._setOptions({disabled: !0})
        },
        _classes: function (e) {
            function i(i, o) {
                var a, r;
                for (r = 0; i.length > r; r++) a = n.classesElementLookup[i[r]] || t(), a = e.add ? t(t.unique(a.get().concat(e.element.get()))) : t(a.not(e.element).get()), n.classesElementLookup[i[r]] = a, s.push(i[r]), o && e.classes[i[r]] && s.push(e.classes[i[r]])
            }

            var s = [], n = this;
            return e = t.extend({
                element: this.element,
                classes: this.options.classes || {}
            }, e), this._on(e.element, {remove: "_untrackClassesElement"}), e.keys && i(e.keys.match(/\S+/g) || [], !0), e.extra && i(e.extra.match(/\S+/g) || []), s.join(" ")
        },
        _untrackClassesElement: function (e) {
            var i = this;
            t.each(i.classesElementLookup, function (s, n) {
                -1 !== t.inArray(e.target, n) && (i.classesElementLookup[s] = t(n.not(e.target).get()))
            })
        },
        _removeClass: function (t, e, i) {
            return this._toggleClass(t, e, i, !1)
        },
        _addClass: function (t, e, i) {
            return this._toggleClass(t, e, i, !0)
        },
        _toggleClass: function (t, e, i, s) {
            s = "boolean" == typeof s ? s : i;
            var n = "string" == typeof t || null === t,
                o = {extra: n ? e : i, keys: n ? t : e, element: n ? this.element : t, add: s};
            return o.element.toggleClass(this._classes(o), s), this
        },
        _on: function (e, i, s) {
            var n, o = this;
            "boolean" != typeof e && (s = i, i = e, e = !1), s ? (i = n = t(i), this.bindings = this.bindings.add(i)) : (s = i, i = this.element, n = this.widget()), t.each(s, function (s, a) {
                function r() {
                    return e || o.options.disabled !== !0 && !t(this).hasClass("ui-state-disabled") ? ("string" == typeof a ? o[a] : a).apply(o, arguments) : void 0
                }

                "string" != typeof a && (r.guid = a.guid = a.guid || r.guid || t.guid++);
                var l = s.match(/^([\w:-]*)\s*(.*)$/), h = l[1] + o.eventNamespace, c = l[2];
                c ? n.on(h, c, r) : i.on(h, r)
            })
        },
        _off: function (e, i) {
            i = (i || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, e.off(i).off(i), this.bindings = t(this.bindings.not(e).get()), this.focusable = t(this.focusable.not(e).get()), this.hoverable = t(this.hoverable.not(e).get())
        },
        _delay: function (t, e) {
            function i() {
                return ("string" == typeof t ? s[t] : t).apply(s, arguments)
            }

            var s = this;
            return setTimeout(i, e || 0)
        },
        _hoverable: function (e) {
            this.hoverable = this.hoverable.add(e), this._on(e, {
                mouseenter: function (e) {
                    this._addClass(t(e.currentTarget), null, "ui-state-hover")
                }, mouseleave: function (e) {
                    this._removeClass(t(e.currentTarget), null, "ui-state-hover")
                }
            })
        },
        _focusable: function (e) {
            this.focusable = this.focusable.add(e), this._on(e, {
                focusin: function (e) {
                    this._addClass(t(e.currentTarget), null, "ui-state-focus")
                }, focusout: function (e) {
                    this._removeClass(t(e.currentTarget), null, "ui-state-focus")
                }
            })
        },
        _trigger: function (e, i, s) {
            var n, o, a = this.options[e];
            if (s = s || {}, i = t.Event(i), i.type = (e === this.widgetEventPrefix ? e : this.widgetEventPrefix + e).toLowerCase(), i.target = this.element[0], o = i.originalEvent) for (n in o) n in i || (i[n] = o[n]);
            return this.element.trigger(i, s), !(t.isFunction(a) && a.apply(this.element[0], [i].concat(s)) === !1 || i.isDefaultPrevented())
        }
    }, t.each({show: "fadeIn", hide: "fadeOut"}, function (e, i) {
        t.Widget.prototype["_" + e] = function (s, n, o) {
            "string" == typeof n && (n = {effect: n});
            var a, r = n ? n === !0 || "number" == typeof n ? i : n.effect || i : e;
            n = n || {}, "number" == typeof n && (n = {duration: n}), a = !t.isEmptyObject(n), n.complete = o, n.delay && s.delay(n.delay), a && t.effects && t.effects.effect[r] ? s[e](n) : r !== e && s[r] ? s[r](n.duration, n.easing, o) : s.queue(function (i) {
                t(this)[e](), o && o.call(s[0]), i()
            })
        }
    }), t.widget, function () {
        function e(t, e, i) {
            return [parseFloat(t[0]) * (u.test(t[0]) ? e / 100 : 1), parseFloat(t[1]) * (u.test(t[1]) ? i / 100 : 1)]
        }

        function i(e, i) {
            return parseInt(t.css(e, i), 10) || 0
        }

        function s(e) {
            var i = e[0];
            return 9 === i.nodeType ? {
                width: e.width(),
                height: e.height(),
                offset: {top: 0, left: 0}
            } : t.isWindow(i) ? {
                width: e.width(),
                height: e.height(),
                offset: {top: e.scrollTop(), left: e.scrollLeft()}
            } : i.preventDefault ? {
                width: 0,
                height: 0,
                offset: {top: i.pageY, left: i.pageX}
            } : {width: e.outerWidth(), height: e.outerHeight(), offset: e.offset()}
        }

        var n, o = Math.max, a = Math.abs, r = /left|center|right/, l = /top|center|bottom/,
            h = /[\+\-]\d+(\.[\d]+)?%?/, c = /^\w+/, u = /%$/, d = t.fn.position;
        t.position = {
            scrollbarWidth: function () {
                if (void 0 !== n) return n;
                var e, i,
                    s = t("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),
                    o = s.children()[0];
                return t("body").append(s), e = o.offsetWidth, s.css("overflow", "scroll"), i = o.offsetWidth, e === i && (i = s[0].clientWidth), s.remove(), n = e - i
            }, getScrollInfo: function (e) {
                var i = e.isWindow || e.isDocument ? "" : e.element.css("overflow-x"),
                    s = e.isWindow || e.isDocument ? "" : e.element.css("overflow-y"),
                    n = "scroll" === i || "auto" === i && e.width < e.element[0].scrollWidth,
                    o = "scroll" === s || "auto" === s && e.height < e.element[0].scrollHeight;
                return {width: o ? t.position.scrollbarWidth() : 0, height: n ? t.position.scrollbarWidth() : 0}
            }, getWithinInfo: function (e) {
                var i = t(e || window), s = t.isWindow(i[0]), n = !!i[0] && 9 === i[0].nodeType, o = !s && !n;
                return {
                    element: i,
                    isWindow: s,
                    isDocument: n,
                    offset: o ? t(e).offset() : {left: 0, top: 0},
                    scrollLeft: i.scrollLeft(),
                    scrollTop: i.scrollTop(),
                    width: i.outerWidth(),
                    height: i.outerHeight()
                }
            }
        }, t.fn.position = function (n) {
            if (!n || !n.of) return d.apply(this, arguments);
            n = t.extend({}, n);
            var u, p, f, g, m, _, v = t(n.of), b = t.position.getWithinInfo(n.within),
                y = t.position.getScrollInfo(b), w = (n.collision || "flip").split(" "), k = {};
            return _ = s(v), v[0].preventDefault && (n.at = "left top"), p = _.width, f = _.height, g = _.offset, m = t.extend({}, g), t.each(["my", "at"], function () {
                var t, e, i = (n[this] || "").split(" ");
                1 === i.length && (i = r.test(i[0]) ? i.concat(["center"]) : l.test(i[0]) ? ["center"].concat(i) : ["center", "center"]), i[0] = r.test(i[0]) ? i[0] : "center", i[1] = l.test(i[1]) ? i[1] : "center", t = h.exec(i[0]), e = h.exec(i[1]), k[this] = [t ? t[0] : 0, e ? e[0] : 0], n[this] = [c.exec(i[0])[0], c.exec(i[1])[0]]
            }), 1 === w.length && (w[1] = w[0]), "right" === n.at[0] ? m.left += p : "center" === n.at[0] && (m.left += p / 2), "bottom" === n.at[1] ? m.top += f : "center" === n.at[1] && (m.top += f / 2), u = e(k.at, p, f), m.left += u[0], m.top += u[1], this.each(function () {
                var s, r, l = t(this), h = l.outerWidth(), c = l.outerHeight(), d = i(this, "marginLeft"),
                    _ = i(this, "marginTop"), x = h + d + i(this, "marginRight") + y.width,
                    C = c + _ + i(this, "marginBottom") + y.height, D = t.extend({}, m),
                    I = e(k.my, l.outerWidth(), l.outerHeight());
                "right" === n.my[0] ? D.left -= h : "center" === n.my[0] && (D.left -= h / 2), "bottom" === n.my[1] ? D.top -= c : "center" === n.my[1] && (D.top -= c / 2), D.left += I[0], D.top += I[1], s = {
                    marginLeft: d,
                    marginTop: _
                }, t.each(["left", "top"], function (e, i) {
                    t.ui.position[w[e]] && t.ui.position[w[e]][i](D, {
                        targetWidth: p,
                        targetHeight: f,
                        elemWidth: h,
                        elemHeight: c,
                        collisionPosition: s,
                        collisionWidth: x,
                        collisionHeight: C,
                        offset: [u[0] + I[0], u[1] + I[1]],
                        my: n.my,
                        at: n.at,
                        within: b,
                        elem: l
                    })
                }), n.using && (r = function (t) {
                    var e = g.left - D.left, i = e + p - h, s = g.top - D.top, r = s + f - c, u = {
                        target: {element: v, left: g.left, top: g.top, width: p, height: f},
                        element: {element: l, left: D.left, top: D.top, width: h, height: c},
                        horizontal: 0 > i ? "left" : e > 0 ? "right" : "center",
                        vertical: 0 > r ? "top" : s > 0 ? "bottom" : "middle"
                    };
                    h > p && p > a(e + i) && (u.horizontal = "center"), c > f && f > a(s + r) && (u.vertical = "middle"), u.important = o(a(e), a(i)) > o(a(s), a(r)) ? "horizontal" : "vertical", n.using.call(this, t, u)
                }), l.offset(t.extend(D, {using: r}))
            })
        }, t.ui.position = {
            fit: {
                left: function (t, e) {
                    var i, s = e.within, n = s.isWindow ? s.scrollLeft : s.offset.left, a = s.width,
                        r = t.left - e.collisionPosition.marginLeft, l = n - r,
                        h = r + e.collisionWidth - a - n;
                    e.collisionWidth > a ? l > 0 && 0 >= h ? (i = t.left + l + e.collisionWidth - a - n, t.left += l - i) : t.left = h > 0 && 0 >= l ? n : l > h ? n + a - e.collisionWidth : n : l > 0 ? t.left += l : h > 0 ? t.left -= h : t.left = o(t.left - r, t.left)
                }, top: function (t, e) {
                    var i, s = e.within, n = s.isWindow ? s.scrollTop : s.offset.top, a = e.within.height,
                        r = t.top - e.collisionPosition.marginTop, l = n - r, h = r + e.collisionHeight - a - n;
                    e.collisionHeight > a ? l > 0 && 0 >= h ? (i = t.top + l + e.collisionHeight - a - n, t.top += l - i) : t.top = h > 0 && 0 >= l ? n : l > h ? n + a - e.collisionHeight : n : l > 0 ? t.top += l : h > 0 ? t.top -= h : t.top = o(t.top - r, t.top)
                }
            }, flip: {
                left: function (t, e) {
                    var i, s, n = e.within, o = n.offset.left + n.scrollLeft, r = n.width,
                        l = n.isWindow ? n.scrollLeft : n.offset.left,
                        h = t.left - e.collisionPosition.marginLeft, c = h - l,
                        u = h + e.collisionWidth - r - l,
                        d = "left" === e.my[0] ? -e.elemWidth : "right" === e.my[0] ? e.elemWidth : 0,
                        p = "left" === e.at[0] ? e.targetWidth : "right" === e.at[0] ? -e.targetWidth : 0,
                        f = -2 * e.offset[0];
                    0 > c ? (i = t.left + d + p + f + e.collisionWidth - r - o, (0 > i || a(c) > i) && (t.left += d + p + f)) : u > 0 && (s = t.left - e.collisionPosition.marginLeft + d + p + f - l, (s > 0 || u > a(s)) && (t.left += d + p + f))
                }, top: function (t, e) {
                    var i, s, n = e.within, o = n.offset.top + n.scrollTop, r = n.height,
                        l = n.isWindow ? n.scrollTop : n.offset.top, h = t.top - e.collisionPosition.marginTop,
                        c = h - l, u = h + e.collisionHeight - r - l, d = "top" === e.my[1],
                        p = d ? -e.elemHeight : "bottom" === e.my[1] ? e.elemHeight : 0,
                        f = "top" === e.at[1] ? e.targetHeight : "bottom" === e.at[1] ? -e.targetHeight : 0,
                        g = -2 * e.offset[1];
                    0 > c ? (s = t.top + p + f + g + e.collisionHeight - r - o, (0 > s || a(c) > s) && (t.top += p + f + g)) : u > 0 && (i = t.top - e.collisionPosition.marginTop + p + f + g - l, (i > 0 || u > a(i)) && (t.top += p + f + g))
                }
            }, flipfit: {
                left: function () {
                    t.ui.position.flip.left.apply(this, arguments), t.ui.position.fit.left.apply(this, arguments)
                }, top: function () {
                    t.ui.position.flip.top.apply(this, arguments), t.ui.position.fit.top.apply(this, arguments)
                }
            }
        }
    }(), t.ui.position, t.extend(t.expr[":"], {
        data: t.expr.createPseudo ? t.expr.createPseudo(function (e) {
            return function (i) {
                return !!t.data(i, e)
            }
        }) : function (e, i, s) {
            return !!t.data(e, s[3])
        }
    }), t.fn.extend({
        disableSelection: function () {
            var t = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
            return function () {
                return this.on(t + ".ui-disableSelection", function (t) {
                    t.preventDefault()
                })
            }
        }(), enableSelection: function () {
            return this.off(".ui-disableSelection")
        }
    }), t.ui.focusable = function (i, s) {
        var n, o, a, r, l, h = i.nodeName.toLowerCase();
        return "area" === h ? (n = i.parentNode, o = n.name, i.href && o && "map" === n.nodeName.toLowerCase() ? (a = t("img[usemap='#" + o + "']"), a.length > 0 && a.is(":visible")) : !1) : (/^(input|select|textarea|button|object)$/.test(h) ? (r = !i.disabled, r && (l = t(i).closest("fieldset")[0], l && (r = !l.disabled))) : r = "a" === h ? i.href || s : s, r && t(i).is(":visible") && e(t(i)))
    }, t.extend(t.expr[":"], {
        focusable: function (e) {
            return t.ui.focusable(e, null != t.attr(e, "tabindex"))
        }
    }), t.ui.focusable, t.fn.form = function () {
        return "string" == typeof this[0].form ? this.closest("form") : t(this[0].form)
    }, t.ui.formResetMixin = {
        _formResetHandler: function () {
            var e = t(this);
            setTimeout(function () {
                var i = e.data("ui-form-reset-instances");
                t.each(i, function () {
                    this.refresh()
                })
            })
        }, _bindFormResetHandler: function () {
            if (this.form = this.element.form(), this.form.length) {
                var t = this.form.data("ui-form-reset-instances") || [];
                t.length || this.form.on("reset.ui-form-reset", this._formResetHandler), t.push(this), this.form.data("ui-form-reset-instances", t)
            }
        }, _unbindFormResetHandler: function () {
            if (this.form.length) {
                var e = this.form.data("ui-form-reset-instances");
                e.splice(t.inArray(this, e), 1), e.length ? this.form.data("ui-form-reset-instances", e) : this.form.removeData("ui-form-reset-instances").off("reset.ui-form-reset")
            }
        }
    }, "1.7" === t.fn.jquery.substring(0, 3) && (t.each(["Width", "Height"], function (e, i) {
        function s(e, i, s, o) {
            return t.each(n, function () {
                i -= parseFloat(t.css(e, "padding" + this)) || 0, s && (i -= parseFloat(t.css(e, "border" + this + "Width")) || 0), o && (i -= parseFloat(t.css(e, "margin" + this)) || 0)
            }), i
        }

        var n = "Width" === i ? ["Left", "Right"] : ["Top", "Bottom"], o = i.toLowerCase(), a = {
            innerWidth: t.fn.innerWidth,
            innerHeight: t.fn.innerHeight,
            outerWidth: t.fn.outerWidth,
            outerHeight: t.fn.outerHeight
        };
        t.fn["inner" + i] = function (e) {
            return void 0 === e ? a["inner" + i].call(this) : this.each(function () {
                t(this).css(o, s(this, e) + "px")
            })
        }, t.fn["outer" + i] = function (e, n) {
            return "number" != typeof e ? a["outer" + i].call(this, e) : this.each(function () {
                t(this).css(o, s(this, e, !0, n) + "px")
            })
        }
    }), t.fn.addBack = function (t) {
        return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
    }), t.ui.keyCode = {
        BACKSPACE: 8,
        COMMA: 188,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        LEFT: 37,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SPACE: 32,
        TAB: 9,
        UP: 38
    }, t.ui.escapeSelector = function () {
        var t = /([!"#$%&'()*+,./:;<=>?@[\]^`{|}~])/g;
        return function (e) {
            return e.replace(t, "\\$1")
        }
    }(), t.fn.labels = function () {
        var e, i, s, n, o;
        return this[0].labels && this[0].labels.length ? this.pushStack(this[0].labels) : (n = this.eq(0).parents("label"), s = this.attr("id"), s && (e = this.eq(0).parents().last(), o = e.add(e.length ? e.siblings() : this.siblings()), i = "label[for='" + t.ui.escapeSelector(s) + "']", n = n.add(o.find(i).addBack(i))), this.pushStack(n))
    }, t.fn.scrollParent = function (e) {
        var i = this.css("position"), s = "absolute" === i, n = e ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
            o = this.parents().filter(function () {
                var e = t(this);
                return s && "static" === e.css("position") ? !1 : n.test(e.css("overflow") + e.css("overflow-y") + e.css("overflow-x"))
            }).eq(0);
        return "fixed" !== i && o.length ? o : t(this[0].ownerDocument || document)
    }, t.extend(t.expr[":"], {
        tabbable: function (e) {
            var i = t.attr(e, "tabindex"), s = null != i;
            return (!s || i >= 0) && t.ui.focusable(e, s)
        }
    }), t.fn.extend({
        uniqueId: function () {
            var t = 0;
            return function () {
                return this.each(function () {
                    this.id || (this.id = "ui-id-" + ++t)
                })
            }
        }(), removeUniqueId: function () {
            return this.each(function () {
                /^ui-id-\d+$/.test(this.id) && t(this).removeAttr("id")
            })
        }
    }), t.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase());
    var c = !1;
    t(document).on("mouseup", function () {
        c = !1
    }), t.widget("ui.mouse", {
        version: "1.12.1",
        options: {cancel: "input, textarea, button, select, option", distance: 1, delay: 0},
        _mouseInit: function () {
            var e = this;
            this.element.on("mousedown." + this.widgetName, function (t) {
                return e._mouseDown(t)
            }).on("click." + this.widgetName, function (i) {
                return !0 === t.data(i.target, e.widgetName + ".preventClickEvent") ? (t.removeData(i.target, e.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
            }), this.started = !1
        },
        _mouseDestroy: function () {
            this.element.off("." + this.widgetName), this._mouseMoveDelegate && this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate)
        },
        _mouseDown: function (e) {
            if (!c) {
                this._mouseMoved = !1, this._mouseStarted && this._mouseUp(e), this._mouseDownEvent = e;
                var i = this, s = 1 === e.which,
                    n = "string" == typeof this.options.cancel && e.target.nodeName ? t(e.target).closest(this.options.cancel).length : !1;
                return s && !n && this._mouseCapture(e) ? (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function () {
                    i.mouseDelayMet = !0
                }, this.options.delay)), this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(e) !== !1, !this._mouseStarted) ? (e.preventDefault(), !0) : (!0 === t.data(e.target, this.widgetName + ".preventClickEvent") && t.removeData(e.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function (t) {
                    return i._mouseMove(t)
                }, this._mouseUpDelegate = function (t) {
                    return i._mouseUp(t)
                }, this.document.on("mousemove." + this.widgetName, this._mouseMoveDelegate).on("mouseup." + this.widgetName, this._mouseUpDelegate), e.preventDefault(), c = !0, !0)) : !0
            }
        },
        _mouseMove: function (e) {
            if (this._mouseMoved) {
                if (t.ui.ie && (!document.documentMode || 9 > document.documentMode) && !e.button) return this._mouseUp(e);
                if (!e.which) if (e.originalEvent.altKey || e.originalEvent.ctrlKey || e.originalEvent.metaKey || e.originalEvent.shiftKey) this.ignoreMissingWhich = !0; else if (!this.ignoreMissingWhich) return this._mouseUp(e)
            }
            return (e.which || e.button) && (this._mouseMoved = !0), this._mouseStarted ? (this._mouseDrag(e), e.preventDefault()) : (this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, e) !== !1, this._mouseStarted ? this._mouseDrag(e) : this._mouseUp(e)), !this._mouseStarted)
        },
        _mouseUp: function (e) {
            this.document.off("mousemove." + this.widgetName, this._mouseMoveDelegate).off("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, e.target === this._mouseDownEvent.target && t.data(e.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(e)), this._mouseDelayTimer && (clearTimeout(this._mouseDelayTimer), delete this._mouseDelayTimer), this.ignoreMissingWhich = !1, c = !1, e.preventDefault()
        },
        _mouseDistanceMet: function (t) {
            return Math.max(Math.abs(this._mouseDownEvent.pageX - t.pageX), Math.abs(this._mouseDownEvent.pageY - t.pageY)) >= this.options.distance
        },
        _mouseDelayMet: function () {
            return this.mouseDelayMet
        },
        _mouseStart: function () {
        },
        _mouseDrag: function () {
        },
        _mouseStop: function () {
        },
        _mouseCapture: function () {
            return !0
        }
    }), t.ui.plugin = {
        add: function (e, i, s) {
            var n, o = t.ui[e].prototype;
            for (n in s) o.plugins[n] = o.plugins[n] || [], o.plugins[n].push([i, s[n]])
        }, call: function (t, e, i, s) {
            var n, o = t.plugins[e];
            if (o && (s || t.element[0].parentNode && 11 !== t.element[0].parentNode.nodeType)) for (n = 0; o.length > n; n++) t.options[o[n][0]] && o[n][1].apply(t.element, i)
        }
    }, t.ui.safeActiveElement = function (t) {
        var e;
        try {
            e = t.activeElement
        } catch (i) {
            e = t.body
        }
        return e || (e = t.body), e.nodeName || (e = t.body), e
    }, t.ui.safeBlur = function (e) {
        e && "body" !== e.nodeName.toLowerCase() && t(e).trigger("blur")
    }, t.widget("ui.draggable", t.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "drag",
        options: {
            addClasses: !0,
            appendTo: "parent",
            axis: !1,
            connectToSortable: !1,
            containment: !1,
            cursor: "auto",
            cursorAt: !1,
            grid: !1,
            handle: !1,
            helper: "original",
            iframeFix: !1,
            opacity: !1,
            refreshPositions: !1,
            revert: !1,
            revertDuration: 500,
            scope: "default",
            scroll: !0,
            scrollSensitivity: 20,
            scrollSpeed: 20,
            snap: !1,
            snapMode: "both",
            snapTolerance: 20,
            stack: !1,
            zIndex: !1,
            drag: null,
            start: null,
            stop: null
        },
        _create: function () {
            "original" === this.options.helper && this._setPositionRelative(), this.options.addClasses && this._addClass("ui-draggable"), this._setHandleClassName(), this._mouseInit()
        },
        _setOption: function (t, e) {
            this._super(t, e), "handle" === t && (this._removeHandleClassName(), this._setHandleClassName())
        },
        _destroy: function () {
            return (this.helper || this.element).is(".ui-draggable-dragging") ? (this.destroyOnClear = !0, void 0) : (this._removeHandleClassName(), this._mouseDestroy(), void 0)
        },
        _mouseCapture: function (e) {
            var i = this.options;
            return this.helper || i.disabled || t(e.target).closest(".ui-resizable-handle").length > 0 ? !1 : (this.handle = this._getHandle(e), this.handle ? (this._blurActiveElement(e), this._blockFrames(i.iframeFix === !0 ? "iframe" : i.iframeFix), !0) : !1)
        },
        _blockFrames: function (e) {
            this.iframeBlocks = this.document.find(e).map(function () {
                var e = t(this);
                return t("<div>").css("position", "absolute").appendTo(e.parent()).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()).offset(e.offset())[0]
            })
        },
        _unblockFrames: function () {
            this.iframeBlocks && (this.iframeBlocks.remove(), delete this.iframeBlocks)
        },
        _blurActiveElement: function (e) {
            var i = t.ui.safeActiveElement(this.document[0]), s = t(e.target);
            s.closest(i).length || t.ui.safeBlur(i)
        },
        _mouseStart: function (e) {
            var i = this.options;
            return this.helper = this._createHelper(e), this._addClass(this.helper, "ui-draggable-dragging"), this._cacheHelperProportions(), t.ui.ddmanager && (t.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(!0), this.offsetParent = this.helper.offsetParent(), this.hasFixedAncestor = this.helper.parents().filter(function () {
                return "fixed" === t(this).css("position")
            }).length > 0, this.positionAbs = this.element.offset(), this._refreshOffsets(e), this.originalPosition = this.position = this._generatePosition(e, !1), this.originalPageX = e.pageX, this.originalPageY = e.pageY, i.cursorAt && this._adjustOffsetFromHelper(i.cursorAt), this._setContainment(), this._trigger("start", e) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), t.ui.ddmanager && !i.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e), this._mouseDrag(e, !0), t.ui.ddmanager && t.ui.ddmanager.dragStart(this, e), !0)
        },
        _refreshOffsets: function (t) {
            this.offset = {
                top: this.positionAbs.top - this.margins.top,
                left: this.positionAbs.left - this.margins.left,
                scroll: !1,
                parent: this._getParentOffset(),
                relative: this._getRelativeOffset()
            }, this.offset.click = {left: t.pageX - this.offset.left, top: t.pageY - this.offset.top}
        },
        _mouseDrag: function (e, i) {
            if (this.hasFixedAncestor && (this.offset.parent = this._getParentOffset()), this.position = this._generatePosition(e, !0), this.positionAbs = this._convertPositionTo("absolute"), !i) {
                var s = this._uiHash();
                if (this._trigger("drag", e, s) === !1) return this._mouseUp(new t.Event("mouseup", e)), !1;
                this.position = s.position
            }
            return this.helper[0].style.left = this.position.left + "px", this.helper[0].style.top = this.position.top + "px", t.ui.ddmanager && t.ui.ddmanager.drag(this, e), !1
        },
        _mouseStop: function (e) {
            var i = this, s = !1;
            return t.ui.ddmanager && !this.options.dropBehaviour && (s = t.ui.ddmanager.drop(this, e)), this.dropped && (s = this.dropped, this.dropped = !1), "invalid" === this.options.revert && !s || "valid" === this.options.revert && s || this.options.revert === !0 || t.isFunction(this.options.revert) && this.options.revert.call(this.element, s) ? t(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function () {
                i._trigger("stop", e) !== !1 && i._clear()
            }) : this._trigger("stop", e) !== !1 && this._clear(), !1
        },
        _mouseUp: function (e) {
            return this._unblockFrames(), t.ui.ddmanager && t.ui.ddmanager.dragStop(this, e), this.handleElement.is(e.target) && this.element.trigger("focus"), t.ui.mouse.prototype._mouseUp.call(this, e)
        },
        cancel: function () {
            return this.helper.is(".ui-draggable-dragging") ? this._mouseUp(new t.Event("mouseup", {target: this.element[0]})) : this._clear(), this
        },
        _getHandle: function (e) {
            return this.options.handle ? !!t(e.target).closest(this.element.find(this.options.handle)).length : !0
        },
        _setHandleClassName: function () {
            this.handleElement = this.options.handle ? this.element.find(this.options.handle) : this.element, this._addClass(this.handleElement, "ui-draggable-handle")
        },
        _removeHandleClassName: function () {
            this._removeClass(this.handleElement, "ui-draggable-handle")
        },
        _createHelper: function (e) {
            var i = this.options, s = t.isFunction(i.helper),
                n = s ? t(i.helper.apply(this.element[0], [e])) : "clone" === i.helper ? this.element.clone().removeAttr("id") : this.element;
            return n.parents("body").length || n.appendTo("parent" === i.appendTo ? this.element[0].parentNode : i.appendTo), s && n[0] === this.element[0] && this._setPositionRelative(), n[0] === this.element[0] || /(fixed|absolute)/.test(n.css("position")) || n.css("position", "absolute"), n
        },
        _setPositionRelative: function () {
            /^(?:r|a|f)/.test(this.element.css("position")) || (this.element[0].style.position = "relative")
        },
        _adjustOffsetFromHelper: function (e) {
            "string" == typeof e && (e = e.split(" ")), t.isArray(e) && (e = {
                left: +e[0],
                top: +e[1] || 0
            }), "left" in e && (this.offset.click.left = e.left + this.margins.left), "right" in e && (this.offset.click.left = this.helperProportions.width - e.right + this.margins.left), "top" in e && (this.offset.click.top = e.top + this.margins.top), "bottom" in e && (this.offset.click.top = this.helperProportions.height - e.bottom + this.margins.top)
        },
        _isRootNode: function (t) {
            return /(html|body)/i.test(t.tagName) || t === this.document[0]
        },
        _getParentOffset: function () {
            var e = this.offsetParent.offset(), i = this.document[0];
            return "absolute" === this.cssPosition && this.scrollParent[0] !== i && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e.left += this.scrollParent.scrollLeft(), e.top += this.scrollParent.scrollTop()), this._isRootNode(this.offsetParent[0]) && (e = {
                top: 0,
                left: 0
            }), {
                top: e.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                left: e.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
            }
        },
        _getRelativeOffset: function () {
            if ("relative" !== this.cssPosition) return {top: 0, left: 0};
            var t = this.element.position(), e = this._isRootNode(this.scrollParent[0]);
            return {
                top: t.top - (parseInt(this.helper.css("top"), 10) || 0) + (e ? 0 : this.scrollParent.scrollTop()),
                left: t.left - (parseInt(this.helper.css("left"), 10) || 0) + (e ? 0 : this.scrollParent.scrollLeft())
            }
        },
        _cacheMargins: function () {
            this.margins = {
                left: parseInt(this.element.css("marginLeft"), 10) || 0,
                top: parseInt(this.element.css("marginTop"), 10) || 0,
                right: parseInt(this.element.css("marginRight"), 10) || 0,
                bottom: parseInt(this.element.css("marginBottom"), 10) || 0
            }
        },
        _cacheHelperProportions: function () {
            this.helperProportions = {width: this.helper.outerWidth(), height: this.helper.outerHeight()}
        },
        _setContainment: function () {
            var e, i, s, n = this.options, o = this.document[0];
            return this.relativeContainer = null, n.containment ? "window" === n.containment ? (this.containment = [t(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, t(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, t(window).scrollLeft() + t(window).width() - this.helperProportions.width - this.margins.left, t(window).scrollTop() + (t(window).height() || o.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top], void 0) : "document" === n.containment ? (this.containment = [0, 0, t(o).width() - this.helperProportions.width - this.margins.left, (t(o).height() || o.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top], void 0) : n.containment.constructor === Array ? (this.containment = n.containment, void 0) : ("parent" === n.containment && (n.containment = this.helper[0].parentNode), i = t(n.containment), s = i[0], s && (e = /(scroll|auto)/.test(i.css("overflow")), this.containment = [(parseInt(i.css("borderLeftWidth"), 10) || 0) + (parseInt(i.css("paddingLeft"), 10) || 0), (parseInt(i.css("borderTopWidth"), 10) || 0) + (parseInt(i.css("paddingTop"), 10) || 0), (e ? Math.max(s.scrollWidth, s.offsetWidth) : s.offsetWidth) - (parseInt(i.css("borderRightWidth"), 10) || 0) - (parseInt(i.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (e ? Math.max(s.scrollHeight, s.offsetHeight) : s.offsetHeight) - (parseInt(i.css("borderBottomWidth"), 10) || 0) - (parseInt(i.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relativeContainer = i), void 0) : (this.containment = null, void 0)
        },
        _convertPositionTo: function (t, e) {
            e || (e = this.position);
            var i = "absolute" === t ? 1 : -1, s = this._isRootNode(this.scrollParent[0]);
            return {
                top: e.top + this.offset.relative.top * i + this.offset.parent.top * i - ("fixed" === this.cssPosition ? -this.offset.scroll.top : s ? 0 : this.offset.scroll.top) * i,
                left: e.left + this.offset.relative.left * i + this.offset.parent.left * i - ("fixed" === this.cssPosition ? -this.offset.scroll.left : s ? 0 : this.offset.scroll.left) * i
            }
        },
        _generatePosition: function (t, e) {
            var i, s, n, o, a = this.options, r = this._isRootNode(this.scrollParent[0]), l = t.pageX,
                h = t.pageY;
            return r && this.offset.scroll || (this.offset.scroll = {
                top: this.scrollParent.scrollTop(),
                left: this.scrollParent.scrollLeft()
            }), e && (this.containment && (this.relativeContainer ? (s = this.relativeContainer.offset(), i = [this.containment[0] + s.left, this.containment[1] + s.top, this.containment[2] + s.left, this.containment[3] + s.top]) : i = this.containment, t.pageX - this.offset.click.left < i[0] && (l = i[0] + this.offset.click.left), t.pageY - this.offset.click.top < i[1] && (h = i[1] + this.offset.click.top), t.pageX - this.offset.click.left > i[2] && (l = i[2] + this.offset.click.left), t.pageY - this.offset.click.top > i[3] && (h = i[3] + this.offset.click.top)), a.grid && (n = a.grid[1] ? this.originalPageY + Math.round((h - this.originalPageY) / a.grid[1]) * a.grid[1] : this.originalPageY, h = i ? n - this.offset.click.top >= i[1] || n - this.offset.click.top > i[3] ? n : n - this.offset.click.top >= i[1] ? n - a.grid[1] : n + a.grid[1] : n, o = a.grid[0] ? this.originalPageX + Math.round((l - this.originalPageX) / a.grid[0]) * a.grid[0] : this.originalPageX, l = i ? o - this.offset.click.left >= i[0] || o - this.offset.click.left > i[2] ? o : o - this.offset.click.left >= i[0] ? o - a.grid[0] : o + a.grid[0] : o), "y" === a.axis && (l = this.originalPageX), "x" === a.axis && (h = this.originalPageY)), {
                top: h - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.offset.scroll.top : r ? 0 : this.offset.scroll.top),
                left: l - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.offset.scroll.left : r ? 0 : this.offset.scroll.left)
            }
        },
        _clear: function () {
            this._removeClass(this.helper, "ui-draggable-dragging"), this.helper[0] === this.element[0] || this.cancelHelperRemoval || this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1, this.destroyOnClear && this.destroy()
        },
        _trigger: function (e, i, s) {
            return s = s || this._uiHash(), t.ui.plugin.call(this, e, [i, s, this], !0), /^(drag|start|stop)/.test(e) && (this.positionAbs = this._convertPositionTo("absolute"), s.offset = this.positionAbs), t.Widget.prototype._trigger.call(this, e, i, s)
        },
        plugins: {},
        _uiHash: function () {
            return {
                helper: this.helper,
                position: this.position,
                originalPosition: this.originalPosition,
                offset: this.positionAbs
            }
        }
    }), t.ui.plugin.add("draggable", "connectToSortable", {
        start: function (e, i, s) {
            var n = t.extend({}, i, {item: s.element});
            s.sortables = [], t(s.options.connectToSortable).each(function () {
                var i = t(this).sortable("instance");
                i && !i.options.disabled && (s.sortables.push(i), i.refreshPositions(), i._trigger("activate", e, n))
            })
        }, stop: function (e, i, s) {
            var n = t.extend({}, i, {item: s.element});
            s.cancelHelperRemoval = !1, t.each(s.sortables, function () {
                var t = this;
                t.isOver ? (t.isOver = 0, s.cancelHelperRemoval = !0, t.cancelHelperRemoval = !1, t._storedCSS = {
                    position: t.placeholder.css("position"),
                    top: t.placeholder.css("top"),
                    left: t.placeholder.css("left")
                }, t._mouseStop(e), t.options.helper = t.options._helper) : (t.cancelHelperRemoval = !0, t._trigger("deactivate", e, n))
            })
        }, drag: function (e, i, s) {
            t.each(s.sortables, function () {
                var n = !1, o = this;
                o.positionAbs = s.positionAbs, o.helperProportions = s.helperProportions, o.offset.click = s.offset.click, o._intersectsWith(o.containerCache) && (n = !0, t.each(s.sortables, function () {
                    return this.positionAbs = s.positionAbs, this.helperProportions = s.helperProportions, this.offset.click = s.offset.click, this !== o && this._intersectsWith(this.containerCache) && t.contains(o.element[0], this.element[0]) && (n = !1), n
                })), n ? (o.isOver || (o.isOver = 1, s._parent = i.helper.parent(), o.currentItem = i.helper.appendTo(o.element).data("ui-sortable-item", !0), o.options._helper = o.options.helper, o.options.helper = function () {
                    return i.helper[0]
                }, e.target = o.currentItem[0], o._mouseCapture(e, !0), o._mouseStart(e, !0, !0), o.offset.click.top = s.offset.click.top, o.offset.click.left = s.offset.click.left, o.offset.parent.left -= s.offset.parent.left - o.offset.parent.left, o.offset.parent.top -= s.offset.parent.top - o.offset.parent.top, s._trigger("toSortable", e), s.dropped = o.element, t.each(s.sortables, function () {
                    this.refreshPositions()
                }), s.currentItem = s.element, o.fromOutside = s), o.currentItem && (o._mouseDrag(e), i.position = o.position)) : o.isOver && (o.isOver = 0, o.cancelHelperRemoval = !0, o.options._revert = o.options.revert, o.options.revert = !1, o._trigger("out", e, o._uiHash(o)), o._mouseStop(e, !0), o.options.revert = o.options._revert, o.options.helper = o.options._helper, o.placeholder && o.placeholder.remove(), i.helper.appendTo(s._parent), s._refreshOffsets(e), i.position = s._generatePosition(e, !0), s._trigger("fromSortable", e), s.dropped = !1, t.each(s.sortables, function () {
                    this.refreshPositions()
                }))
            })
        }
    }), t.ui.plugin.add("draggable", "cursor", {
        start: function (e, i, s) {
            var n = t("body"), o = s.options;
            n.css("cursor") && (o._cursor = n.css("cursor")), n.css("cursor", o.cursor)
        }, stop: function (e, i, s) {
            var n = s.options;
            n._cursor && t("body").css("cursor", n._cursor)
        }
    }), t.ui.plugin.add("draggable", "opacity", {
        start: function (e, i, s) {
            var n = t(i.helper), o = s.options;
            n.css("opacity") && (o._opacity = n.css("opacity")), n.css("opacity", o.opacity)
        }, stop: function (e, i, s) {
            var n = s.options;
            n._opacity && t(i.helper).css("opacity", n._opacity)
        }
    }), t.ui.plugin.add("draggable", "scroll", {
        start: function (t, e, i) {
            i.scrollParentNotHidden || (i.scrollParentNotHidden = i.helper.scrollParent(!1)), i.scrollParentNotHidden[0] !== i.document[0] && "HTML" !== i.scrollParentNotHidden[0].tagName && (i.overflowOffset = i.scrollParentNotHidden.offset())
        }, drag: function (e, i, s) {
            var n = s.options, o = !1, a = s.scrollParentNotHidden[0], r = s.document[0];
            a !== r && "HTML" !== a.tagName ? (n.axis && "x" === n.axis || (s.overflowOffset.top + a.offsetHeight - e.pageY < n.scrollSensitivity ? a.scrollTop = o = a.scrollTop + n.scrollSpeed : e.pageY - s.overflowOffset.top < n.scrollSensitivity && (a.scrollTop = o = a.scrollTop - n.scrollSpeed)), n.axis && "y" === n.axis || (s.overflowOffset.left + a.offsetWidth - e.pageX < n.scrollSensitivity ? a.scrollLeft = o = a.scrollLeft + n.scrollSpeed : e.pageX - s.overflowOffset.left < n.scrollSensitivity && (a.scrollLeft = o = a.scrollLeft - n.scrollSpeed))) : (n.axis && "x" === n.axis || (e.pageY - t(r).scrollTop() < n.scrollSensitivity ? o = t(r).scrollTop(t(r).scrollTop() - n.scrollSpeed) : t(window).height() - (e.pageY - t(r).scrollTop()) < n.scrollSensitivity && (o = t(r).scrollTop(t(r).scrollTop() + n.scrollSpeed))), n.axis && "y" === n.axis || (e.pageX - t(r).scrollLeft() < n.scrollSensitivity ? o = t(r).scrollLeft(t(r).scrollLeft() - n.scrollSpeed) : t(window).width() - (e.pageX - t(r).scrollLeft()) < n.scrollSensitivity && (o = t(r).scrollLeft(t(r).scrollLeft() + n.scrollSpeed)))), o !== !1 && t.ui.ddmanager && !n.dropBehaviour && t.ui.ddmanager.prepareOffsets(s, e)
        }
    }), t.ui.plugin.add("draggable", "snap", {
        start: function (e, i, s) {
            var n = s.options;
            s.snapElements = [], t(n.snap.constructor !== String ? n.snap.items || ":data(ui-draggable)" : n.snap).each(function () {
                var e = t(this), i = e.offset();
                this !== s.element[0] && s.snapElements.push({
                    item: this,
                    width: e.outerWidth(),
                    height: e.outerHeight(),
                    top: i.top,
                    left: i.left
                })
            })
        }, drag: function (e, i, s) {
            var n, o, a, r, l, h, c, u, d, p, f = s.options, g = f.snapTolerance, m = i.offset.left,
                _ = m + s.helperProportions.width, v = i.offset.top, b = v + s.helperProportions.height;
            for (d = s.snapElements.length - 1; d >= 0; d--) l = s.snapElements[d].left - s.margins.left, h = l + s.snapElements[d].width, c = s.snapElements[d].top - s.margins.top, u = c + s.snapElements[d].height, l - g > _ || m > h + g || c - g > b || v > u + g || !t.contains(s.snapElements[d].item.ownerDocument, s.snapElements[d].item) ? (s.snapElements[d].snapping && s.options.snap.release && s.options.snap.release.call(s.element, e, t.extend(s._uiHash(), {snapItem: s.snapElements[d].item})), s.snapElements[d].snapping = !1) : ("inner" !== f.snapMode && (n = g >= Math.abs(c - b), o = g >= Math.abs(u - v), a = g >= Math.abs(l - _), r = g >= Math.abs(h - m), n && (i.position.top = s._convertPositionTo("relative", {
                top: c - s.helperProportions.height,
                left: 0
            }).top), o && (i.position.top = s._convertPositionTo("relative", {
                top: u,
                left: 0
            }).top), a && (i.position.left = s._convertPositionTo("relative", {
                top: 0,
                left: l - s.helperProportions.width
            }).left), r && (i.position.left = s._convertPositionTo("relative", {
                top: 0,
                left: h
            }).left)), p = n || o || a || r, "outer" !== f.snapMode && (n = g >= Math.abs(c - v), o = g >= Math.abs(u - b), a = g >= Math.abs(l - m), r = g >= Math.abs(h - _), n && (i.position.top = s._convertPositionTo("relative", {
                top: c,
                left: 0
            }).top), o && (i.position.top = s._convertPositionTo("relative", {
                top: u - s.helperProportions.height,
                left: 0
            }).top), a && (i.position.left = s._convertPositionTo("relative", {
                top: 0,
                left: l
            }).left), r && (i.position.left = s._convertPositionTo("relative", {
                top: 0,
                left: h - s.helperProportions.width
            }).left)), !s.snapElements[d].snapping && (n || o || a || r || p) && s.options.snap.snap && s.options.snap.snap.call(s.element, e, t.extend(s._uiHash(), {snapItem: s.snapElements[d].item})), s.snapElements[d].snapping = n || o || a || r || p)
        }
    }), t.ui.plugin.add("draggable", "stack", {
        start: function (e, i, s) {
            var n, o = s.options, a = t.makeArray(t(o.stack)).sort(function (e, i) {
                return (parseInt(t(e).css("zIndex"), 10) || 0) - (parseInt(t(i).css("zIndex"), 10) || 0)
            });
            a.length && (n = parseInt(t(a[0]).css("zIndex"), 10) || 0, t(a).each(function (e) {
                t(this).css("zIndex", n + e)
            }), this.css("zIndex", n + a.length))
        }
    }), t.ui.plugin.add("draggable", "zIndex", {
        start: function (e, i, s) {
            var n = t(i.helper), o = s.options;
            n.css("zIndex") && (o._zIndex = n.css("zIndex")), n.css("zIndex", o.zIndex)
        }, stop: function (e, i, s) {
            var n = s.options;
            n._zIndex && t(i.helper).css("zIndex", n._zIndex)
        }
    }), t.ui.draggable, t.widget("ui.droppable", {
        version: "1.12.1",
        widgetEventPrefix: "drop",
        options: {
            accept: "*",
            addClasses: !0,
            greedy: !1,
            scope: "default",
            tolerance: "intersect",
            activate: null,
            deactivate: null,
            drop: null,
            out: null,
            over: null
        },
        _create: function () {
            var e, i = this.options, s = i.accept;
            this.isover = !1, this.isout = !0, this.accept = t.isFunction(s) ? s : function (t) {
                return t.is(s)
            }, this.proportions = function () {
                return arguments.length ? (e = arguments[0], void 0) : e ? e : e = {
                    width: this.element[0].offsetWidth,
                    height: this.element[0].offsetHeight
                }
            }, this._addToManager(i.scope), i.addClasses && this._addClass("ui-droppable")
        },
        _addToManager: function (e) {
            t.ui.ddmanager.droppables[e] = t.ui.ddmanager.droppables[e] || [], t.ui.ddmanager.droppables[e].push(this)
        },
        _splice: function (t) {
            for (var e = 0; t.length > e; e++) t[e] === this && t.splice(e, 1)
        },
        _destroy: function () {
            var e = t.ui.ddmanager.droppables[this.options.scope];
            this._splice(e)
        },
        _setOption: function (e, i) {
            if ("accept" === e) this.accept = t.isFunction(i) ? i : function (t) {
                return t.is(i)
            }; else if ("scope" === e) {
                var s = t.ui.ddmanager.droppables[this.options.scope];
                this._splice(s), this._addToManager(i)
            }
            this._super(e, i)
        },
        _activate: function (e) {
            var i = t.ui.ddmanager.current;
            this._addActiveClass(), i && this._trigger("activate", e, this.ui(i))
        },
        _deactivate: function (e) {
            var i = t.ui.ddmanager.current;
            this._removeActiveClass(), i && this._trigger("deactivate", e, this.ui(i))
        },
        _over: function (e) {
            var i = t.ui.ddmanager.current;
            i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this._addHoverClass(), this._trigger("over", e, this.ui(i)))
        },
        _out: function (e) {
            var i = t.ui.ddmanager.current;
            i && (i.currentItem || i.element)[0] !== this.element[0] && this.accept.call(this.element[0], i.currentItem || i.element) && (this._removeHoverClass(), this._trigger("out", e, this.ui(i)))
        },
        _drop: function (e, i) {
            var s = i || t.ui.ddmanager.current, n = !1;
            return s && (s.currentItem || s.element)[0] !== this.element[0] ? (this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function () {
                var i = t(this).droppable("instance");
                return i.options.greedy && !i.options.disabled && i.options.scope === s.options.scope && i.accept.call(i.element[0], s.currentItem || s.element) && u(s, t.extend(i, {offset: i.element.offset()}), i.options.tolerance, e) ? (n = !0, !1) : void 0
            }), n ? !1 : this.accept.call(this.element[0], s.currentItem || s.element) ? (this._removeActiveClass(), this._removeHoverClass(), this._trigger("drop", e, this.ui(s)), this.element) : !1) : !1
        },
        ui: function (t) {
            return {
                draggable: t.currentItem || t.element,
                helper: t.helper,
                position: t.position,
                offset: t.positionAbs
            }
        },
        _addHoverClass: function () {
            this._addClass("ui-droppable-hover")
        },
        _removeHoverClass: function () {
            this._removeClass("ui-droppable-hover")
        },
        _addActiveClass: function () {
            this._addClass("ui-droppable-active")
        },
        _removeActiveClass: function () {
            this._removeClass("ui-droppable-active")
        }
    });
    var u = t.ui.intersect = function () {
        function t(t, e, i) {
            return t >= e && e + i > t
        }

        return function (e, i, s, n) {
            if (!i.offset) return !1;
            var o = (e.positionAbs || e.position.absolute).left + e.margins.left,
                a = (e.positionAbs || e.position.absolute).top + e.margins.top,
                r = o + e.helperProportions.width, l = a + e.helperProportions.height, h = i.offset.left,
                c = i.offset.top, u = h + i.proportions().width, d = c + i.proportions().height;
            switch (s) {
                case"fit":
                    return o >= h && u >= r && a >= c && d >= l;
                case"intersect":
                    return o + e.helperProportions.width / 2 > h && u > r - e.helperProportions.width / 2 && a + e.helperProportions.height / 2 > c && d > l - e.helperProportions.height / 2;
                case"pointer":
                    return t(n.pageY, c, i.proportions().height) && t(n.pageX, h, i.proportions().width);
                case"touch":
                    return (a >= c && d >= a || l >= c && d >= l || c > a && l > d) && (o >= h && u >= o || r >= h && u >= r || h > o && r > u);
                default:
                    return !1
            }
        }
    }();
    t.ui.ddmanager = {
        current: null, droppables: {"default": []}, prepareOffsets: function (e, i) {
            var s, n, o = t.ui.ddmanager.droppables[e.options.scope] || [], a = i ? i.type : null,
                r = (e.currentItem || e.element).find(":data(ui-droppable)").addBack();
            t:for (s = 0; o.length > s; s++) if (!(o[s].options.disabled || e && !o[s].accept.call(o[s].element[0], e.currentItem || e.element))) {
                for (n = 0; r.length > n; n++) if (r[n] === o[s].element[0]) {
                    o[s].proportions().height = 0;
                    continue t
                }
                o[s].visible = "none" !== o[s].element.css("display"), o[s].visible && ("mousedown" === a && o[s]._activate.call(o[s], i), o[s].offset = o[s].element.offset(), o[s].proportions({
                    width: o[s].element[0].offsetWidth,
                    height: o[s].element[0].offsetHeight
                }))
            }
        }, drop: function (e, i) {
            var s = !1;
            return t.each((t.ui.ddmanager.droppables[e.options.scope] || []).slice(), function () {
                this.options && (!this.options.disabled && this.visible && u(e, this, this.options.tolerance, i) && (s = this._drop.call(this, i) || s), !this.options.disabled && this.visible && this.accept.call(this.element[0], e.currentItem || e.element) && (this.isout = !0, this.isover = !1, this._deactivate.call(this, i)))
            }), s
        }, dragStart: function (e, i) {
            e.element.parentsUntil("body").on("scroll.droppable", function () {
                e.options.refreshPositions || t.ui.ddmanager.prepareOffsets(e, i)
            })
        }, drag: function (e, i) {
            e.options.refreshPositions && t.ui.ddmanager.prepareOffsets(e, i), t.each(t.ui.ddmanager.droppables[e.options.scope] || [], function () {
                if (!this.options.disabled && !this.greedyChild && this.visible) {
                    var s, n, o, a = u(e, this, this.options.tolerance, i),
                        r = !a && this.isover ? "isout" : a && !this.isover ? "isover" : null;
                    r && (this.options.greedy && (n = this.options.scope, o = this.element.parents(":data(ui-droppable)").filter(function () {
                        return t(this).droppable("instance").options.scope === n
                    }), o.length && (s = t(o[0]).droppable("instance"), s.greedyChild = "isover" === r)), s && "isover" === r && (s.isover = !1, s.isout = !0, s._out.call(s, i)), this[r] = !0, this["isout" === r ? "isover" : "isout"] = !1, this["isover" === r ? "_over" : "_out"].call(this, i), s && "isout" === r && (s.isout = !1, s.isover = !0, s._over.call(s, i)))
                }
            })
        }, dragStop: function (e, i) {
            e.element.parentsUntil("body").off("scroll.droppable"), e.options.refreshPositions || t.ui.ddmanager.prepareOffsets(e, i)
        }
    }, t.uiBackCompat !== !1 && t.widget("ui.droppable", t.ui.droppable, {
        options: {
            hoverClass: !1,
            activeClass: !1
        }, _addActiveClass: function () {
            this._super(), this.options.activeClass && this.element.addClass(this.options.activeClass)
        }, _removeActiveClass: function () {
            this._super(), this.options.activeClass && this.element.removeClass(this.options.activeClass)
        }, _addHoverClass: function () {
            this._super(), this.options.hoverClass && this.element.addClass(this.options.hoverClass)
        }, _removeHoverClass: function () {
            this._super(), this.options.hoverClass && this.element.removeClass(this.options.hoverClass)
        }
    }), t.ui.droppable, t.widget("ui.resizable", t.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "resize",
        options: {
            alsoResize: !1,
            animate: !1,
            animateDuration: "slow",
            animateEasing: "swing",
            aspectRatio: !1,
            autoHide: !1,
            classes: {"ui-resizable-se": "ui-icon ui-icon-gripsmall-diagonal-se"},
            containment: !1,
            ghost: !1,
            grid: !1,
            handles: "e,s,se",
            helper: !1,
            maxHeight: null,
            maxWidth: null,
            minHeight: 10,
            minWidth: 10,
            zIndex: 90,
            resize: null,
            start: null,
            stop: null
        },
        _num: function (t) {
            return parseFloat(t) || 0
        },
        _isNumber: function (t) {
            return !isNaN(parseFloat(t))
        },
        _hasScroll: function (e, i) {
            if ("hidden" === t(e).css("overflow")) return !1;
            var s = i && "left" === i ? "scrollLeft" : "scrollTop", n = !1;
            return e[s] > 0 ? !0 : (e[s] = 1, n = e[s] > 0, e[s] = 0, n)
        },
        _create: function () {
            var e, i = this.options, s = this;
            this._addClass("ui-resizable"), t.extend(this, {
                _aspectRatio: !!i.aspectRatio,
                aspectRatio: i.aspectRatio,
                originalElement: this.element,
                _proportionallyResizeElements: [],
                _helper: i.helper || i.ghost || i.animate ? i.helper || "ui-resizable-helper" : null
            }), this.element[0].nodeName.match(/^(canvas|textarea|input|select|button|img)$/i) && (this.element.wrap(t("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({
                position: this.element.css("position"),
                width: this.element.outerWidth(),
                height: this.element.outerHeight(),
                top: this.element.css("top"),
                left: this.element.css("left")
            })), this.element = this.element.parent().data("ui-resizable", this.element.resizable("instance")), this.elementIsWrapper = !0, e = {
                marginTop: this.originalElement.css("marginTop"),
                marginRight: this.originalElement.css("marginRight"),
                marginBottom: this.originalElement.css("marginBottom"),
                marginLeft: this.originalElement.css("marginLeft")
            }, this.element.css(e), this.originalElement.css("margin", 0), this.originalResizeStyle = this.originalElement.css("resize"), this.originalElement.css("resize", "none"), this._proportionallyResizeElements.push(this.originalElement.css({
                position: "static",
                zoom: 1,
                display: "block"
            })), this.originalElement.css(e), this._proportionallyResize()), this._setupHandles(), i.autoHide && t(this.element).on("mouseenter", function () {
                i.disabled || (s._removeClass("ui-resizable-autohide"), s._handles.show())
            }).on("mouseleave", function () {
                i.disabled || s.resizing || (s._addClass("ui-resizable-autohide"), s._handles.hide())
            }), this._mouseInit()
        },
        _destroy: function () {
            this._mouseDestroy();
            var e, i = function (e) {
                t(e).removeData("resizable").removeData("ui-resizable").off(".resizable").find(".ui-resizable-handle").remove()
            };
            return this.elementIsWrapper && (i(this.element), e = this.element, this.originalElement.css({
                position: e.css("position"),
                width: e.outerWidth(),
                height: e.outerHeight(),
                top: e.css("top"),
                left: e.css("left")
            }).insertAfter(e), e.remove()), this.originalElement.css("resize", this.originalResizeStyle), i(this.originalElement), this
        },
        _setOption: function (t, e) {
            switch (this._super(t, e), t) {
                case"handles":
                    this._removeHandles(), this._setupHandles();
                    break;
                default:
            }
        },
        _setupHandles: function () {
            var e, i, s, n, o, a = this.options, r = this;
            if (this.handles = a.handles || (t(".ui-resizable-handle", this.element).length ? {
                n: ".ui-resizable-n",
                e: ".ui-resizable-e",
                s: ".ui-resizable-s",
                w: ".ui-resizable-w",
                se: ".ui-resizable-se",
                sw: ".ui-resizable-sw",
                ne: ".ui-resizable-ne",
                nw: ".ui-resizable-nw"
            } : "e,s,se"), this._handles = t(), this.handles.constructor === String) for ("all" === this.handles && (this.handles = "n,e,s,w,se,sw,ne,nw"), s = this.handles.split(","), this.handles = {}, i = 0; s.length > i; i++) e = t.trim(s[i]), n = "ui-resizable-" + e, o = t("<div>"), this._addClass(o, "ui-resizable-handle " + n), o.css({zIndex: a.zIndex}), this.handles[e] = ".ui-resizable-" + e, this.element.append(o);
            this._renderAxis = function (e) {
                var i, s, n, o;
                e = e || this.element;
                for (i in this.handles) this.handles[i].constructor === String ? this.handles[i] = this.element.children(this.handles[i]).first().show() : (this.handles[i].jquery || this.handles[i].nodeType) && (this.handles[i] = t(this.handles[i]), this._on(this.handles[i], {mousedown: r._mouseDown})), this.elementIsWrapper && this.originalElement[0].nodeName.match(/^(textarea|input|select|button)$/i) && (s = t(this.handles[i], this.element), o = /sw|ne|nw|se|n|s/.test(i) ? s.outerHeight() : s.outerWidth(), n = ["padding", /ne|nw|n/.test(i) ? "Top" : /se|sw|s/.test(i) ? "Bottom" : /^e$/.test(i) ? "Right" : "Left"].join(""), e.css(n, o), this._proportionallyResize()), this._handles = this._handles.add(this.handles[i])
            }, this._renderAxis(this.element), this._handles = this._handles.add(this.element.find(".ui-resizable-handle")), this._handles.disableSelection(), this._handles.on("mouseover", function () {
                r.resizing || (this.className && (o = this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)), r.axis = o && o[1] ? o[1] : "se")
            }), a.autoHide && (this._handles.hide(), this._addClass("ui-resizable-autohide"))
        },
        _removeHandles: function () {
            this._handles.remove()
        },
        _mouseCapture: function (e) {
            var i, s, n = !1;
            for (i in this.handles) s = t(this.handles[i])[0], (s === e.target || t.contains(s, e.target)) && (n = !0);
            return !this.options.disabled && n
        },
        _mouseStart: function (e) {
            var i, s, n, o = this.options, a = this.element;
            return this.resizing = !0, this._renderProxy(), i = this._num(this.helper.css("left")), s = this._num(this.helper.css("top")), o.containment && (i += t(o.containment).scrollLeft() || 0, s += t(o.containment).scrollTop() || 0), this.offset = this.helper.offset(), this.position = {
                left: i,
                top: s
            }, this.size = this._helper ? {
                width: this.helper.width(),
                height: this.helper.height()
            } : {
                width: a.width(),
                height: a.height()
            }, this.originalSize = this._helper ? {
                width: a.outerWidth(),
                height: a.outerHeight()
            } : {width: a.width(), height: a.height()}, this.sizeDiff = {
                width: a.outerWidth() - a.width(),
                height: a.outerHeight() - a.height()
            }, this.originalPosition = {left: i, top: s}, this.originalMousePosition = {
                left: e.pageX,
                top: e.pageY
            }, this.aspectRatio = "number" == typeof o.aspectRatio ? o.aspectRatio : this.originalSize.width / this.originalSize.height || 1, n = t(".ui-resizable-" + this.axis).css("cursor"), t("body").css("cursor", "auto" === n ? this.axis + "-resize" : n), this._addClass("ui-resizable-resizing"), this._propagate("start", e), !0
        },
        _mouseDrag: function (e) {
            var i, s, n = this.originalMousePosition, o = this.axis, a = e.pageX - n.left || 0,
                r = e.pageY - n.top || 0, l = this._change[o];
            return this._updatePrevProperties(), l ? (i = l.apply(this, [e, a, r]), this._updateVirtualBoundaries(e.shiftKey), (this._aspectRatio || e.shiftKey) && (i = this._updateRatio(i, e)), i = this._respectSize(i, e), this._updateCache(i), this._propagate("resize", e), s = this._applyChanges(), !this._helper && this._proportionallyResizeElements.length && this._proportionallyResize(), t.isEmptyObject(s) || (this._updatePrevProperties(), this._trigger("resize", e, this.ui()), this._applyChanges()), !1) : !1
        },
        _mouseStop: function (e) {
            this.resizing = !1;
            var i, s, n, o, a, r, l, h = this.options, c = this;
            return this._helper && (i = this._proportionallyResizeElements, s = i.length && /textarea/i.test(i[0].nodeName), n = s && this._hasScroll(i[0], "left") ? 0 : c.sizeDiff.height, o = s ? 0 : c.sizeDiff.width, a = {
                width: c.helper.width() - o,
                height: c.helper.height() - n
            }, r = parseFloat(c.element.css("left")) + (c.position.left - c.originalPosition.left) || null, l = parseFloat(c.element.css("top")) + (c.position.top - c.originalPosition.top) || null, h.animate || this.element.css(t.extend(a, {
                top: l,
                left: r
            })), c.helper.height(c.size.height), c.helper.width(c.size.width), this._helper && !h.animate && this._proportionallyResize()), t("body").css("cursor", "auto"), this._removeClass("ui-resizable-resizing"), this._propagate("stop", e), this._helper && this.helper.remove(), !1
        },
        _updatePrevProperties: function () {
            this.prevPosition = {
                top: this.position.top,
                left: this.position.left
            }, this.prevSize = {width: this.size.width, height: this.size.height}
        },
        _applyChanges: function () {
            var t = {};
            return this.position.top !== this.prevPosition.top && (t.top = this.position.top + "px"), this.position.left !== this.prevPosition.left && (t.left = this.position.left + "px"), this.size.width !== this.prevSize.width && (t.width = this.size.width + "px"), this.size.height !== this.prevSize.height && (t.height = this.size.height + "px"), this.helper.css(t), t
        },
        _updateVirtualBoundaries: function (t) {
            var e, i, s, n, o, a = this.options;
            o = {
                minWidth: this._isNumber(a.minWidth) ? a.minWidth : 0,
                maxWidth: this._isNumber(a.maxWidth) ? a.maxWidth : 1 / 0,
                minHeight: this._isNumber(a.minHeight) ? a.minHeight : 0,
                maxHeight: this._isNumber(a.maxHeight) ? a.maxHeight : 1 / 0
            }, (this._aspectRatio || t) && (e = o.minHeight * this.aspectRatio, s = o.minWidth / this.aspectRatio, i = o.maxHeight * this.aspectRatio, n = o.maxWidth / this.aspectRatio, e > o.minWidth && (o.minWidth = e), s > o.minHeight && (o.minHeight = s), o.maxWidth > i && (o.maxWidth = i), o.maxHeight > n && (o.maxHeight = n)), this._vBoundaries = o
        },
        _updateCache: function (t) {
            this.offset = this.helper.offset(), this._isNumber(t.left) && (this.position.left = t.left), this._isNumber(t.top) && (this.position.top = t.top), this._isNumber(t.height) && (this.size.height = t.height), this._isNumber(t.width) && (this.size.width = t.width)
        },
        _updateRatio: function (t) {
            var e = this.position, i = this.size, s = this.axis;
            return this._isNumber(t.height) ? t.width = t.height * this.aspectRatio : this._isNumber(t.width) && (t.height = t.width / this.aspectRatio), "sw" === s && (t.left = e.left + (i.width - t.width), t.top = null), "nw" === s && (t.top = e.top + (i.height - t.height), t.left = e.left + (i.width - t.width)), t
        },
        _respectSize: function (t) {
            var e = this._vBoundaries, i = this.axis,
                s = this._isNumber(t.width) && e.maxWidth && e.maxWidth < t.width,
                n = this._isNumber(t.height) && e.maxHeight && e.maxHeight < t.height,
                o = this._isNumber(t.width) && e.minWidth && e.minWidth > t.width,
                a = this._isNumber(t.height) && e.minHeight && e.minHeight > t.height,
                r = this.originalPosition.left + this.originalSize.width,
                l = this.originalPosition.top + this.originalSize.height, h = /sw|nw|w/.test(i),
                c = /nw|ne|n/.test(i);
            return o && (t.width = e.minWidth), a && (t.height = e.minHeight), s && (t.width = e.maxWidth), n && (t.height = e.maxHeight), o && h && (t.left = r - e.minWidth), s && h && (t.left = r - e.maxWidth), a && c && (t.top = l - e.minHeight), n && c && (t.top = l - e.maxHeight), t.width || t.height || t.left || !t.top ? t.width || t.height || t.top || !t.left || (t.left = null) : t.top = null, t
        },
        _getPaddingPlusBorderDimensions: function (t) {
            for (var e = 0, i = [], s = [t.css("borderTopWidth"), t.css("borderRightWidth"), t.css("borderBottomWidth"), t.css("borderLeftWidth")], n = [t.css("paddingTop"), t.css("paddingRight"), t.css("paddingBottom"), t.css("paddingLeft")]; 4 > e; e++) i[e] = parseFloat(s[e]) || 0, i[e] += parseFloat(n[e]) || 0;
            return {height: i[0] + i[2], width: i[1] + i[3]}
        },
        _proportionallyResize: function () {
            if (this._proportionallyResizeElements.length) for (var t, e = 0, i = this.helper || this.element; this._proportionallyResizeElements.length > e; e++) t = this._proportionallyResizeElements[e], this.outerDimensions || (this.outerDimensions = this._getPaddingPlusBorderDimensions(t)), t.css({
                height: i.height() - this.outerDimensions.height || 0,
                width: i.width() - this.outerDimensions.width || 0
            })
        },
        _renderProxy: function () {
            var e = this.element, i = this.options;
            this.elementOffset = e.offset(), this._helper ? (this.helper = this.helper || t("<div style='overflow:hidden;'></div>"), this._addClass(this.helper, this._helper), this.helper.css({
                width: this.element.outerWidth(),
                height: this.element.outerHeight(),
                position: "absolute",
                left: this.elementOffset.left + "px",
                top: this.elementOffset.top + "px",
                zIndex: ++i.zIndex
            }), this.helper.appendTo("body").disableSelection()) : this.helper = this.element
        },
        _change: {
            e: function (t, e) {
                return {width: this.originalSize.width + e}
            }, w: function (t, e) {
                var i = this.originalSize, s = this.originalPosition;
                return {left: s.left + e, width: i.width - e}
            }, n: function (t, e, i) {
                var s = this.originalSize, n = this.originalPosition;
                return {top: n.top + i, height: s.height - i}
            }, s: function (t, e, i) {
                return {height: this.originalSize.height + i}
            }, se: function (e, i, s) {
                return t.extend(this._change.s.apply(this, arguments), this._change.e.apply(this, [e, i, s]))
            }, sw: function (e, i, s) {
                return t.extend(this._change.s.apply(this, arguments), this._change.w.apply(this, [e, i, s]))
            }, ne: function (e, i, s) {
                return t.extend(this._change.n.apply(this, arguments), this._change.e.apply(this, [e, i, s]))
            }, nw: function (e, i, s) {
                return t.extend(this._change.n.apply(this, arguments), this._change.w.apply(this, [e, i, s]))
            }
        },
        _propagate: function (e, i) {
            t.ui.plugin.call(this, e, [i, this.ui()]), "resize" !== e && this._trigger(e, i, this.ui())
        },
        plugins: {},
        ui: function () {
            return {
                originalElement: this.originalElement,
                element: this.element,
                helper: this.helper,
                position: this.position,
                size: this.size,
                originalSize: this.originalSize,
                originalPosition: this.originalPosition
            }
        }
    }), t.ui.plugin.add("resizable", "animate", {
        stop: function (e) {
            var i = t(this).resizable("instance"), s = i.options, n = i._proportionallyResizeElements,
                o = n.length && /textarea/i.test(n[0].nodeName),
                a = o && i._hasScroll(n[0], "left") ? 0 : i.sizeDiff.height, r = o ? 0 : i.sizeDiff.width,
                l = {width: i.size.width - r, height: i.size.height - a},
                h = parseFloat(i.element.css("left")) + (i.position.left - i.originalPosition.left) || null,
                c = parseFloat(i.element.css("top")) + (i.position.top - i.originalPosition.top) || null;
            i.element.animate(t.extend(l, c && h ? {top: c, left: h} : {}), {
                duration: s.animateDuration,
                easing: s.animateEasing,
                step: function () {
                    var s = {
                        width: parseFloat(i.element.css("width")),
                        height: parseFloat(i.element.css("height")),
                        top: parseFloat(i.element.css("top")),
                        left: parseFloat(i.element.css("left"))
                    };
                    n && n.length && t(n[0]).css({
                        width: s.width,
                        height: s.height
                    }), i._updateCache(s), i._propagate("resize", e)
                }
            })
        }
    }), t.ui.plugin.add("resizable", "containment", {
        start: function () {
            var e, i, s, n, o, a, r, l = t(this).resizable("instance"), h = l.options, c = l.element,
                u = h.containment, d = u instanceof t ? u.get(0) : /parent/.test(u) ? c.parent().get(0) : u;
            d && (l.containerElement = t(d), /document/.test(u) || u === document ? (l.containerOffset = {
                left: 0,
                top: 0
            }, l.containerPosition = {left: 0, top: 0}, l.parentData = {
                element: t(document),
                left: 0,
                top: 0,
                width: t(document).width(),
                height: t(document).height() || document.body.parentNode.scrollHeight
            }) : (e = t(d), i = [], t(["Top", "Right", "Left", "Bottom"]).each(function (t, s) {
                i[t] = l._num(e.css("padding" + s))
            }), l.containerOffset = e.offset(), l.containerPosition = e.position(), l.containerSize = {
                height: e.innerHeight() - i[3],
                width: e.innerWidth() - i[1]
            }, s = l.containerOffset, n = l.containerSize.height, o = l.containerSize.width, a = l._hasScroll(d, "left") ? d.scrollWidth : o, r = l._hasScroll(d) ? d.scrollHeight : n, l.parentData = {
                element: d,
                left: s.left,
                top: s.top,
                width: a,
                height: r
            }))
        }, resize: function (e) {
            var i, s, n, o, a = t(this).resizable("instance"), r = a.options, l = a.containerOffset,
                h = a.position, c = a._aspectRatio || e.shiftKey, u = {top: 0, left: 0}, d = a.containerElement,
                p = !0;
            d[0] !== document && /static/.test(d.css("position")) && (u = l), h.left < (a._helper ? l.left : 0) && (a.size.width = a.size.width + (a._helper ? a.position.left - l.left : a.position.left - u.left), c && (a.size.height = a.size.width / a.aspectRatio, p = !1), a.position.left = r.helper ? l.left : 0), h.top < (a._helper ? l.top : 0) && (a.size.height = a.size.height + (a._helper ? a.position.top - l.top : a.position.top), c && (a.size.width = a.size.height * a.aspectRatio, p = !1), a.position.top = a._helper ? l.top : 0), n = a.containerElement.get(0) === a.element.parent().get(0), o = /relative|absolute/.test(a.containerElement.css("position")), n && o ? (a.offset.left = a.parentData.left + a.position.left, a.offset.top = a.parentData.top + a.position.top) : (a.offset.left = a.element.offset().left, a.offset.top = a.element.offset().top), i = Math.abs(a.sizeDiff.width + (a._helper ? a.offset.left - u.left : a.offset.left - l.left)), s = Math.abs(a.sizeDiff.height + (a._helper ? a.offset.top - u.top : a.offset.top - l.top)), i + a.size.width >= a.parentData.width && (a.size.width = a.parentData.width - i, c && (a.size.height = a.size.width / a.aspectRatio, p = !1)), s + a.size.height >= a.parentData.height && (a.size.height = a.parentData.height - s, c && (a.size.width = a.size.height * a.aspectRatio, p = !1)), p || (a.position.left = a.prevPosition.left, a.position.top = a.prevPosition.top, a.size.width = a.prevSize.width, a.size.height = a.prevSize.height)
        }, stop: function () {
            var e = t(this).resizable("instance"), i = e.options, s = e.containerOffset,
                n = e.containerPosition, o = e.containerElement, a = t(e.helper), r = a.offset(),
                l = a.outerWidth() - e.sizeDiff.width, h = a.outerHeight() - e.sizeDiff.height;
            e._helper && !i.animate && /relative/.test(o.css("position")) && t(this).css({
                left: r.left - n.left - s.left,
                width: l,
                height: h
            }), e._helper && !i.animate && /static/.test(o.css("position")) && t(this).css({
                left: r.left - n.left - s.left,
                width: l,
                height: h
            })
        }
    }), t.ui.plugin.add("resizable", "alsoResize", {
        start: function () {
            var e = t(this).resizable("instance"), i = e.options;
            t(i.alsoResize).each(function () {
                var e = t(this);
                e.data("ui-resizable-alsoresize", {
                    width: parseFloat(e.width()),
                    height: parseFloat(e.height()),
                    left: parseFloat(e.css("left")),
                    top: parseFloat(e.css("top"))
                })
            })
        }, resize: function (e, i) {
            var s = t(this).resizable("instance"), n = s.options, o = s.originalSize, a = s.originalPosition,
                r = {
                    height: s.size.height - o.height || 0,
                    width: s.size.width - o.width || 0,
                    top: s.position.top - a.top || 0,
                    left: s.position.left - a.left || 0
                };
            t(n.alsoResize).each(function () {
                var e = t(this), s = t(this).data("ui-resizable-alsoresize"), n = {},
                    o = e.parents(i.originalElement[0]).length ? ["width", "height"] : ["width", "height", "top", "left"];
                t.each(o, function (t, e) {
                    var i = (s[e] || 0) + (r[e] || 0);
                    i && i >= 0 && (n[e] = i || null)
                }), e.css(n)
            })
        }, stop: function () {
            t(this).removeData("ui-resizable-alsoresize")
        }
    }), t.ui.plugin.add("resizable", "ghost", {
        start: function () {
            var e = t(this).resizable("instance"), i = e.size;
            e.ghost = e.originalElement.clone(), e.ghost.css({
                opacity: .25,
                display: "block",
                position: "relative",
                height: i.height,
                width: i.width,
                margin: 0,
                left: 0,
                top: 0
            }), e._addClass(e.ghost, "ui-resizable-ghost"), t.uiBackCompat !== !1 && "string" == typeof e.options.ghost && e.ghost.addClass(this.options.ghost), e.ghost.appendTo(e.helper)
        }, resize: function () {
            var e = t(this).resizable("instance");
            e.ghost && e.ghost.css({position: "relative", height: e.size.height, width: e.size.width})
        }, stop: function () {
            var e = t(this).resizable("instance");
            e.ghost && e.helper && e.helper.get(0).removeChild(e.ghost.get(0))
        }
    }), t.ui.plugin.add("resizable", "grid", {
        resize: function () {
            var e, i = t(this).resizable("instance"), s = i.options, n = i.size, o = i.originalSize,
                a = i.originalPosition, r = i.axis, l = "number" == typeof s.grid ? [s.grid, s.grid] : s.grid,
                h = l[0] || 1, c = l[1] || 1, u = Math.round((n.width - o.width) / h) * h,
                d = Math.round((n.height - o.height) / c) * c, p = o.width + u, f = o.height + d,
                g = s.maxWidth && p > s.maxWidth, m = s.maxHeight && f > s.maxHeight,
                _ = s.minWidth && s.minWidth > p, v = s.minHeight && s.minHeight > f;
            s.grid = l, _ && (p += h), v && (f += c), g && (p -= h), m && (f -= c), /^(se|s|e)$/.test(r) ? (i.size.width = p, i.size.height = f) : /^(ne)$/.test(r) ? (i.size.width = p, i.size.height = f, i.position.top = a.top - d) : /^(sw)$/.test(r) ? (i.size.width = p, i.size.height = f, i.position.left = a.left - u) : ((0 >= f - c || 0 >= p - h) && (e = i._getPaddingPlusBorderDimensions(this)), f - c > 0 ? (i.size.height = f, i.position.top = a.top - d) : (f = c - e.height, i.size.height = f, i.position.top = a.top + o.height - f), p - h > 0 ? (i.size.width = p, i.position.left = a.left - u) : (p = h - e.width, i.size.width = p, i.position.left = a.left + o.width - p))
        }
    }), t.ui.resizable, t.widget("ui.selectable", t.ui.mouse, {
        version: "1.12.1",
        options: {
            appendTo: "body",
            autoRefresh: !0,
            distance: 0,
            filter: "*",
            tolerance: "touch",
            selected: null,
            selecting: null,
            start: null,
            stop: null,
            unselected: null,
            unselecting: null
        },
        _create: function () {
            var e = this;
            this._addClass("ui-selectable"), this.dragged = !1, this.refresh = function () {
                e.elementPos = t(e.element[0]).offset(), e.selectees = t(e.options.filter, e.element[0]), e._addClass(e.selectees, "ui-selectee"), e.selectees.each(function () {
                    var i = t(this), s = i.offset(),
                        n = {left: s.left - e.elementPos.left, top: s.top - e.elementPos.top};
                    t.data(this, "selectable-item", {
                        element: this,
                        $element: i,
                        left: n.left,
                        top: n.top,
                        right: n.left + i.outerWidth(),
                        bottom: n.top + i.outerHeight(),
                        startselected: !1,
                        selected: i.hasClass("ui-selected"),
                        selecting: i.hasClass("ui-selecting"),
                        unselecting: i.hasClass("ui-unselecting")
                    })
                })
            }, this.refresh(), this._mouseInit(), this.helper = t("<div>"), this._addClass(this.helper, "ui-selectable-helper")
        },
        _destroy: function () {
            this.selectees.removeData("selectable-item"), this._mouseDestroy()
        },
        _mouseStart: function (e) {
            var i = this, s = this.options;
            this.opos = [e.pageX, e.pageY], this.elementPos = t(this.element[0]).offset(), this.options.disabled || (this.selectees = t(s.filter, this.element[0]), this._trigger("start", e), t(s.appendTo).append(this.helper), this.helper.css({
                left: e.pageX,
                top: e.pageY,
                width: 0,
                height: 0
            }), s.autoRefresh && this.refresh(), this.selectees.filter(".ui-selected").each(function () {
                var s = t.data(this, "selectable-item");
                s.startselected = !0, e.metaKey || e.ctrlKey || (i._removeClass(s.$element, "ui-selected"), s.selected = !1, i._addClass(s.$element, "ui-unselecting"), s.unselecting = !0, i._trigger("unselecting", e, {unselecting: s.element}))
            }), t(e.target).parents().addBack().each(function () {
                var s, n = t.data(this, "selectable-item");
                return n ? (s = !e.metaKey && !e.ctrlKey || !n.$element.hasClass("ui-selected"), i._removeClass(n.$element, s ? "ui-unselecting" : "ui-selected")._addClass(n.$element, s ? "ui-selecting" : "ui-unselecting"), n.unselecting = !s, n.selecting = s, n.selected = s, s ? i._trigger("selecting", e, {selecting: n.element}) : i._trigger("unselecting", e, {unselecting: n.element}), !1) : void 0
            }))
        },
        _mouseDrag: function (e) {
            if (this.dragged = !0, !this.options.disabled) {
                var i, s = this, n = this.options, o = this.opos[0], a = this.opos[1], r = e.pageX, l = e.pageY;
                return o > r && (i = r, r = o, o = i), a > l && (i = l, l = a, a = i), this.helper.css({
                    left: o,
                    top: a,
                    width: r - o,
                    height: l - a
                }), this.selectees.each(function () {
                    var i = t.data(this, "selectable-item"), h = !1, c = {};
                    i && i.element !== s.element[0] && (c.left = i.left + s.elementPos.left, c.right = i.right + s.elementPos.left, c.top = i.top + s.elementPos.top, c.bottom = i.bottom + s.elementPos.top, "touch" === n.tolerance ? h = !(c.left > r || o > c.right || c.top > l || a > c.bottom) : "fit" === n.tolerance && (h = c.left > o && r > c.right && c.top > a && l > c.bottom), h ? (i.selected && (s._removeClass(i.$element, "ui-selected"), i.selected = !1), i.unselecting && (s._removeClass(i.$element, "ui-unselecting"), i.unselecting = !1), i.selecting || (s._addClass(i.$element, "ui-selecting"), i.selecting = !0, s._trigger("selecting", e, {selecting: i.element}))) : (i.selecting && ((e.metaKey || e.ctrlKey) && i.startselected ? (s._removeClass(i.$element, "ui-selecting"), i.selecting = !1, s._addClass(i.$element, "ui-selected"), i.selected = !0) : (s._removeClass(i.$element, "ui-selecting"), i.selecting = !1, i.startselected && (s._addClass(i.$element, "ui-unselecting"), i.unselecting = !0), s._trigger("unselecting", e, {unselecting: i.element}))), i.selected && (e.metaKey || e.ctrlKey || i.startselected || (s._removeClass(i.$element, "ui-selected"), i.selected = !1, s._addClass(i.$element, "ui-unselecting"), i.unselecting = !0, s._trigger("unselecting", e, {unselecting: i.element})))))
                }), !1
            }
        },
        _mouseStop: function (e) {
            var i = this;
            return this.dragged = !1, t(".ui-unselecting", this.element[0]).each(function () {
                var s = t.data(this, "selectable-item");
                i._removeClass(s.$element, "ui-unselecting"), s.unselecting = !1, s.startselected = !1, i._trigger("unselected", e, {unselected: s.element})
            }), t(".ui-selecting", this.element[0]).each(function () {
                var s = t.data(this, "selectable-item");
                i._removeClass(s.$element, "ui-selecting")._addClass(s.$element, "ui-selected"), s.selecting = !1, s.selected = !0, s.startselected = !0, i._trigger("selected", e, {selected: s.element})
            }), this._trigger("stop", e), this.helper.remove(), !1
        }
    }), t.widget("ui.sortable", t.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "sort",
        ready: !1,
        options: {
            appendTo: "parent",
            axis: !1,
            connectWith: !1,
            containment: !1,
            cursor: "auto",
            cursorAt: !1,
            dropOnEmpty: !0,
            forcePlaceholderSize: !1,
            forceHelperSize: !1,
            grid: !1,
            handle: !1,
            helper: "original",
            items: "> *",
            opacity: !1,
            placeholder: !1,
            revert: !1,
            scroll: !0,
            scrollSensitivity: 20,
            scrollSpeed: 20,
            scope: "default",
            tolerance: "intersect",
            zIndex: 1e3,
            activate: null,
            beforeStop: null,
            change: null,
            deactivate: null,
            out: null,
            over: null,
            receive: null,
            remove: null,
            sort: null,
            start: null,
            stop: null,
            update: null
        },
        _isOverAxis: function (t, e, i) {
            return t >= e && e + i > t
        },
        _isFloating: function (t) {
            return /left|right/.test(t.css("float")) || /inline|table-cell/.test(t.css("display"))
        },
        _create: function () {
            this.containerCache = {}, this._addClass("ui-sortable"), this.refresh(), this.offset = this.element.offset(), this._mouseInit(), this._setHandleClassName(), this.ready = !0
        },
        _setOption: function (t, e) {
            this._super(t, e), "handle" === t && this._setHandleClassName()
        },
        _setHandleClassName: function () {
            var e = this;
            this._removeClass(this.element.find(".ui-sortable-handle"), "ui-sortable-handle"), t.each(this.items, function () {
                e._addClass(this.instance.options.handle ? this.item.find(this.instance.options.handle) : this.item, "ui-sortable-handle")
            })
        },
        _destroy: function () {
            this._mouseDestroy();
            for (var t = this.items.length - 1; t >= 0; t--) this.items[t].item.removeData(this.widgetName + "-item");
            return this
        },
        _mouseCapture: function (e, i) {
            var s = null, n = !1, o = this;
            return this.reverting ? !1 : this.options.disabled || "static" === this.options.type ? !1 : (this._refreshItems(e), t(e.target).parents().each(function () {
                return t.data(this, o.widgetName + "-item") === o ? (s = t(this), !1) : void 0
            }), t.data(e.target, o.widgetName + "-item") === o && (s = t(e.target)), s ? !this.options.handle || i || (t(this.options.handle, s).find("*").addBack().each(function () {
                this === e.target && (n = !0)
            }), n) ? (this.currentItem = s, this._removeCurrentsFromItems(), !0) : !1 : !1)
        },
        _mouseStart: function (e, i, s) {
            var n, o, a = this.options;
            if (this.currentContainer = this, this.refreshPositions(), this.helper = this._createHelper(e), this._cacheHelperProportions(), this._cacheMargins(), this.scrollParent = this.helper.scrollParent(), this.offset = this.currentItem.offset(), this.offset = {
                top: this.offset.top - this.margins.top,
                left: this.offset.left - this.margins.left
            }, t.extend(this.offset, {
                click: {left: e.pageX - this.offset.left, top: e.pageY - this.offset.top},
                parent: this._getParentOffset(),
                relative: this._getRelativeOffset()
            }), this.helper.css("position", "absolute"), this.cssPosition = this.helper.css("position"), this.originalPosition = this._generatePosition(e), this.originalPageX = e.pageX, this.originalPageY = e.pageY, a.cursorAt && this._adjustOffsetFromHelper(a.cursorAt), this.domPosition = {
                prev: this.currentItem.prev()[0],
                parent: this.currentItem.parent()[0]
            }, this.helper[0] !== this.currentItem[0] && this.currentItem.hide(), this._createPlaceholder(), a.containment && this._setContainment(), a.cursor && "auto" !== a.cursor && (o = this.document.find("body"), this.storedCursor = o.css("cursor"), o.css("cursor", a.cursor), this.storedStylesheet = t("<style>*{ cursor: " + a.cursor + " !important; }</style>").appendTo(o)), a.opacity && (this.helper.css("opacity") && (this._storedOpacity = this.helper.css("opacity")), this.helper.css("opacity", a.opacity)), a.zIndex && (this.helper.css("zIndex") && (this._storedZIndex = this.helper.css("zIndex")), this.helper.css("zIndex", a.zIndex)), this.scrollParent[0] !== this.document[0] && "HTML" !== this.scrollParent[0].tagName && (this.overflowOffset = this.scrollParent.offset()), this._trigger("start", e, this._uiHash()), this._preserveHelperProportions || this._cacheHelperProportions(), !s) for (n = this.containers.length - 1; n >= 0; n--) this.containers[n]._trigger("activate", e, this._uiHash(this));
            return t.ui.ddmanager && (t.ui.ddmanager.current = this), t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e), this.dragging = !0, this._addClass(this.helper, "ui-sortable-helper"), this._mouseDrag(e), !0
        },
        _mouseDrag: function (e) {
            var i, s, n, o, a = this.options, r = !1;
            for (this.position = this._generatePosition(e), this.positionAbs = this._convertPositionTo("absolute"), this.lastPositionAbs || (this.lastPositionAbs = this.positionAbs), this.options.scroll && (this.scrollParent[0] !== this.document[0] && "HTML" !== this.scrollParent[0].tagName ? (this.overflowOffset.top + this.scrollParent[0].offsetHeight - e.pageY < a.scrollSensitivity ? this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop + a.scrollSpeed : e.pageY - this.overflowOffset.top < a.scrollSensitivity && (this.scrollParent[0].scrollTop = r = this.scrollParent[0].scrollTop - a.scrollSpeed), this.overflowOffset.left + this.scrollParent[0].offsetWidth - e.pageX < a.scrollSensitivity ? this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft + a.scrollSpeed : e.pageX - this.overflowOffset.left < a.scrollSensitivity && (this.scrollParent[0].scrollLeft = r = this.scrollParent[0].scrollLeft - a.scrollSpeed)) : (e.pageY - this.document.scrollTop() < a.scrollSensitivity ? r = this.document.scrollTop(this.document.scrollTop() - a.scrollSpeed) : this.window.height() - (e.pageY - this.document.scrollTop()) < a.scrollSensitivity && (r = this.document.scrollTop(this.document.scrollTop() + a.scrollSpeed)), e.pageX - this.document.scrollLeft() < a.scrollSensitivity ? r = this.document.scrollLeft(this.document.scrollLeft() - a.scrollSpeed) : this.window.width() - (e.pageX - this.document.scrollLeft()) < a.scrollSensitivity && (r = this.document.scrollLeft(this.document.scrollLeft() + a.scrollSpeed))), r !== !1 && t.ui.ddmanager && !a.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e)), this.positionAbs = this._convertPositionTo("absolute"), this.options.axis && "y" === this.options.axis || (this.helper[0].style.left = this.position.left + "px"), this.options.axis && "x" === this.options.axis || (this.helper[0].style.top = this.position.top + "px"), i = this.items.length - 1; i >= 0; i--) if (s = this.items[i], n = s.item[0], o = this._intersectsWithPointer(s), o && s.instance === this.currentContainer && n !== this.currentItem[0] && this.placeholder[1 === o ? "next" : "prev"]()[0] !== n && !t.contains(this.placeholder[0], n) && ("semi-dynamic" === this.options.type ? !t.contains(this.element[0], n) : !0)) {
                if (this.direction = 1 === o ? "down" : "up", "pointer" !== this.options.tolerance && !this._intersectsWithSides(s)) break;
                this._rearrange(e, s), this._trigger("change", e, this._uiHash());
                break
            }
            return this._contactContainers(e), t.ui.ddmanager && t.ui.ddmanager.drag(this, e), this._trigger("sort", e, this._uiHash()), this.lastPositionAbs = this.positionAbs, !1
        },
        _mouseStop: function (e, i) {
            if (e) {
                if (t.ui.ddmanager && !this.options.dropBehaviour && t.ui.ddmanager.drop(this, e), this.options.revert) {
                    var s = this, n = this.placeholder.offset(), o = this.options.axis, a = {};
                    o && "x" !== o || (a.left = n.left - this.offset.parent.left - this.margins.left + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollLeft)), o && "y" !== o || (a.top = n.top - this.offset.parent.top - this.margins.top + (this.offsetParent[0] === this.document[0].body ? 0 : this.offsetParent[0].scrollTop)), this.reverting = !0, t(this.helper).animate(a, parseInt(this.options.revert, 10) || 500, function () {
                        s._clear(e)
                    })
                } else this._clear(e, i);
                return !1
            }
        },
        cancel: function () {
            if (this.dragging) {
                this._mouseUp(new t.Event("mouseup", {target: null})), "original" === this.options.helper ? (this.currentItem.css(this._storedCSS), this._removeClass(this.currentItem, "ui-sortable-helper")) : this.currentItem.show();
                for (var e = this.containers.length - 1; e >= 0; e--) this.containers[e]._trigger("deactivate", null, this._uiHash(this)), this.containers[e].containerCache.over && (this.containers[e]._trigger("out", null, this._uiHash(this)), this.containers[e].containerCache.over = 0)
            }
            return this.placeholder && (this.placeholder[0].parentNode && this.placeholder[0].parentNode.removeChild(this.placeholder[0]), "original" !== this.options.helper && this.helper && this.helper[0].parentNode && this.helper.remove(), t.extend(this, {
                helper: null,
                dragging: !1,
                reverting: !1,
                _noFinalSort: null
            }), this.domPosition.prev ? t(this.domPosition.prev).after(this.currentItem) : t(this.domPosition.parent).prepend(this.currentItem)), this
        },
        serialize: function (e) {
            var i = this._getItemsAsjQuery(e && e.connected), s = [];
            return e = e || {}, t(i).each(function () {
                var i = (t(e.item || this).attr(e.attribute || "id") || "").match(e.expression || /(.+)[\-=_](.+)/);
                i && s.push((e.key || i[1] + "[]") + "=" + (e.key && e.expression ? i[1] : i[2]))
            }), !s.length && e.key && s.push(e.key + "="), s.join("&")
        },
        toArray: function (e) {
            var i = this._getItemsAsjQuery(e && e.connected), s = [];
            return e = e || {}, i.each(function () {
                s.push(t(e.item || this).attr(e.attribute || "id") || "")
            }), s
        },
        _intersectsWith: function (t) {
            var e = this.positionAbs.left, i = e + this.helperProportions.width, s = this.positionAbs.top,
                n = s + this.helperProportions.height, o = t.left, a = o + t.width, r = t.top, l = r + t.height,
                h = this.offset.click.top, c = this.offset.click.left,
                u = "x" === this.options.axis || s + h > r && l > s + h,
                d = "y" === this.options.axis || e + c > o && a > e + c, p = u && d;
            return "pointer" === this.options.tolerance || this.options.forcePointerForContainers || "pointer" !== this.options.tolerance && this.helperProportions[this.floating ? "width" : "height"] > t[this.floating ? "width" : "height"] ? p : e + this.helperProportions.width / 2 > o && a > i - this.helperProportions.width / 2 && s + this.helperProportions.height / 2 > r && l > n - this.helperProportions.height / 2
        },
        _intersectsWithPointer: function (t) {
            var e, i,
                s = "x" === this.options.axis || this._isOverAxis(this.positionAbs.top + this.offset.click.top, t.top, t.height),
                n = "y" === this.options.axis || this._isOverAxis(this.positionAbs.left + this.offset.click.left, t.left, t.width),
                o = s && n;
            return o ? (e = this._getDragVerticalDirection(), i = this._getDragHorizontalDirection(), this.floating ? "right" === i || "down" === e ? 2 : 1 : e && ("down" === e ? 2 : 1)) : !1
        },
        _intersectsWithSides: function (t) {
            var e = this._isOverAxis(this.positionAbs.top + this.offset.click.top, t.top + t.height / 2, t.height),
                i = this._isOverAxis(this.positionAbs.left + this.offset.click.left, t.left + t.width / 2, t.width),
                s = this._getDragVerticalDirection(), n = this._getDragHorizontalDirection();
            return this.floating && n ? "right" === n && i || "left" === n && !i : s && ("down" === s && e || "up" === s && !e)
        },
        _getDragVerticalDirection: function () {
            var t = this.positionAbs.top - this.lastPositionAbs.top;
            return 0 !== t && (t > 0 ? "down" : "up")
        },
        _getDragHorizontalDirection: function () {
            var t = this.positionAbs.left - this.lastPositionAbs.left;
            return 0 !== t && (t > 0 ? "right" : "left")
        },
        refresh: function (t) {
            return this._refreshItems(t), this._setHandleClassName(), this.refreshPositions(), this
        },
        _connectWith: function () {
            var t = this.options;
            return t.connectWith.constructor === String ? [t.connectWith] : t.connectWith
        },
        _getItemsAsjQuery: function (e) {
            function i() {
                r.push(this)
            }

            var s, n, o, a, r = [], l = [], h = this._connectWith();
            if (h && e) for (s = h.length - 1; s >= 0; s--) for (o = t(h[s], this.document[0]), n = o.length - 1; n >= 0; n--) a = t.data(o[n], this.widgetFullName), a && a !== this && !a.options.disabled && l.push([t.isFunction(a.options.items) ? a.options.items.call(a.element) : t(a.options.items, a.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), a]);
            for (l.push([t.isFunction(this.options.items) ? this.options.items.call(this.element, null, {
                options: this.options,
                item: this.currentItem
            }) : t(this.options.items, this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"), this]), s = l.length - 1; s >= 0; s--) l[s][0].each(i);
            return t(r)
        },
        _removeCurrentsFromItems: function () {
            var e = this.currentItem.find(":data(" + this.widgetName + "-item)");
            this.items = t.grep(this.items, function (t) {
                for (var i = 0; e.length > i; i++) if (e[i] === t.item[0]) return !1;
                return !0
            })
        },
        _refreshItems: function (e) {
            this.items = [], this.containers = [this];
            var i, s, n, o, a, r, l, h, c = this.items,
                u = [[t.isFunction(this.options.items) ? this.options.items.call(this.element[0], e, {item: this.currentItem}) : t(this.options.items, this.element), this]],
                d = this._connectWith();
            if (d && this.ready) for (i = d.length - 1; i >= 0; i--) for (n = t(d[i], this.document[0]), s = n.length - 1; s >= 0; s--) o = t.data(n[s], this.widgetFullName), o && o !== this && !o.options.disabled && (u.push([t.isFunction(o.options.items) ? o.options.items.call(o.element[0], e, {item: this.currentItem}) : t(o.options.items, o.element), o]), this.containers.push(o));
            for (i = u.length - 1; i >= 0; i--) for (a = u[i][1], r = u[i][0], s = 0, h = r.length; h > s; s++) l = t(r[s]), l.data(this.widgetName + "-item", a), c.push({
                item: l,
                instance: a,
                width: 0,
                height: 0,
                left: 0,
                top: 0
            })
        },
        refreshPositions: function (e) {
            this.floating = this.items.length ? "x" === this.options.axis || this._isFloating(this.items[0].item) : !1, this.offsetParent && this.helper && (this.offset.parent = this._getParentOffset());
            var i, s, n, o;
            for (i = this.items.length - 1; i >= 0; i--) s = this.items[i], s.instance !== this.currentContainer && this.currentContainer && s.item[0] !== this.currentItem[0] || (n = this.options.toleranceElement ? t(this.options.toleranceElement, s.item) : s.item, e || (s.width = n.outerWidth(), s.height = n.outerHeight()), o = n.offset(), s.left = o.left, s.top = o.top);
            if (this.options.custom && this.options.custom.refreshContainers) this.options.custom.refreshContainers.call(this); else for (i = this.containers.length - 1; i >= 0; i--) o = this.containers[i].element.offset(), this.containers[i].containerCache.left = o.left, this.containers[i].containerCache.top = o.top, this.containers[i].containerCache.width = this.containers[i].element.outerWidth(), this.containers[i].containerCache.height = this.containers[i].element.outerHeight();
            return this
        },
        _createPlaceholder: function (e) {
            e = e || this;
            var i, s = e.options;
            s.placeholder && s.placeholder.constructor !== String || (i = s.placeholder, s.placeholder = {
                element: function () {
                    var s = e.currentItem[0].nodeName.toLowerCase(), n = t("<" + s + ">", e.document[0]);
                    return e._addClass(n, "ui-sortable-placeholder", i || e.currentItem[0].className)._removeClass(n, "ui-sortable-helper"), "tbody" === s ? e._createTrPlaceholder(e.currentItem.find("tr").eq(0), t("<tr>", e.document[0]).appendTo(n)) : "tr" === s ? e._createTrPlaceholder(e.currentItem, n) : "img" === s && n.attr("src", e.currentItem.attr("src")), i || n.css("visibility", "hidden"), n
                }, update: function (t, n) {
                    (!i || s.forcePlaceholderSize) && (n.height() || n.height(e.currentItem.innerHeight() - parseInt(e.currentItem.css("paddingTop") || 0, 10) - parseInt(e.currentItem.css("paddingBottom") || 0, 10)), n.width() || n.width(e.currentItem.innerWidth() - parseInt(e.currentItem.css("paddingLeft") || 0, 10) - parseInt(e.currentItem.css("paddingRight") || 0, 10)))
                }
            }), e.placeholder = t(s.placeholder.element.call(e.element, e.currentItem)), e.currentItem.after(e.placeholder), s.placeholder.update(e, e.placeholder)
        },
        _createTrPlaceholder: function (e, i) {
            var s = this;
            e.children().each(function () {
                t("<td>&#160;</td>", s.document[0]).attr("colspan", t(this).attr("colspan") || 1).appendTo(i)
            })
        },
        _contactContainers: function (e) {
            var i, s, n, o, a, r, l, h, c, u, d = null, p = null;
            for (i = this.containers.length - 1; i >= 0; i--) if (!t.contains(this.currentItem[0], this.containers[i].element[0])) if (this._intersectsWith(this.containers[i].containerCache)) {
                if (d && t.contains(this.containers[i].element[0], d.element[0])) continue;
                d = this.containers[i], p = i
            } else this.containers[i].containerCache.over && (this.containers[i]._trigger("out", e, this._uiHash(this)), this.containers[i].containerCache.over = 0);
            if (d) if (1 === this.containers.length) this.containers[p].containerCache.over || (this.containers[p]._trigger("over", e, this._uiHash(this)), this.containers[p].containerCache.over = 1); else {
                for (n = 1e4, o = null, c = d.floating || this._isFloating(this.currentItem), a = c ? "left" : "top", r = c ? "width" : "height", u = c ? "pageX" : "pageY", s = this.items.length - 1; s >= 0; s--) t.contains(this.containers[p].element[0], this.items[s].item[0]) && this.items[s].item[0] !== this.currentItem[0] && (l = this.items[s].item.offset()[a], h = !1, e[u] - l > this.items[s][r] / 2 && (h = !0), n > Math.abs(e[u] - l) && (n = Math.abs(e[u] - l), o = this.items[s], this.direction = h ? "up" : "down"));
                if (!o && !this.options.dropOnEmpty) return;
                if (this.currentContainer === this.containers[p]) return this.currentContainer.containerCache.over || (this.containers[p]._trigger("over", e, this._uiHash()), this.currentContainer.containerCache.over = 1), void 0;
                o ? this._rearrange(e, o, null, !0) : this._rearrange(e, null, this.containers[p].element, !0), this._trigger("change", e, this._uiHash()), this.containers[p]._trigger("change", e, this._uiHash(this)), this.currentContainer = this.containers[p], this.options.placeholder.update(this.currentContainer, this.placeholder), this.containers[p]._trigger("over", e, this._uiHash(this)), this.containers[p].containerCache.over = 1
            }
        },
        _createHelper: function (e) {
            var i = this.options,
                s = t.isFunction(i.helper) ? t(i.helper.apply(this.element[0], [e, this.currentItem])) : "clone" === i.helper ? this.currentItem.clone() : this.currentItem;
            return s.parents("body").length || t("parent" !== i.appendTo ? i.appendTo : this.currentItem[0].parentNode)[0].appendChild(s[0]), s[0] === this.currentItem[0] && (this._storedCSS = {
                width: this.currentItem[0].style.width,
                height: this.currentItem[0].style.height,
                position: this.currentItem.css("position"),
                top: this.currentItem.css("top"),
                left: this.currentItem.css("left")
            }), (!s[0].style.width || i.forceHelperSize) && s.width(this.currentItem.width()), (!s[0].style.height || i.forceHelperSize) && s.height(this.currentItem.height()), s
        },
        _adjustOffsetFromHelper: function (e) {
            "string" == typeof e && (e = e.split(" ")), t.isArray(e) && (e = {
                left: +e[0],
                top: +e[1] || 0
            }), "left" in e && (this.offset.click.left = e.left + this.margins.left), "right" in e && (this.offset.click.left = this.helperProportions.width - e.right + this.margins.left), "top" in e && (this.offset.click.top = e.top + this.margins.top), "bottom" in e && (this.offset.click.top = this.helperProportions.height - e.bottom + this.margins.top)
        },
        _getParentOffset: function () {
            this.offsetParent = this.helper.offsetParent();
            var e = this.offsetParent.offset();
            return "absolute" === this.cssPosition && this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e.left += this.scrollParent.scrollLeft(), e.top += this.scrollParent.scrollTop()), (this.offsetParent[0] === this.document[0].body || this.offsetParent[0].tagName && "html" === this.offsetParent[0].tagName.toLowerCase() && t.ui.ie) && (e = {
                top: 0,
                left: 0
            }), {
                top: e.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
                left: e.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
            }
        },
        _getRelativeOffset: function () {
            if ("relative" === this.cssPosition) {
                var t = this.currentItem.position();
                return {
                    top: t.top - (parseInt(this.helper.css("top"), 10) || 0) + this.scrollParent.scrollTop(),
                    left: t.left - (parseInt(this.helper.css("left"), 10) || 0) + this.scrollParent.scrollLeft()
                }
            }
            return {top: 0, left: 0}
        },
        _cacheMargins: function () {
            this.margins = {
                left: parseInt(this.currentItem.css("marginLeft"), 10) || 0,
                top: parseInt(this.currentItem.css("marginTop"), 10) || 0
            }
        },
        _cacheHelperProportions: function () {
            this.helperProportions = {width: this.helper.outerWidth(), height: this.helper.outerHeight()}
        },
        _setContainment: function () {
            var e, i, s, n = this.options;
            "parent" === n.containment && (n.containment = this.helper[0].parentNode), ("document" === n.containment || "window" === n.containment) && (this.containment = [0 - this.offset.relative.left - this.offset.parent.left, 0 - this.offset.relative.top - this.offset.parent.top, "document" === n.containment ? this.document.width() : this.window.width() - this.helperProportions.width - this.margins.left, ("document" === n.containment ? this.document.height() || document.body.parentNode.scrollHeight : this.window.height() || this.document[0].body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]), /^(document|window|parent)$/.test(n.containment) || (e = t(n.containment)[0], i = t(n.containment).offset(), s = "hidden" !== t(e).css("overflow"), this.containment = [i.left + (parseInt(t(e).css("borderLeftWidth"), 10) || 0) + (parseInt(t(e).css("paddingLeft"), 10) || 0) - this.margins.left, i.top + (parseInt(t(e).css("borderTopWidth"), 10) || 0) + (parseInt(t(e).css("paddingTop"), 10) || 0) - this.margins.top, i.left + (s ? Math.max(e.scrollWidth, e.offsetWidth) : e.offsetWidth) - (parseInt(t(e).css("borderLeftWidth"), 10) || 0) - (parseInt(t(e).css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left, i.top + (s ? Math.max(e.scrollHeight, e.offsetHeight) : e.offsetHeight) - (parseInt(t(e).css("borderTopWidth"), 10) || 0) - (parseInt(t(e).css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top])
        },
        _convertPositionTo: function (e, i) {
            i || (i = this.position);
            var s = "absolute" === e ? 1 : -1,
                n = "absolute" !== this.cssPosition || this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                o = /(html|body)/i.test(n[0].tagName);
            return {
                top: i.top + this.offset.relative.top * s + this.offset.parent.top * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : o ? 0 : n.scrollTop()) * s,
                left: i.left + this.offset.relative.left * s + this.offset.parent.left * s - ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : o ? 0 : n.scrollLeft()) * s
            }
        },
        _generatePosition: function (e) {
            var i, s, n = this.options, o = e.pageX, a = e.pageY,
                r = "absolute" !== this.cssPosition || this.scrollParent[0] !== this.document[0] && t.contains(this.scrollParent[0], this.offsetParent[0]) ? this.scrollParent : this.offsetParent,
                l = /(html|body)/i.test(r[0].tagName);
            return "relative" !== this.cssPosition || this.scrollParent[0] !== this.document[0] && this.scrollParent[0] !== this.offsetParent[0] || (this.offset.relative = this._getRelativeOffset()), this.originalPosition && (this.containment && (e.pageX - this.offset.click.left < this.containment[0] && (o = this.containment[0] + this.offset.click.left), e.pageY - this.offset.click.top < this.containment[1] && (a = this.containment[1] + this.offset.click.top), e.pageX - this.offset.click.left > this.containment[2] && (o = this.containment[2] + this.offset.click.left), e.pageY - this.offset.click.top > this.containment[3] && (a = this.containment[3] + this.offset.click.top)), n.grid && (i = this.originalPageY + Math.round((a - this.originalPageY) / n.grid[1]) * n.grid[1], a = this.containment ? i - this.offset.click.top >= this.containment[1] && i - this.offset.click.top <= this.containment[3] ? i : i - this.offset.click.top >= this.containment[1] ? i - n.grid[1] : i + n.grid[1] : i, s = this.originalPageX + Math.round((o - this.originalPageX) / n.grid[0]) * n.grid[0], o = this.containment ? s - this.offset.click.left >= this.containment[0] && s - this.offset.click.left <= this.containment[2] ? s : s - this.offset.click.left >= this.containment[0] ? s - n.grid[0] : s + n.grid[0] : s)), {
                top: a - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.scrollParent.scrollTop() : l ? 0 : r.scrollTop()),
                left: o - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.scrollParent.scrollLeft() : l ? 0 : r.scrollLeft())
            }
        },
        _rearrange: function (t, e, i, s) {
            i ? i[0].appendChild(this.placeholder[0]) : e.item[0].parentNode.insertBefore(this.placeholder[0], "down" === this.direction ? e.item[0] : e.item[0].nextSibling), this.counter = this.counter ? ++this.counter : 1;
            var n = this.counter;
            this._delay(function () {
                n === this.counter && this.refreshPositions(!s)
            })
        },
        _clear: function (t, e) {
            function i(t, e, i) {
                return function (s) {
                    i._trigger(t, s, e._uiHash(e))
                }
            }

            this.reverting = !1;
            var s, n = [];
            if (!this._noFinalSort && this.currentItem.parent().length && this.placeholder.before(this.currentItem), this._noFinalSort = null, this.helper[0] === this.currentItem[0]) {
                for (s in this._storedCSS) ("auto" === this._storedCSS[s] || "static" === this._storedCSS[s]) && (this._storedCSS[s] = "");
                this.currentItem.css(this._storedCSS), this._removeClass(this.currentItem, "ui-sortable-helper")
            } else this.currentItem.show();
            for (this.fromOutside && !e && n.push(function (t) {
                this._trigger("receive", t, this._uiHash(this.fromOutside))
            }), !this.fromOutside && this.domPosition.prev === this.currentItem.prev().not(".ui-sortable-helper")[0] && this.domPosition.parent === this.currentItem.parent()[0] || e || n.push(function (t) {
                this._trigger("update", t, this._uiHash())
            }), this !== this.currentContainer && (e || (n.push(function (t) {
                this._trigger("remove", t, this._uiHash())
            }), n.push(function (t) {
                return function (e) {
                    t._trigger("receive", e, this._uiHash(this))
                }
            }.call(this, this.currentContainer)), n.push(function (t) {
                return function (e) {
                    t._trigger("update", e, this._uiHash(this))
                }
            }.call(this, this.currentContainer)))), s = this.containers.length - 1; s >= 0; s--) e || n.push(i("deactivate", this, this.containers[s])), this.containers[s].containerCache.over && (n.push(i("out", this, this.containers[s])), this.containers[s].containerCache.over = 0);
            if (this.storedCursor && (this.document.find("body").css("cursor", this.storedCursor), this.storedStylesheet.remove()), this._storedOpacity && this.helper.css("opacity", this._storedOpacity), this._storedZIndex && this.helper.css("zIndex", "auto" === this._storedZIndex ? "" : this._storedZIndex), this.dragging = !1, e || this._trigger("beforeStop", t, this._uiHash()), this.placeholder[0].parentNode.removeChild(this.placeholder[0]), this.cancelHelperRemoval || (this.helper[0] !== this.currentItem[0] && this.helper.remove(), this.helper = null), !e) {
                for (s = 0; n.length > s; s++) n[s].call(this, t);
                this._trigger("stop", t, this._uiHash())
            }
            return this.fromOutside = !1, !this.cancelHelperRemoval
        },
        _trigger: function () {
            t.Widget.prototype._trigger.apply(this, arguments) === !1 && this.cancel()
        },
        _uiHash: function (e) {
            var i = e || this;
            return {
                helper: i.helper,
                placeholder: i.placeholder || t([]),
                position: i.position,
                originalPosition: i.originalPosition,
                offset: i.positionAbs,
                item: i.currentItem,
                sender: e ? e.element : null
            }
        }
    }), t.widget("ui.accordion", {
        version: "1.12.1",
        options: {
            active: 0,
            animate: {},
            classes: {
                "ui-accordion-header": "ui-corner-top",
                "ui-accordion-header-collapsed": "ui-corner-all",
                "ui-accordion-content": "ui-corner-bottom"
            },
            collapsible: !1,
            event: "click",
            header: "> li > :first-child, > :not(li):even",
            heightStyle: "auto",
            icons: {activeHeader: "ui-icon-triangle-1-s", header: "ui-icon-triangle-1-e"},
            activate: null,
            beforeActivate: null
        },
        hideProps: {
            borderTopWidth: "hide",
            borderBottomWidth: "hide",
            paddingTop: "hide",
            paddingBottom: "hide",
            height: "hide"
        },
        showProps: {
            borderTopWidth: "show",
            borderBottomWidth: "show",
            paddingTop: "show",
            paddingBottom: "show",
            height: "show"
        },
        _create: function () {
            var e = this.options;
            this.prevShow = this.prevHide = t(), this._addClass("ui-accordion", "ui-widget ui-helper-reset"), this.element.attr("role", "tablist"), e.collapsible || e.active !== !1 && null != e.active || (e.active = 0), this._processPanels(), 0 > e.active && (e.active += this.headers.length), this._refresh()
        },
        _getCreateEventData: function () {
            return {header: this.active, panel: this.active.length ? this.active.next() : t()}
        },
        _createIcons: function () {
            var e, i, s = this.options.icons;
            s && (e = t("<span>"), this._addClass(e, "ui-accordion-header-icon", "ui-icon " + s.header), e.prependTo(this.headers), i = this.active.children(".ui-accordion-header-icon"), this._removeClass(i, s.header)._addClass(i, null, s.activeHeader)._addClass(this.headers, "ui-accordion-icons"))
        },
        _destroyIcons: function () {
            this._removeClass(this.headers, "ui-accordion-icons"), this.headers.children(".ui-accordion-header-icon").remove()
        },
        _destroy: function () {
            var t;
            this.element.removeAttr("role"), this.headers.removeAttr("role aria-expanded aria-selected aria-controls tabIndex").removeUniqueId(), this._destroyIcons(), t = this.headers.next().css("display", "").removeAttr("role aria-hidden aria-labelledby").removeUniqueId(), "content" !== this.options.heightStyle && t.css("height", "")
        },
        _setOption: function (t, e) {
            return "active" === t ? (this._activate(e), void 0) : ("event" === t && (this.options.event && this._off(this.headers, this.options.event), this._setupEvents(e)), this._super(t, e), "collapsible" !== t || e || this.options.active !== !1 || this._activate(0), "icons" === t && (this._destroyIcons(), e && this._createIcons()), void 0)
        },
        _setOptionDisabled: function (t) {
            this._super(t), this.element.attr("aria-disabled", t), this._toggleClass(null, "ui-state-disabled", !!t), this._toggleClass(this.headers.add(this.headers.next()), null, "ui-state-disabled", !!t)
        },
        _keydown: function (e) {
            if (!e.altKey && !e.ctrlKey) {
                var i = t.ui.keyCode, s = this.headers.length, n = this.headers.index(e.target), o = !1;
                switch (e.keyCode) {
                    case i.RIGHT:
                    case i.DOWN:
                        o = this.headers[(n + 1) % s];
                        break;
                    case i.LEFT:
                    case i.UP:
                        o = this.headers[(n - 1 + s) % s];
                        break;
                    case i.SPACE:
                    case i.ENTER:
                        this._eventHandler(e);
                        break;
                    case i.HOME:
                        o = this.headers[0];
                        break;
                    case i.END:
                        o = this.headers[s - 1]
                }
                o && (t(e.target).attr("tabIndex", -1), t(o).attr("tabIndex", 0), t(o).trigger("focus"), e.preventDefault())
            }
        },
        _panelKeyDown: function (e) {
            e.keyCode === t.ui.keyCode.UP && e.ctrlKey && t(e.currentTarget).prev().trigger("focus")
        },
        refresh: function () {
            var e = this.options;
            this._processPanels(), e.active === !1 && e.collapsible === !0 || !this.headers.length ? (e.active = !1, this.active = t()) : e.active === !1 ? this._activate(0) : this.active.length && !t.contains(this.element[0], this.active[0]) ? this.headers.length === this.headers.find(".ui-state-disabled").length ? (e.active = !1, this.active = t()) : this._activate(Math.max(0, e.active - 1)) : e.active = this.headers.index(this.active), this._destroyIcons(), this._refresh()
        },
        _processPanels: function () {
            var t = this.headers, e = this.panels;
            this.headers = this.element.find(this.options.header), this._addClass(this.headers, "ui-accordion-header ui-accordion-header-collapsed", "ui-state-default"), this.panels = this.headers.next().filter(":not(.ui-accordion-content-active)").hide(), this._addClass(this.panels, "ui-accordion-content", "ui-helper-reset ui-widget-content"), e && (this._off(t.not(this.headers)), this._off(e.not(this.panels)))
        },
        _refresh: function () {
            var e, i = this.options, s = i.heightStyle, n = this.element.parent();
            this.active = this._findActive(i.active), this._addClass(this.active, "ui-accordion-header-active", "ui-state-active")._removeClass(this.active, "ui-accordion-header-collapsed"), this._addClass(this.active.next(), "ui-accordion-content-active"), this.active.next().show(), this.headers.attr("role", "tab").each(function () {
                var e = t(this), i = e.uniqueId().attr("id"), s = e.next(), n = s.uniqueId().attr("id");
                e.attr("aria-controls", n), s.attr("aria-labelledby", i)
            }).next().attr("role", "tabpanel"), this.headers.not(this.active).attr({
                "aria-selected": "false",
                "aria-expanded": "false",
                tabIndex: -1
            }).next().attr({"aria-hidden": "true"}).hide(), this.active.length ? this.active.attr({
                "aria-selected": "true",
                "aria-expanded": "true",
                tabIndex: 0
            }).next().attr({"aria-hidden": "false"}) : this.headers.eq(0).attr("tabIndex", 0), this._createIcons(), this._setupEvents(i.event), "fill" === s ? (e = n.height(), this.element.siblings(":visible").each(function () {
                var i = t(this), s = i.css("position");
                "absolute" !== s && "fixed" !== s && (e -= i.outerHeight(!0))
            }), this.headers.each(function () {
                e -= t(this).outerHeight(!0)
            }), this.headers.next().each(function () {
                t(this).height(Math.max(0, e - t(this).innerHeight() + t(this).height()))
            }).css("overflow", "auto")) : "auto" === s && (e = 0, this.headers.next().each(function () {
                var i = t(this).is(":visible");
                i || t(this).show(), e = Math.max(e, t(this).css("height", "").height()), i || t(this).hide()
            }).height(e))
        },
        _activate: function (e) {
            var i = this._findActive(e)[0];
            i !== this.active[0] && (i = i || this.active[0], this._eventHandler({
                target: i,
                currentTarget: i,
                preventDefault: t.noop
            }))
        },
        _findActive: function (e) {
            return "number" == typeof e ? this.headers.eq(e) : t()
        },
        _setupEvents: function (e) {
            var i = {keydown: "_keydown"};
            e && t.each(e.split(" "), function (t, e) {
                i[e] = "_eventHandler"
            }), this._off(this.headers.add(this.headers.next())), this._on(this.headers, i), this._on(this.headers.next(), {keydown: "_panelKeyDown"}), this._hoverable(this.headers), this._focusable(this.headers)
        },
        _eventHandler: function (e) {
            var i, s, n = this.options, o = this.active, a = t(e.currentTarget), r = a[0] === o[0],
                l = r && n.collapsible, h = l ? t() : a.next(), c = o.next(),
                u = {oldHeader: o, oldPanel: c, newHeader: l ? t() : a, newPanel: h};
            e.preventDefault(), r && !n.collapsible || this._trigger("beforeActivate", e, u) === !1 || (n.active = l ? !1 : this.headers.index(a), this.active = r ? t() : a, this._toggle(u), this._removeClass(o, "ui-accordion-header-active", "ui-state-active"), n.icons && (i = o.children(".ui-accordion-header-icon"), this._removeClass(i, null, n.icons.activeHeader)._addClass(i, null, n.icons.header)), r || (this._removeClass(a, "ui-accordion-header-collapsed")._addClass(a, "ui-accordion-header-active", "ui-state-active"), n.icons && (s = a.children(".ui-accordion-header-icon"), this._removeClass(s, null, n.icons.header)._addClass(s, null, n.icons.activeHeader)), this._addClass(a.next(), "ui-accordion-content-active")))
        },
        _toggle: function (e) {
            var i = e.newPanel, s = this.prevShow.length ? this.prevShow : e.oldPanel;
            this.prevShow.add(this.prevHide).stop(!0, !0), this.prevShow = i, this.prevHide = s, this.options.animate ? this._animate(i, s, e) : (s.hide(), i.show(), this._toggleComplete(e)), s.attr({"aria-hidden": "true"}), s.prev().attr({
                "aria-selected": "false",
                "aria-expanded": "false"
            }), i.length && s.length ? s.prev().attr({
                tabIndex: -1,
                "aria-expanded": "false"
            }) : i.length && this.headers.filter(function () {
                return 0 === parseInt(t(this).attr("tabIndex"), 10)
            }).attr("tabIndex", -1), i.attr("aria-hidden", "false").prev().attr({
                "aria-selected": "true",
                "aria-expanded": "true",
                tabIndex: 0
            })
        },
        _animate: function (t, e, i) {
            var s, n, o, a = this, r = 0, l = t.css("box-sizing"),
                h = t.length && (!e.length || t.index() < e.index()), c = this.options.animate || {},
                u = h && c.down || c, d = function () {
                    a._toggleComplete(i)
                };
            return "number" == typeof u && (o = u), "string" == typeof u && (n = u), n = n || u.easing || c.easing, o = o || u.duration || c.duration, e.length ? t.length ? (s = t.show().outerHeight(), e.animate(this.hideProps, {
                duration: o,
                easing: n,
                step: function (t, e) {
                    e.now = Math.round(t)
                }
            }), t.hide().animate(this.showProps, {
                duration: o, easing: n, complete: d, step: function (t, i) {
                    i.now = Math.round(t), "height" !== i.prop ? "content-box" === l && (r += i.now) : "content" !== a.options.heightStyle && (i.now = Math.round(s - e.outerHeight() - r), r = 0)
                }
            }), void 0) : e.animate(this.hideProps, o, n, d) : t.animate(this.showProps, o, n, d)
        },
        _toggleComplete: function (t) {
            var e = t.oldPanel, i = e.prev();
            this._removeClass(e, "ui-accordion-content-active"), this._removeClass(i, "ui-accordion-header-active")._addClass(i, "ui-accordion-header-collapsed"), e.length && (e.parent()[0].className = e.parent()[0].className), this._trigger("activate", null, t)
        }
    }), t.widget("ui.menu", {
        version: "1.12.1",
        defaultElement: "<ul>",
        delay: 300,
        options: {
            icons: {submenu: "ui-icon-caret-1-e"},
            items: "> *",
            menus: "ul",
            position: {my: "left top", at: "right top"},
            role: "menu",
            blur: null,
            focus: null,
            select: null
        },
        _create: function () {
            this.activeMenu = this.element, this.mouseHandled = !1, this.element.uniqueId().attr({
                role: this.options.role,
                tabIndex: 0
            }), this._addClass("ui-menu", "ui-widget ui-widget-content"), this._on({
                "mousedown .ui-menu-item": function (t) {
                    t.preventDefault()
                }, "click .ui-menu-item": function (e) {
                    var i = t(e.target), s = t(t.ui.safeActiveElement(this.document[0]));
                    !this.mouseHandled && i.not(".ui-state-disabled").length && (this.select(e), e.isPropagationStopped() || (this.mouseHandled = !0), i.has(".ui-menu").length ? this.expand(e) : !this.element.is(":focus") && s.closest(".ui-menu").length && (this.element.trigger("focus", [!0]), this.active && 1 === this.active.parents(".ui-menu").length && clearTimeout(this.timer)))
                }, "mouseenter .ui-menu-item": function (e) {
                    if (!this.previousFilter) {
                        var i = t(e.target).closest(".ui-menu-item"), s = t(e.currentTarget);
                        i[0] === s[0] && (this._removeClass(s.siblings().children(".ui-state-active"), null, "ui-state-active"), this.focus(e, s))
                    }
                }, mouseleave: "collapseAll", "mouseleave .ui-menu": "collapseAll", focus: function (t, e) {
                    var i = this.active || this.element.find(this.options.items).eq(0);
                    e || this.focus(t, i)
                }, blur: function (e) {
                    this._delay(function () {
                        var i = !t.contains(this.element[0], t.ui.safeActiveElement(this.document[0]));
                        i && this.collapseAll(e)
                    })
                }, keydown: "_keydown"
            }), this.refresh(), this._on(this.document, {
                click: function (t) {
                    this._closeOnDocumentClick(t) && this.collapseAll(t), this.mouseHandled = !1
                }
            })
        },
        _destroy: function () {
            var e = this.element.find(".ui-menu-item").removeAttr("role aria-disabled"),
                i = e.children(".ui-menu-item-wrapper").removeUniqueId().removeAttr("tabIndex role aria-haspopup");
            this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeAttr("role aria-labelledby aria-expanded aria-hidden aria-disabled tabIndex").removeUniqueId().show(), i.children().each(function () {
                var e = t(this);
                e.data("ui-menu-submenu-caret") && e.remove()
            })
        },
        _keydown: function (e) {
            var i, s, n, o, a = !0;
            switch (e.keyCode) {
                case t.ui.keyCode.PAGE_UP:
                    this.previousPage(e);
                    break;
                case t.ui.keyCode.PAGE_DOWN:
                    this.nextPage(e);
                    break;
                case t.ui.keyCode.HOME:
                    this._move("first", "first", e);
                    break;
                case t.ui.keyCode.END:
                    this._move("last", "last", e);
                    break;
                case t.ui.keyCode.UP:
                    this.previous(e);
                    break;
                case t.ui.keyCode.DOWN:
                    this.next(e);
                    break;
                case t.ui.keyCode.LEFT:
                    this.collapse(e);
                    break;
                case t.ui.keyCode.RIGHT:
                    this.active && !this.active.is(".ui-state-disabled") && this.expand(e);
                    break;
                case t.ui.keyCode.ENTER:
                case t.ui.keyCode.SPACE:
                    this._activate(e);
                    break;
                case t.ui.keyCode.ESCAPE:
                    this.collapse(e);
                    break;
                default:
                    a = !1, s = this.previousFilter || "", o = !1, n = e.keyCode >= 96 && 105 >= e.keyCode ? "" + (e.keyCode - 96) : String.fromCharCode(e.keyCode), clearTimeout(this.filterTimer), n === s ? o = !0 : n = s + n, i = this._filterMenuItems(n), i = o && -1 !== i.index(this.active.next()) ? this.active.nextAll(".ui-menu-item") : i, i.length || (n = String.fromCharCode(e.keyCode), i = this._filterMenuItems(n)), i.length ? (this.focus(e, i), this.previousFilter = n, this.filterTimer = this._delay(function () {
                        delete this.previousFilter
                    }, 1e3)) : delete this.previousFilter
            }
            a && e.preventDefault()
        },
        _activate: function (t) {
            this.active && !this.active.is(".ui-state-disabled") && (this.active.children("[aria-haspopup='true']").length ? this.expand(t) : this.select(t))
        },
        refresh: function () {
            var e, i, s, n, o, a = this, r = this.options.icons.submenu,
                l = this.element.find(this.options.menus);
            this._toggleClass("ui-menu-icons", null, !!this.element.find(".ui-icon").length), s = l.filter(":not(.ui-menu)").hide().attr({
                role: this.options.role,
                "aria-hidden": "true",
                "aria-expanded": "false"
            }).each(function () {
                var e = t(this), i = e.prev(), s = t("<span>").data("ui-menu-submenu-caret", !0);
                a._addClass(s, "ui-menu-icon", "ui-icon " + r), i.attr("aria-haspopup", "true").prepend(s), e.attr("aria-labelledby", i.attr("id"))
            }), this._addClass(s, "ui-menu", "ui-widget ui-widget-content ui-front"), e = l.add(this.element), i = e.find(this.options.items), i.not(".ui-menu-item").each(function () {
                var e = t(this);
                a._isDivider(e) && a._addClass(e, "ui-menu-divider", "ui-widget-content")
            }), n = i.not(".ui-menu-item, .ui-menu-divider"), o = n.children().not(".ui-menu").uniqueId().attr({
                tabIndex: -1,
                role: this._itemRole()
            }), this._addClass(n, "ui-menu-item")._addClass(o, "ui-menu-item-wrapper"), i.filter(".ui-state-disabled").attr("aria-disabled", "true"), this.active && !t.contains(this.element[0], this.active[0]) && this.blur()
        },
        _itemRole: function () {
            return {menu: "menuitem", listbox: "option"}[this.options.role]
        },
        _setOption: function (t, e) {
            if ("icons" === t) {
                var i = this.element.find(".ui-menu-icon");
                this._removeClass(i, null, this.options.icons.submenu)._addClass(i, null, e.submenu)
            }
            this._super(t, e)
        },
        _setOptionDisabled: function (t) {
            this._super(t), this.element.attr("aria-disabled", t + ""), this._toggleClass(null, "ui-state-disabled", !!t)
        },
        focus: function (t, e) {
            var i, s, n;
            this.blur(t, t && "focus" === t.type), this._scrollIntoView(e), this.active = e.first(), s = this.active.children(".ui-menu-item-wrapper"), this._addClass(s, null, "ui-state-active"), this.options.role && this.element.attr("aria-activedescendant", s.attr("id")), n = this.active.parent().closest(".ui-menu-item").children(".ui-menu-item-wrapper"), this._addClass(n, null, "ui-state-active"), t && "keydown" === t.type ? this._close() : this.timer = this._delay(function () {
                this._close()
            }, this.delay), i = e.children(".ui-menu"), i.length && t && /^mouse/.test(t.type) && this._startOpening(i), this.activeMenu = e.parent(), this._trigger("focus", t, {item: e})
        },
        _scrollIntoView: function (e) {
            var i, s, n, o, a, r;
            this._hasScroll() && (i = parseFloat(t.css(this.activeMenu[0], "borderTopWidth")) || 0, s = parseFloat(t.css(this.activeMenu[0], "paddingTop")) || 0, n = e.offset().top - this.activeMenu.offset().top - i - s, o = this.activeMenu.scrollTop(), a = this.activeMenu.height(), r = e.outerHeight(), 0 > n ? this.activeMenu.scrollTop(o + n) : n + r > a && this.activeMenu.scrollTop(o + n - a + r))
        },
        blur: function (t, e) {
            e || clearTimeout(this.timer), this.active && (this._removeClass(this.active.children(".ui-menu-item-wrapper"), null, "ui-state-active"), this._trigger("blur", t, {item: this.active}), this.active = null)
        },
        _startOpening: function (t) {
            clearTimeout(this.timer), "true" === t.attr("aria-hidden") && (this.timer = this._delay(function () {
                this._close(), this._open(t)
            }, this.delay))
        },
        _open: function (e) {
            var i = t.extend({of: this.active}, this.options.position);
            clearTimeout(this.timer), this.element.find(".ui-menu").not(e.parents(".ui-menu")).hide().attr("aria-hidden", "true"), e.show().removeAttr("aria-hidden").attr("aria-expanded", "true").position(i)
        },
        collapseAll: function (e, i) {
            clearTimeout(this.timer), this.timer = this._delay(function () {
                var s = i ? this.element : t(e && e.target).closest(this.element.find(".ui-menu"));
                s.length || (s = this.element), this._close(s), this.blur(e), this._removeClass(s.find(".ui-state-active"), null, "ui-state-active"), this.activeMenu = s
            }, this.delay)
        },
        _close: function (t) {
            t || (t = this.active ? this.active.parent() : this.element), t.find(".ui-menu").hide().attr("aria-hidden", "true").attr("aria-expanded", "false")
        },
        _closeOnDocumentClick: function (e) {
            return !t(e.target).closest(".ui-menu").length
        },
        _isDivider: function (t) {
            return !/[^\-\u2014\u2013\s]/.test(t.text())
        },
        collapse: function (t) {
            var e = this.active && this.active.parent().closest(".ui-menu-item", this.element);
            e && e.length && (this._close(), this.focus(t, e))
        },
        expand: function (t) {
            var e = this.active && this.active.children(".ui-menu ").find(this.options.items).first();
            e && e.length && (this._open(e.parent()), this._delay(function () {
                this.focus(t, e)
            }))
        },
        next: function (t) {
            this._move("next", "first", t)
        },
        previous: function (t) {
            this._move("prev", "last", t)
        },
        isFirstItem: function () {
            return this.active && !this.active.prevAll(".ui-menu-item").length
        },
        isLastItem: function () {
            return this.active && !this.active.nextAll(".ui-menu-item").length
        },
        _move: function (t, e, i) {
            var s;
            this.active && (s = "first" === t || "last" === t ? this.active["first" === t ? "prevAll" : "nextAll"](".ui-menu-item").eq(-1) : this.active[t + "All"](".ui-menu-item").eq(0)), s && s.length && this.active || (s = this.activeMenu.find(this.options.items)[e]()), this.focus(i, s)
        },
        nextPage: function (e) {
            var i, s, n;
            return this.active ? (this.isLastItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.nextAll(".ui-menu-item").each(function () {
                return i = t(this), 0 > i.offset().top - s - n
            }), this.focus(e, i)) : this.focus(e, this.activeMenu.find(this.options.items)[this.active ? "last" : "first"]())), void 0) : (this.next(e), void 0)
        },
        previousPage: function (e) {
            var i, s, n;
            return this.active ? (this.isFirstItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.prevAll(".ui-menu-item").each(function () {
                return i = t(this), i.offset().top - s + n > 0
            }), this.focus(e, i)) : this.focus(e, this.activeMenu.find(this.options.items).first())), void 0) : (this.next(e), void 0)
        },
        _hasScroll: function () {
            return this.element.outerHeight() < this.element.prop("scrollHeight")
        },
        select: function (e) {
            this.active = this.active || t(e.target).closest(".ui-menu-item");
            var i = {item: this.active};
            this.active.has(".ui-menu").length || this.collapseAll(e, !0), this._trigger("select", e, i)
        },
        _filterMenuItems: function (e) {
            var i = e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&"), s = RegExp("^" + i, "i");
            return this.activeMenu.find(this.options.items).filter(".ui-menu-item").filter(function () {
                return s.test(t.trim(t(this).children(".ui-menu-item-wrapper").text()))
            })
        }
    }), t.widget("ui.autocomplete", {
        version: "1.12.1",
        defaultElement: "<input>",
        options: {
            appendTo: null,
            autoFocus: !1,
            delay: 300,
            minLength: 1,
            position: {my: "left top", at: "left bottom", collision: "none"},
            source: null,
            change: null,
            close: null,
            focus: null,
            open: null,
            response: null,
            search: null,
            select: null
        },
        requestIndex: 0,
        pending: 0,
        _create: function () {
            var e, i, s, n = this.element[0].nodeName.toLowerCase(), o = "textarea" === n, a = "input" === n;
            this.isMultiLine = o || !a && this._isContentEditable(this.element), this.valueMethod = this.element[o || a ? "val" : "text"], this.isNewMenu = !0, this._addClass("ui-autocomplete-input"), this.element.attr("autocomplete", "off"), this._on(this.element, {
                keydown: function (n) {
                    if (this.element.prop("readOnly")) return e = !0, s = !0, i = !0, void 0;
                    e = !1, s = !1, i = !1;
                    var o = t.ui.keyCode;
                    switch (n.keyCode) {
                        case o.PAGE_UP:
                            e = !0, this._move("previousPage", n);
                            break;
                        case o.PAGE_DOWN:
                            e = !0, this._move("nextPage", n);
                            break;
                        case o.UP:
                            e = !0, this._keyEvent("previous", n);
                            break;
                        case o.DOWN:
                            e = !0, this._keyEvent("next", n);
                            break;
                        case o.ENTER:
                            this.menu.active && (e = !0, n.preventDefault(), this.menu.select(n));
                            break;
                        case o.TAB:
                            this.menu.active && this.menu.select(n);
                            break;
                        case o.ESCAPE:
                            this.menu.element.is(":visible") && (this.isMultiLine || this._value(this.term), this.close(n), n.preventDefault());
                            break;
                        default:
                            i = !0, this._searchTimeout(n)
                    }
                }, keypress: function (s) {
                    if (e) return e = !1, (!this.isMultiLine || this.menu.element.is(":visible")) && s.preventDefault(), void 0;
                    if (!i) {
                        var n = t.ui.keyCode;
                        switch (s.keyCode) {
                            case n.PAGE_UP:
                                this._move("previousPage", s);
                                break;
                            case n.PAGE_DOWN:
                                this._move("nextPage", s);
                                break;
                            case n.UP:
                                this._keyEvent("previous", s);
                                break;
                            case n.DOWN:
                                this._keyEvent("next", s)
                        }
                    }
                }, input: function (t) {
                    return s ? (s = !1, t.preventDefault(), void 0) : (this._searchTimeout(t), void 0)
                }, focus: function () {
                    this.selectedItem = null, this.previous = this._value()
                }, blur: function (t) {
                    return this.cancelBlur ? (delete this.cancelBlur, void 0) : (clearTimeout(this.searching), this.close(t), this._change(t), void 0)
                }
            }), this._initSource(), this.menu = t("<ul>").appendTo(this._appendTo()).menu({role: null}).hide().menu("instance"), this._addClass(this.menu.element, "ui-autocomplete", "ui-front"), this._on(this.menu.element, {
                mousedown: function (e) {
                    e.preventDefault(), this.cancelBlur = !0, this._delay(function () {
                        delete this.cancelBlur, this.element[0] !== t.ui.safeActiveElement(this.document[0]) && this.element.trigger("focus")
                    })
                }, menufocus: function (e, i) {
                    var s, n;
                    return this.isNewMenu && (this.isNewMenu = !1, e.originalEvent && /^mouse/.test(e.originalEvent.type)) ? (this.menu.blur(), this.document.one("mousemove", function () {
                        t(e.target).trigger(e.originalEvent)
                    }), void 0) : (n = i.item.data("ui-autocomplete-item"), !1 !== this._trigger("focus", e, {item: n}) && e.originalEvent && /^key/.test(e.originalEvent.type) && this._value(n.value), s = i.item.attr("aria-label") || n.value, s && t.trim(s).length && (this.liveRegion.children().hide(), t("<div>").text(s).appendTo(this.liveRegion)), void 0)
                }, menuselect: function (e, i) {
                    var s = i.item.data("ui-autocomplete-item"), n = this.previous;
                    this.element[0] !== t.ui.safeActiveElement(this.document[0]) && (this.element.trigger("focus"), this.previous = n, this._delay(function () {
                        this.previous = n, this.selectedItem = s
                    })), !1 !== this._trigger("select", e, {item: s}) && this._value(s.value), this.term = this._value(), this.close(e), this.selectedItem = s
                }
            }), this.liveRegion = t("<div>", {
                role: "status",
                "aria-live": "assertive",
                "aria-relevant": "additions"
            }).appendTo(this.document[0].body), this._addClass(this.liveRegion, null, "ui-helper-hidden-accessible"), this._on(this.window, {
                beforeunload: function () {
                    this.element.removeAttr("autocomplete")
                }
            })
        },
        _destroy: function () {
            clearTimeout(this.searching), this.element.removeAttr("autocomplete"), this.menu.element.remove(), this.liveRegion.remove()
        },
        _setOption: function (t, e) {
            this._super(t, e), "source" === t && this._initSource(), "appendTo" === t && this.menu.element.appendTo(this._appendTo()), "disabled" === t && e && this.xhr && this.xhr.abort()
        },
        _isEventTargetInWidget: function (e) {
            var i = this.menu.element[0];
            return e.target === this.element[0] || e.target === i || t.contains(i, e.target)
        },
        _closeOnClickOutside: function (t) {
            this._isEventTargetInWidget(t) || this.close()
        },
        _appendTo: function () {
            var e = this.options.appendTo;
            return e && (e = e.jquery || e.nodeType ? t(e) : this.document.find(e).eq(0)), e && e[0] || (e = this.element.closest(".ui-front, dialog")), e.length || (e = this.document[0].body), e
        },
        _initSource: function () {
            var e, i, s = this;
            t.isArray(this.options.source) ? (e = this.options.source, this.source = function (i, s) {
                s(t.ui.autocomplete.filter(e, i.term))
            }) : "string" == typeof this.options.source ? (i = this.options.source, this.source = function (e, n) {
                s.xhr && s.xhr.abort(), s.xhr = t.ajax({
                    url: i,
                    data: e,
                    dataType: "json",
                    success: function (t) {
                        n(t)
                    },
                    error: function () {
                        n([])
                    }
                })
            }) : this.source = this.options.source
        },
        _searchTimeout: function (t) {
            clearTimeout(this.searching), this.searching = this._delay(function () {
                var e = this.term === this._value(), i = this.menu.element.is(":visible"),
                    s = t.altKey || t.ctrlKey || t.metaKey || t.shiftKey;
                (!e || e && !i && !s) && (this.selectedItem = null, this.search(null, t))
            }, this.options.delay)
        },
        search: function (t, e) {
            return t = null != t ? t : this._value(), this.term = this._value(), t.length < this.options.minLength ? this.close(e) : this._trigger("search", e) !== !1 ? this._search(t) : void 0
        },
        _search: function (t) {
            this.pending++, this._addClass("ui-autocomplete-loading"), this.cancelSearch = !1, this.source({term: t}, this._response())
        },
        _response: function () {
            var e = ++this.requestIndex;
            return t.proxy(function (t) {
                e === this.requestIndex && this.__response(t), this.pending--, this.pending || this._removeClass("ui-autocomplete-loading")
            }, this)
        },
        __response: function (t) {
            t && (t = this._normalize(t)), this._trigger("response", null, {content: t}), !this.options.disabled && t && t.length && !this.cancelSearch ? (this._suggest(t), this._trigger("open")) : this._close()
        },
        close: function (t) {
            this.cancelSearch = !0, this._close(t)
        },
        _close: function (t) {
            this._off(this.document, "mousedown"), this.menu.element.is(":visible") && (this.menu.element.hide(), this.menu.blur(), this.isNewMenu = !0, this._trigger("close", t))
        },
        _change: function (t) {
            this.previous !== this._value() && this._trigger("change", t, {item: this.selectedItem})
        },
        _normalize: function (e) {
            return e.length && e[0].label && e[0].value ? e : t.map(e, function (e) {
                return "string" == typeof e ? {label: e, value: e} : t.extend({}, e, {
                    label: e.label || e.value,
                    value: e.value || e.label
                })
            })
        },
        _suggest: function (e) {
            var i = this.menu.element.empty();
            this._renderMenu(i, e), this.isNewMenu = !0, this.menu.refresh(), i.show(), this._resizeMenu(), i.position(t.extend({of: this.element}, this.options.position)), this.options.autoFocus && this.menu.next(), this._on(this.document, {mousedown: "_closeOnClickOutside"})
        },
        _resizeMenu: function () {
            var t = this.menu.element;
            t.outerWidth(Math.max(t.width("").outerWidth() + 1, this.element.outerWidth()))
        },
        _renderMenu: function (e, i) {
            var s = this;
            t.each(i, function (t, i) {
                s._renderItemData(e, i)
            })
        },
        _renderItemData: function (t, e) {
            return this._renderItem(t, e).data("ui-autocomplete-item", e)
        },
        _renderItem: function (e, i) {
            return t("<li>").append(t("<div>").text(i.label)).appendTo(e)
        },
        _move: function (t, e) {
            return this.menu.element.is(":visible") ? this.menu.isFirstItem() && /^previous/.test(t) || this.menu.isLastItem() && /^next/.test(t) ? (this.isMultiLine || this._value(this.term), this.menu.blur(), void 0) : (this.menu[t](e), void 0) : (this.search(null, e), void 0)
        },
        widget: function () {
            return this.menu.element
        },
        _value: function () {
            return this.valueMethod.apply(this.element, arguments)
        },
        _keyEvent: function (t, e) {
            (!this.isMultiLine || this.menu.element.is(":visible")) && (this._move(t, e), e.preventDefault())
        },
        _isContentEditable: function (t) {
            if (!t.length) return !1;
            var e = t.prop("contentEditable");
            return "inherit" === e ? this._isContentEditable(t.parent()) : "true" === e
        }
    }), t.extend(t.ui.autocomplete, {
        escapeRegex: function (t) {
            return t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
        }, filter: function (e, i) {
            var s = RegExp(t.ui.autocomplete.escapeRegex(i), "i");
            return t.grep(e, function (t) {
                return s.test(t.label || t.value || t)
            })
        }
    }), t.widget("ui.autocomplete", t.ui.autocomplete, {
        options: {
            messages: {
                noResults: "No search results.",
                results: function (t) {
                    return t + (t > 1 ? " results are" : " result is") + " available, use up and down arrow keys to navigate."
                }
            }
        }, __response: function (e) {
            var i;
            this._superApply(arguments), this.options.disabled || this.cancelSearch || (i = e && e.length ? this.options.messages.results(e.length) : this.options.messages.noResults, this.liveRegion.children().hide(), t("<div>").text(i).appendTo(this.liveRegion))
        }
    }), t.ui.autocomplete;
    var d = /ui-corner-([a-z]){2,6}/g;
    t.widget("ui.controlgroup", {
        version: "1.12.1",
        defaultElement: "<div>",
        options: {
            direction: "horizontal",
            disabled: null,
            onlyVisible: !0,
            items: {
                button: "input[type=button], input[type=submit], input[type=reset], button, a",
                controlgroupLabel: ".ui-controlgroup-label",
                checkboxradio: "input[type='checkbox'], input[type='radio']",
                selectmenu: "select",
                spinner: ".ui-spinner-input"
            }
        },
        _create: function () {
            this._enhance()
        },
        _enhance: function () {
            this.element.attr("role", "toolbar"), this.refresh()
        },
        _destroy: function () {
            this._callChildMethod("destroy"), this.childWidgets.removeData("ui-controlgroup-data"), this.element.removeAttr("role"), this.options.items.controlgroupLabel && this.element.find(this.options.items.controlgroupLabel).find(".ui-controlgroup-label-contents").contents().unwrap()
        },
        _initWidgets: function () {
            var e = this, i = [];
            t.each(this.options.items, function (s, n) {
                var o, a = {};
                return n ? "controlgroupLabel" === s ? (o = e.element.find(n), o.each(function () {
                    var e = t(this);
                    e.children(".ui-controlgroup-label-contents").length || e.contents().wrapAll("<span class='ui-controlgroup-label-contents'></span>")
                }), e._addClass(o, null, "ui-widget ui-widget-content ui-state-default"), i = i.concat(o.get()), void 0) : (t.fn[s] && (a = e["_" + s + "Options"] ? e["_" + s + "Options"]("middle") : {classes: {}}, e.element.find(n).each(function () {
                    var n = t(this), o = n[s]("instance"), r = t.widget.extend({}, a);
                    if ("button" !== s || !n.parent(".ui-spinner").length) {
                        o || (o = n[s]()[s]("instance")), o && (r.classes = e._resolveClassesValues(r.classes, o)), n[s](r);
                        var l = n[s]("widget");
                        t.data(l[0], "ui-controlgroup-data", o ? o : n[s]("instance")), i.push(l[0])
                    }
                })), void 0) : void 0
            }), this.childWidgets = t(t.unique(i)), this._addClass(this.childWidgets, "ui-controlgroup-item")
        },
        _callChildMethod: function (e) {
            this.childWidgets.each(function () {
                var i = t(this), s = i.data("ui-controlgroup-data");
                s && s[e] && s[e]()
            })
        },
        _updateCornerClass: function (t, e) {
            var i = "ui-corner-top ui-corner-bottom ui-corner-left ui-corner-right ui-corner-all",
                s = this._buildSimpleOptions(e, "label").classes.label;
            this._removeClass(t, null, i), this._addClass(t, null, s)
        },
        _buildSimpleOptions: function (t, e) {
            var i = "vertical" === this.options.direction, s = {classes: {}};
            return s.classes[e] = {
                middle: "",
                first: "ui-corner-" + (i ? "top" : "left"),
                last: "ui-corner-" + (i ? "bottom" : "right"),
                only: "ui-corner-all"
            }[t], s
        },
        _spinnerOptions: function (t) {
            var e = this._buildSimpleOptions(t, "ui-spinner");
            return e.classes["ui-spinner-up"] = "", e.classes["ui-spinner-down"] = "", e
        },
        _buttonOptions: function (t) {
            return this._buildSimpleOptions(t, "ui-button")
        },
        _checkboxradioOptions: function (t) {
            return this._buildSimpleOptions(t, "ui-checkboxradio-label")
        },
        _selectmenuOptions: function (t) {
            var e = "vertical" === this.options.direction;
            return {
                width: e ? "auto" : !1,
                classes: {
                    middle: {"ui-selectmenu-button-open": "", "ui-selectmenu-button-closed": ""},
                    first: {
                        "ui-selectmenu-button-open": "ui-corner-" + (e ? "top" : "tl"),
                        "ui-selectmenu-button-closed": "ui-corner-" + (e ? "top" : "left")
                    },
                    last: {
                        "ui-selectmenu-button-open": e ? "" : "ui-corner-tr",
                        "ui-selectmenu-button-closed": "ui-corner-" + (e ? "bottom" : "right")
                    },
                    only: {
                        "ui-selectmenu-button-open": "ui-corner-top",
                        "ui-selectmenu-button-closed": "ui-corner-all"
                    }
                }[t]
            }
        },
        _resolveClassesValues: function (e, i) {
            var s = {};
            return t.each(e, function (n) {
                var o = i.options.classes[n] || "";
                o = t.trim(o.replace(d, "")), s[n] = (o + " " + e[n]).replace(/\s+/g, " ")
            }), s
        },
        _setOption: function (t, e) {
            return "direction" === t && this._removeClass("ui-controlgroup-" + this.options.direction), this._super(t, e), "disabled" === t ? (this._callChildMethod(e ? "disable" : "enable"), void 0) : (this.refresh(), void 0)
        },
        refresh: function () {
            var e, i = this;
            this._addClass("ui-controlgroup ui-controlgroup-" + this.options.direction), "horizontal" === this.options.direction && this._addClass(null, "ui-helper-clearfix"), this._initWidgets(), e = this.childWidgets, this.options.onlyVisible && (e = e.filter(":visible")), e.length && (t.each(["first", "last"], function (t, s) {
                var n = e[s]().data("ui-controlgroup-data");
                if (n && i["_" + n.widgetName + "Options"]) {
                    var o = i["_" + n.widgetName + "Options"](1 === e.length ? "only" : s);
                    o.classes = i._resolveClassesValues(o.classes, n), n.element[n.widgetName](o)
                } else i._updateCornerClass(e[s](), s)
            }), this._callChildMethod("refresh"))
        }
    }), t.widget("ui.checkboxradio", [t.ui.formResetMixin, {
        version: "1.12.1",
        options: {
            disabled: null,
            label: null,
            icon: !0,
            classes: {"ui-checkboxradio-label": "ui-corner-all", "ui-checkboxradio-icon": "ui-corner-all"}
        },
        _getCreateOptions: function () {
            var e, i, s = this, n = this._super() || {};
            return this._readType(), i = this.element.labels(), this.label = t(i[i.length - 1]), this.label.length || t.error("No label found for checkboxradio widget"), this.originalLabel = "", this.label.contents().not(this.element[0]).each(function () {
                s.originalLabel += 3 === this.nodeType ? t(this).text() : this.outerHTML
            }), this.originalLabel && (n.label = this.originalLabel), e = this.element[0].disabled, null != e && (n.disabled = e), n
        },
        _create: function () {
            var t = this.element[0].checked;
            this._bindFormResetHandler(), null == this.options.disabled && (this.options.disabled = this.element[0].disabled), this._setOption("disabled", this.options.disabled), this._addClass("ui-checkboxradio", "ui-helper-hidden-accessible"), this._addClass(this.label, "ui-checkboxradio-label", "ui-button ui-widget"), "radio" === this.type && this._addClass(this.label, "ui-checkboxradio-radio-label"), this.options.label && this.options.label !== this.originalLabel ? this._updateLabel() : this.originalLabel && (this.options.label = this.originalLabel), this._enhance(), t && (this._addClass(this.label, "ui-checkboxradio-checked", "ui-state-active"), this.icon && this._addClass(this.icon, null, "ui-state-hover")), this._on({
                change: "_toggleClasses",
                focus: function () {
                    this._addClass(this.label, null, "ui-state-focus ui-visual-focus")
                },
                blur: function () {
                    this._removeClass(this.label, null, "ui-state-focus ui-visual-focus")
                }
            })
        },
        _readType: function () {
            var e = this.element[0].nodeName.toLowerCase();
            this.type = this.element[0].type, "input" === e && /radio|checkbox/.test(this.type) || t.error("Can't create checkboxradio on element.nodeName=" + e + " and element.type=" + this.type)
        },
        _enhance: function () {
            this._updateIcon(this.element[0].checked)
        },
        widget: function () {
            return this.label
        },
        _getRadioGroup: function () {
            var e, i = this.element[0].name, s = "input[name='" + t.ui.escapeSelector(i) + "']";
            return i ? (e = this.form.length ? t(this.form[0].elements).filter(s) : t(s).filter(function () {
                return 0 === t(this).form().length
            }), e.not(this.element)) : t([])
        },
        _toggleClasses: function () {
            var e = this.element[0].checked;
            this._toggleClass(this.label, "ui-checkboxradio-checked", "ui-state-active", e), this.options.icon && "checkbox" === this.type && this._toggleClass(this.icon, null, "ui-icon-check ui-state-checked", e)._toggleClass(this.icon, null, "ui-icon-blank", !e), "radio" === this.type && this._getRadioGroup().each(function () {
                var e = t(this).checkboxradio("instance");
                e && e._removeClass(e.label, "ui-checkboxradio-checked", "ui-state-active")
            })
        },
        _destroy: function () {
            this._unbindFormResetHandler(), this.icon && (this.icon.remove(), this.iconSpace.remove())
        },
        _setOption: function (t, e) {
            return "label" !== t || e ? (this._super(t, e), "disabled" === t ? (this._toggleClass(this.label, null, "ui-state-disabled", e), this.element[0].disabled = e, void 0) : (this.refresh(), void 0)) : void 0
        },
        _updateIcon: function (e) {
            var i = "ui-icon ui-icon-background ";
            this.options.icon ? (this.icon || (this.icon = t("<span>"), this.iconSpace = t("<span> </span>"), this._addClass(this.iconSpace, "ui-checkboxradio-icon-space")), "checkbox" === this.type ? (i += e ? "ui-icon-check ui-state-checked" : "ui-icon-blank", this._removeClass(this.icon, null, e ? "ui-icon-blank" : "ui-icon-check")) : i += "ui-icon-blank", this._addClass(this.icon, "ui-checkboxradio-icon", i), e || this._removeClass(this.icon, null, "ui-icon-check ui-state-checked"), this.icon.prependTo(this.label).after(this.iconSpace)) : void 0 !== this.icon && (this.icon.remove(), this.iconSpace.remove(), delete this.icon)
        },
        _updateLabel: function () {
            var t = this.label.contents().not(this.element[0]);
            this.icon && (t = t.not(this.icon[0])), this.iconSpace && (t = t.not(this.iconSpace[0])), t.remove(), this.label.append(this.options.label)
        },
        refresh: function () {
            var t = this.element[0].checked, e = this.element[0].disabled;
            this._updateIcon(t), this._toggleClass(this.label, "ui-checkboxradio-checked", "ui-state-active", t), null !== this.options.label && this._updateLabel(), e !== this.options.disabled && this._setOptions({disabled: e})
        }
    }]), t.ui.checkboxradio, t.widget("ui.button", {
        version: "1.12.1",
        defaultElement: "<button>",
        options: {
            classes: {"ui-button": "ui-corner-all"},
            disabled: null,
            icon: null,
            iconPosition: "beginning",
            label: null,
            showLabel: !0
        },
        _getCreateOptions: function () {
            var t, e = this._super() || {};
            return this.isInput = this.element.is("input"), t = this.element[0].disabled, null != t && (e.disabled = t), this.originalLabel = this.isInput ? this.element.val() : this.element.html(), this.originalLabel && (e.label = this.originalLabel), e
        },
        _create: function () {
            !this.option.showLabel & !this.options.icon && (this.options.showLabel = !0), null == this.options.disabled && (this.options.disabled = this.element[0].disabled || !1), this.hasTitle = !!this.element.attr("title"), this.options.label && this.options.label !== this.originalLabel && (this.isInput ? this.element.val(this.options.label) : this.element.html(this.options.label)), this._addClass("ui-button", "ui-widget"), this._setOption("disabled", this.options.disabled), this._enhance(), this.element.is("a") && this._on({
                keyup: function (e) {
                    e.keyCode === t.ui.keyCode.SPACE && (e.preventDefault(), this.element[0].click ? this.element[0].click() : this.element.trigger("click"))
                }
            })
        },
        _enhance: function () {
            this.element.is("button") || this.element.attr("role", "button"), this.options.icon && (this._updateIcon("icon", this.options.icon), this._updateTooltip())
        },
        _updateTooltip: function () {
            this.title = this.element.attr("title"), this.options.showLabel || this.title || this.element.attr("title", this.options.label)
        },
        _updateIcon: function (e, i) {
            var s = "iconPosition" !== e, n = s ? this.options.iconPosition : i,
                o = "top" === n || "bottom" === n;
            this.icon ? s && this._removeClass(this.icon, null, this.options.icon) : (this.icon = t("<span>"), this._addClass(this.icon, "ui-button-icon", "ui-icon"), this.options.showLabel || this._addClass("ui-button-icon-only")), s && this._addClass(this.icon, null, i), this._attachIcon(n), o ? (this._addClass(this.icon, null, "ui-widget-icon-block"), this.iconSpace && this.iconSpace.remove()) : (this.iconSpace || (this.iconSpace = t("<span> </span>"), this._addClass(this.iconSpace, "ui-button-icon-space")), this._removeClass(this.icon, null, "ui-wiget-icon-block"), this._attachIconSpace(n))
        },
        _destroy: function () {
            this.element.removeAttr("role"), this.icon && this.icon.remove(), this.iconSpace && this.iconSpace.remove(), this.hasTitle || this.element.removeAttr("title")
        },
        _attachIconSpace: function (t) {
            this.icon[/^(?:end|bottom)/.test(t) ? "before" : "after"](this.iconSpace)
        },
        _attachIcon: function (t) {
            this.element[/^(?:end|bottom)/.test(t) ? "append" : "prepend"](this.icon)
        },
        _setOptions: function (t) {
            var e = void 0 === t.showLabel ? this.options.showLabel : t.showLabel,
                i = void 0 === t.icon ? this.options.icon : t.icon;
            e || i || (t.showLabel = !0), this._super(t)
        },
        _setOption: function (t, e) {
            "icon" === t && (e ? this._updateIcon(t, e) : this.icon && (this.icon.remove(), this.iconSpace && this.iconSpace.remove())), "iconPosition" === t && this._updateIcon(t, e), "showLabel" === t && (this._toggleClass("ui-button-icon-only", null, !e), this._updateTooltip()), "label" === t && (this.isInput ? this.element.val(e) : (this.element.html(e), this.icon && (this._attachIcon(this.options.iconPosition), this._attachIconSpace(this.options.iconPosition)))), this._super(t, e), "disabled" === t && (this._toggleClass(null, "ui-state-disabled", e), this.element[0].disabled = e, e && this.element.blur())
        },
        refresh: function () {
            var t = this.element.is("input, button") ? this.element[0].disabled : this.element.hasClass("ui-button-disabled");
            t !== this.options.disabled && this._setOptions({disabled: t}), this._updateTooltip()
        }
    }), t.uiBackCompat !== !1 && (t.widget("ui.button", t.ui.button, {
        options: {
            text: !0,
            icons: {primary: null, secondary: null}
        }, _create: function () {
            this.options.showLabel && !this.options.text && (this.options.showLabel = this.options.text), !this.options.showLabel && this.options.text && (this.options.text = this.options.showLabel), this.options.icon || !this.options.icons.primary && !this.options.icons.secondary ? this.options.icon && (this.options.icons.primary = this.options.icon) : this.options.icons.primary ? this.options.icon = this.options.icons.primary : (this.options.icon = this.options.icons.secondary, this.options.iconPosition = "end"), this._super()
        }, _setOption: function (t, e) {
            return "text" === t ? (this._super("showLabel", e), void 0) : ("showLabel" === t && (this.options.text = e), "icon" === t && (this.options.icons.primary = e), "icons" === t && (e.primary ? (this._super("icon", e.primary), this._super("iconPosition", "beginning")) : e.secondary && (this._super("icon", e.secondary), this._super("iconPosition", "end"))), this._superApply(arguments), void 0)
        }
    }), t.fn.button = function (e) {
        return function () {
            return !this.length || this.length && "INPUT" !== this[0].tagName || this.length && "INPUT" === this[0].tagName && "checkbox" !== this.attr("type") && "radio" !== this.attr("type") ? e.apply(this, arguments) : (t.ui.checkboxradio || t.error("Checkboxradio widget missing"), 0 === arguments.length ? this.checkboxradio({icon: !1}) : this.checkboxradio.apply(this, arguments))
        }
    }(t.fn.button), t.fn.buttonset = function () {
        return t.ui.controlgroup || t.error("Controlgroup widget missing"), "option" === arguments[0] && "items" === arguments[1] && arguments[2] ? this.controlgroup.apply(this, [arguments[0], "items.button", arguments[2]]) : "option" === arguments[0] && "items" === arguments[1] ? this.controlgroup.apply(this, [arguments[0], "items.button"]) : ("object" == typeof arguments[0] && arguments[0].items && (arguments[0].items = {button: arguments[0].items}), this.controlgroup.apply(this, arguments))
    }), t.ui.button, t.extend(t.ui, {datepicker: {version: "1.12.1"}});
    var p;
    t.extend(s.prototype, {
        markerClassName: "hasDatepicker",
        maxRows: 4,
        _widgetDatepicker: function () {
            return this.dpDiv
        },
        setDefaults: function (t) {
            return a(this._defaults, t || {}), this
        },
        _attachDatepicker: function (e, i) {
            var s, n, o;
            s = e.nodeName.toLowerCase(), n = "div" === s || "span" === s, e.id || (this.uuid += 1, e.id = "dp" + this.uuid), o = this._newInst(t(e), n), o.settings = t.extend({}, i || {}), "input" === s ? this._connectDatepicker(e, o) : n && this._inlineDatepicker(e, o)
        },
        _newInst: function (e, i) {
            var s = e[0].id.replace(/([^A-Za-z0-9_\-])/g, "\\\\$1");
            return {
                id: s,
                input: e,
                selectedDay: 0,
                selectedMonth: 0,
                selectedYear: 0,
                drawMonth: 0,
                drawYear: 0,
                inline: i,
                dpDiv: i ? n(t("<div class='" + this._inlineClass + " ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")) : this.dpDiv
            }
        },
        _connectDatepicker: function (e, i) {
            var s = t(e);
            i.append = t([]), i.trigger = t([]), s.hasClass(this.markerClassName) || (this._attachments(s, i), s.addClass(this.markerClassName).on("keydown", this._doKeyDown).on("keypress", this._doKeyPress).on("keyup", this._doKeyUp), this._autoSize(i), t.data(e, "datepicker", i), i.settings.disabled && this._disableDatepicker(e))
        },
        _attachments: function (e, i) {
            var s, n, o, a = this._get(i, "appendText"), r = this._get(i, "isRTL");
            i.append && i.append.remove(), a && (i.append = t("<span class='" + this._appendClass + "'>" + a + "</span>"), e[r ? "before" : "after"](i.append)), e.off("focus", this._showDatepicker), i.trigger && i.trigger.remove(), s = this._get(i, "showOn"), ("focus" === s || "both" === s) && e.on("focus", this._showDatepicker), ("button" === s || "both" === s) && (n = this._get(i, "buttonText"), o = this._get(i, "buttonImage"), i.trigger = t(this._get(i, "buttonImageOnly") ? t("<img/>").addClass(this._triggerClass).attr({
                src: o,
                alt: n,
                title: n
            }) : t("<button type='button'></button>").addClass(this._triggerClass).html(o ? t("<img/>").attr({
                src: o,
                alt: n,
                title: n
            }) : n)), e[r ? "before" : "after"](i.trigger), i.trigger.on("click", function () {
                return t.datepicker._datepickerShowing && t.datepicker._lastInput === e[0] ? t.datepicker._hideDatepicker() : t.datepicker._datepickerShowing && t.datepicker._lastInput !== e[0] ? (t.datepicker._hideDatepicker(), t.datepicker._showDatepicker(e[0])) : t.datepicker._showDatepicker(e[0]), !1
            }))
        },
        _autoSize: function (t) {
            if (this._get(t, "autoSize") && !t.inline) {
                var e, i, s, n, o = new Date(2009, 11, 20), a = this._get(t, "dateFormat");
                a.match(/[DM]/) && (e = function (t) {
                    for (i = 0, s = 0, n = 0; t.length > n; n++) t[n].length > i && (i = t[n].length, s = n);
                    return s
                }, o.setMonth(e(this._get(t, a.match(/MM/) ? "monthNames" : "monthNamesShort"))), o.setDate(e(this._get(t, a.match(/DD/) ? "dayNames" : "dayNamesShort")) + 20 - o.getDay())), t.input.attr("size", this._formatDate(t, o).length)
            }
        },
        _inlineDatepicker: function (e, i) {
            var s = t(e);
            s.hasClass(this.markerClassName) || (s.addClass(this.markerClassName).append(i.dpDiv), t.data(e, "datepicker", i), this._setDate(i, this._getDefaultDate(i), !0), this._updateDatepicker(i), this._updateAlternate(i), i.settings.disabled && this._disableDatepicker(e), i.dpDiv.css("display", "block"))
        },
        _dialogDatepicker: function (e, i, s, n, o) {
            var r, l, h, c, u, d = this._dialogInst;
            return d || (this.uuid += 1, r = "dp" + this.uuid, this._dialogInput = t("<input type='text' id='" + r + "' style='position: absolute; top: -100px; width: 0px;'/>"), this._dialogInput.on("keydown", this._doKeyDown), t("body").append(this._dialogInput), d = this._dialogInst = this._newInst(this._dialogInput, !1), d.settings = {}, t.data(this._dialogInput[0], "datepicker", d)), a(d.settings, n || {}), i = i && i.constructor === Date ? this._formatDate(d, i) : i, this._dialogInput.val(i), this._pos = o ? o.length ? o : [o.pageX, o.pageY] : null, this._pos || (l = document.documentElement.clientWidth, h = document.documentElement.clientHeight, c = document.documentElement.scrollLeft || document.body.scrollLeft, u = document.documentElement.scrollTop || document.body.scrollTop, this._pos = [l / 2 - 100 + c, h / 2 - 150 + u]), this._dialogInput.css("left", this._pos[0] + 20 + "px").css("top", this._pos[1] + "px"), d.settings.onSelect = s, this._inDialog = !0, this.dpDiv.addClass(this._dialogClass), this._showDatepicker(this._dialogInput[0]), t.blockUI && t.blockUI(this.dpDiv), t.data(this._dialogInput[0], "datepicker", d), this
        },
        _destroyDatepicker: function (e) {
            var i, s = t(e), n = t.data(e, "datepicker");
            s.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), t.removeData(e, "datepicker"), "input" === i ? (n.append.remove(), n.trigger.remove(), s.removeClass(this.markerClassName).off("focus", this._showDatepicker).off("keydown", this._doKeyDown).off("keypress", this._doKeyPress).off("keyup", this._doKeyUp)) : ("div" === i || "span" === i) && s.removeClass(this.markerClassName).empty(), p === n && (p = null))
        },
        _enableDatepicker: function (e) {
            var i, s, n = t(e), o = t.data(e, "datepicker");
            n.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), "input" === i ? (e.disabled = !1, o.trigger.filter("button").each(function () {
                this.disabled = !1
            }).end().filter("img").css({
                opacity: "1.0",
                cursor: ""
            })) : ("div" === i || "span" === i) && (s = n.children("." + this._inlineClass), s.children().removeClass("ui-state-disabled"), s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !1)), this._disabledInputs = t.map(this._disabledInputs, function (t) {
                return t === e ? null : t
            }))
        },
        _disableDatepicker: function (e) {
            var i, s, n = t(e), o = t.data(e, "datepicker");
            n.hasClass(this.markerClassName) && (i = e.nodeName.toLowerCase(), "input" === i ? (e.disabled = !0, o.trigger.filter("button").each(function () {
                this.disabled = !0
            }).end().filter("img").css({
                opacity: "0.5",
                cursor: "default"
            })) : ("div" === i || "span" === i) && (s = n.children("." + this._inlineClass), s.children().addClass("ui-state-disabled"), s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled", !0)), this._disabledInputs = t.map(this._disabledInputs, function (t) {
                return t === e ? null : t
            }), this._disabledInputs[this._disabledInputs.length] = e)
        },
        _isDisabledDatepicker: function (t) {
            if (!t) return !1;
            for (var e = 0; this._disabledInputs.length > e; e++) if (this._disabledInputs[e] === t) return !0;
            return !1
        },
        _getInst: function (e) {
            try {
                return t.data(e, "datepicker")
            } catch (i) {
                throw"Missing instance data for this datepicker"
            }
        },
        _optionDatepicker: function (e, i, s) {
            var n, o, r, l, h = this._getInst(e);
            return 2 === arguments.length && "string" == typeof i ? "defaults" === i ? t.extend({}, t.datepicker._defaults) : h ? "all" === i ? t.extend({}, h.settings) : this._get(h, i) : null : (n = i || {}, "string" == typeof i && (n = {}, n[i] = s), h && (this._curInst === h && this._hideDatepicker(), o = this._getDateDatepicker(e, !0), r = this._getMinMaxDate(h, "min"), l = this._getMinMaxDate(h, "max"), a(h.settings, n), null !== r && void 0 !== n.dateFormat && void 0 === n.minDate && (h.settings.minDate = this._formatDate(h, r)), null !== l && void 0 !== n.dateFormat && void 0 === n.maxDate && (h.settings.maxDate = this._formatDate(h, l)), "disabled" in n && (n.disabled ? this._disableDatepicker(e) : this._enableDatepicker(e)), this._attachments(t(e), h), this._autoSize(h), this._setDate(h, o), this._updateAlternate(h), this._updateDatepicker(h)), void 0)
        },
        _changeDatepicker: function (t, e, i) {
            this._optionDatepicker(t, e, i)
        },
        _refreshDatepicker: function (t) {
            var e = this._getInst(t);
            e && this._updateDatepicker(e)
        },
        _setDateDatepicker: function (t, e) {
            var i = this._getInst(t);
            i && (this._setDate(i, e), this._updateDatepicker(i), this._updateAlternate(i))
        },
        _getDateDatepicker: function (t, e) {
            var i = this._getInst(t);
            return i && !i.inline && this._setDateFromField(i, e), i ? this._getDate(i) : null
        },
        _doKeyDown: function (e) {
            var i, s, n, o = t.datepicker._getInst(e.target), a = !0, r = o.dpDiv.is(".ui-datepicker-rtl");
            if (o._keyEvent = !0, t.datepicker._datepickerShowing) switch (e.keyCode) {
                case 9:
                    t.datepicker._hideDatepicker(), a = !1;
                    break;
                case 13:
                    return n = t("td." + t.datepicker._dayOverClass + ":not(." + t.datepicker._currentClass + ")", o.dpDiv), n[0] && t.datepicker._selectDay(e.target, o.selectedMonth, o.selectedYear, n[0]), i = t.datepicker._get(o, "onSelect"), i ? (s = t.datepicker._formatDate(o), i.apply(o.input ? o.input[0] : null, [s, o])) : t.datepicker._hideDatepicker(), !1;
                case 27:
                    t.datepicker._hideDatepicker();
                    break;
                case 33:
                    t.datepicker._adjustDate(e.target, e.ctrlKey ? -t.datepicker._get(o, "stepBigMonths") : -t.datepicker._get(o, "stepMonths"), "M");
                    break;
                case 34:
                    t.datepicker._adjustDate(e.target, e.ctrlKey ? +t.datepicker._get(o, "stepBigMonths") : +t.datepicker._get(o, "stepMonths"), "M");
                    break;
                case 35:
                    (e.ctrlKey || e.metaKey) && t.datepicker._clearDate(e.target), a = e.ctrlKey || e.metaKey;
                    break;
                case 36:
                    (e.ctrlKey || e.metaKey) && t.datepicker._gotoToday(e.target), a = e.ctrlKey || e.metaKey;
                    break;
                case 37:
                    (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, r ? 1 : -1, "D"), a = e.ctrlKey || e.metaKey, e.originalEvent.altKey && t.datepicker._adjustDate(e.target, e.ctrlKey ? -t.datepicker._get(o, "stepBigMonths") : -t.datepicker._get(o, "stepMonths"), "M");
                    break;
                case 38:
                    (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, -7, "D"), a = e.ctrlKey || e.metaKey;
                    break;
                case 39:
                    (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, r ? -1 : 1, "D"), a = e.ctrlKey || e.metaKey, e.originalEvent.altKey && t.datepicker._adjustDate(e.target, e.ctrlKey ? +t.datepicker._get(o, "stepBigMonths") : +t.datepicker._get(o, "stepMonths"), "M");
                    break;
                case 40:
                    (e.ctrlKey || e.metaKey) && t.datepicker._adjustDate(e.target, 7, "D"), a = e.ctrlKey || e.metaKey;
                    break;
                default:
                    a = !1
            } else 36 === e.keyCode && e.ctrlKey ? t.datepicker._showDatepicker(this) : a = !1;
            a && (e.preventDefault(), e.stopPropagation())
        },
        _doKeyPress: function (e) {
            var i, s, n = t.datepicker._getInst(e.target);
            return t.datepicker._get(n, "constrainInput") ? (i = t.datepicker._possibleChars(t.datepicker._get(n, "dateFormat")), s = String.fromCharCode(null == e.charCode ? e.keyCode : e.charCode), e.ctrlKey || e.metaKey || " " > s || !i || i.indexOf(s) > -1) : void 0
        },
        _doKeyUp: function (e) {
            var i, s = t.datepicker._getInst(e.target);
            if (s.input.val() !== s.lastVal) try {
                i = t.datepicker.parseDate(t.datepicker._get(s, "dateFormat"), s.input ? s.input.val() : null, t.datepicker._getFormatConfig(s)), i && (t.datepicker._setDateFromField(s), t.datepicker._updateAlternate(s), t.datepicker._updateDatepicker(s))
            } catch (n) {
            }
            return !0
        },
        _showDatepicker: function (e) {
            if (e = e.target || e, "input" !== e.nodeName.toLowerCase() && (e = t("input", e.parentNode)[0]), !t.datepicker._isDisabledDatepicker(e) && t.datepicker._lastInput !== e) {
                var s, n, o, r, l, h, c;
                s = t.datepicker._getInst(e), t.datepicker._curInst && t.datepicker._curInst !== s && (t.datepicker._curInst.dpDiv.stop(!0, !0), s && t.datepicker._datepickerShowing && t.datepicker._hideDatepicker(t.datepicker._curInst.input[0])), n = t.datepicker._get(s, "beforeShow"), o = n ? n.apply(e, [e, s]) : {}, o !== !1 && (a(s.settings, o), s.lastVal = null, t.datepicker._lastInput = e, t.datepicker._setDateFromField(s), t.datepicker._inDialog && (e.value = ""), t.datepicker._pos || (t.datepicker._pos = t.datepicker._findPos(e), t.datepicker._pos[1] += e.offsetHeight), r = !1, t(e).parents().each(function () {
                    return r |= "fixed" === t(this).css("position"), !r
                }), l = {
                    left: t.datepicker._pos[0],
                    top: t.datepicker._pos[1]
                }, t.datepicker._pos = null, s.dpDiv.empty(), s.dpDiv.css({
                    position: "absolute",
                    display: "block",
                    top: "-1000px"
                }), t.datepicker._updateDatepicker(s), l = t.datepicker._checkOffset(s, l, r), s.dpDiv.css({
                    position: t.datepicker._inDialog && t.blockUI ? "static" : r ? "fixed" : "absolute",
                    display: "none",
                    left: l.left + "px",
                    top: l.top + "px"
                }), s.inline || (h = t.datepicker._get(s, "showAnim"), c = t.datepicker._get(s, "duration"), s.dpDiv.css("z-index", i(t(e)) + 1), t.datepicker._datepickerShowing = !0, t.effects && t.effects.effect[h] ? s.dpDiv.show(h, t.datepicker._get(s, "showOptions"), c) : s.dpDiv[h || "show"](h ? c : null), t.datepicker._shouldFocusInput(s) && s.input.trigger("focus"), t.datepicker._curInst = s))
            }
        },
        _updateDatepicker: function (e) {
            this.maxRows = 4, p = e, e.dpDiv.empty().append(this._generateHTML(e)), this._attachHandlers(e);
            var i, s = this._getNumberOfMonths(e), n = s[1], a = 17,
                r = e.dpDiv.find("." + this._dayOverClass + " a");
            r.length > 0 && o.apply(r.get(0)), e.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""), n > 1 && e.dpDiv.addClass("ui-datepicker-multi-" + n).css("width", a * n + "em"), e.dpDiv[(1 !== s[0] || 1 !== s[1] ? "add" : "remove") + "Class"]("ui-datepicker-multi"), e.dpDiv[(this._get(e, "isRTL") ? "add" : "remove") + "Class"]("ui-datepicker-rtl"), e === t.datepicker._curInst && t.datepicker._datepickerShowing && t.datepicker._shouldFocusInput(e) && e.input.trigger("focus"), e.yearshtml && (i = e.yearshtml, setTimeout(function () {
                i === e.yearshtml && e.yearshtml && e.dpDiv.find("select.ui-datepicker-year:first").replaceWith(e.yearshtml), i = e.yearshtml = null
            }, 0))
        },
        _shouldFocusInput: function (t) {
            return t.input && t.input.is(":visible") && !t.input.is(":disabled") && !t.input.is(":focus")
        },
        _checkOffset: function (e, i, s) {
            var n = e.dpDiv.outerWidth(), o = e.dpDiv.outerHeight(), a = e.input ? e.input.outerWidth() : 0,
                r = e.input ? e.input.outerHeight() : 0,
                l = document.documentElement.clientWidth + (s ? 0 : t(document).scrollLeft()),
                h = document.documentElement.clientHeight + (s ? 0 : t(document).scrollTop());
            return i.left -= this._get(e, "isRTL") ? n - a : 0, i.left -= s && i.left === e.input.offset().left ? t(document).scrollLeft() : 0, i.top -= s && i.top === e.input.offset().top + r ? t(document).scrollTop() : 0, i.left -= Math.min(i.left, i.left + n > l && l > n ? Math.abs(i.left + n - l) : 0), i.top -= Math.min(i.top, i.top + o > h && h > o ? Math.abs(o + r) : 0), i
        },
        _findPos: function (e) {
            for (var i, s = this._getInst(e), n = this._get(s, "isRTL"); e && ("hidden" === e.type || 1 !== e.nodeType || t.expr.filters.hidden(e));) e = e[n ? "previousSibling" : "nextSibling"];
            return i = t(e).offset(), [i.left, i.top]
        },
        _hideDatepicker: function (e) {
            var i, s, n, o, a = this._curInst;
            !a || e && a !== t.data(e, "datepicker") || this._datepickerShowing && (i = this._get(a, "showAnim"), s = this._get(a, "duration"), n = function () {
                t.datepicker._tidyDialog(a)
            }, t.effects && (t.effects.effect[i] || t.effects[i]) ? a.dpDiv.hide(i, t.datepicker._get(a, "showOptions"), s, n) : a.dpDiv["slideDown" === i ? "slideUp" : "fadeIn" === i ? "fadeOut" : "hide"](i ? s : null, n), i || n(), this._datepickerShowing = !1, o = this._get(a, "onClose"), o && o.apply(a.input ? a.input[0] : null, [a.input ? a.input.val() : "", a]), this._lastInput = null, this._inDialog && (this._dialogInput.css({
                position: "absolute",
                left: "0",
                top: "-100px"
            }), t.blockUI && (t.unblockUI(), t("body").append(this.dpDiv))), this._inDialog = !1)
        },
        _tidyDialog: function (t) {
            t.dpDiv.removeClass(this._dialogClass).off(".ui-datepicker-calendar")
        },
        _checkExternalClick: function (e) {
            if (t.datepicker._curInst) {
                var i = t(e.target), s = t.datepicker._getInst(i[0]);
                (i[0].id !== t.datepicker._mainDivId && 0 === i.parents("#" + t.datepicker._mainDivId).length && !i.hasClass(t.datepicker.markerClassName) && !i.closest("." + t.datepicker._triggerClass).length && t.datepicker._datepickerShowing && (!t.datepicker._inDialog || !t.blockUI) || i.hasClass(t.datepicker.markerClassName) && t.datepicker._curInst !== s) && t.datepicker._hideDatepicker()
            }
        },
        _adjustDate: function (e, i, s) {
            var n = t(e), o = this._getInst(n[0]);
            this._isDisabledDatepicker(n[0]) || (this._adjustInstDate(o, i + ("M" === s ? this._get(o, "showCurrentAtPos") : 0), s), this._updateDatepicker(o))
        },
        _gotoToday: function (e) {
            var i, s = t(e), n = this._getInst(s[0]);
            this._get(n, "gotoCurrent") && n.currentDay ? (n.selectedDay = n.currentDay, n.drawMonth = n.selectedMonth = n.currentMonth, n.drawYear = n.selectedYear = n.currentYear) : (i = new Date, n.selectedDay = i.getDate(), n.drawMonth = n.selectedMonth = i.getMonth(), n.drawYear = n.selectedYear = i.getFullYear()), this._notifyChange(n), this._adjustDate(s)
        },
        _selectMonthYear: function (e, i, s) {
            var n = t(e), o = this._getInst(n[0]);
            o["selected" + ("M" === s ? "Month" : "Year")] = o["draw" + ("M" === s ? "Month" : "Year")] = parseInt(i.options[i.selectedIndex].value, 10), this._notifyChange(o), this._adjustDate(n)
        },
        _selectDay: function (e, i, s, n) {
            var o, a = t(e);
            t(n).hasClass(this._unselectableClass) || this._isDisabledDatepicker(a[0]) || (o = this._getInst(a[0]), o.selectedDay = o.currentDay = t("a", n).html(), o.selectedMonth = o.currentMonth = i, o.selectedYear = o.currentYear = s, this._selectDate(e, this._formatDate(o, o.currentDay, o.currentMonth, o.currentYear)))
        },
        _clearDate: function (e) {
            var i = t(e);
            this._selectDate(i, "")
        },
        _selectDate: function (e, i) {
            var s, n = t(e), o = this._getInst(n[0]);
            i = null != i ? i : this._formatDate(o), o.input && o.input.val(i), this._updateAlternate(o), s = this._get(o, "onSelect"), s ? s.apply(o.input ? o.input[0] : null, [i, o]) : o.input && o.input.trigger("change"), o.inline ? this._updateDatepicker(o) : (this._hideDatepicker(), this._lastInput = o.input[0], "object" != typeof o.input[0] && o.input.trigger("focus"), this._lastInput = null)
        },
        _updateAlternate: function (e) {
            var i, s, n, o = this._get(e, "altField");
            o && (i = this._get(e, "altFormat") || this._get(e, "dateFormat"), s = this._getDate(e), n = this.formatDate(i, s, this._getFormatConfig(e)), t(o).val(n))
        },
        noWeekends: function (t) {
            var e = t.getDay();
            return [e > 0 && 6 > e, ""]
        },
        iso8601Week: function (t) {
            var e, i = new Date(t.getTime());
            return i.setDate(i.getDate() + 4 - (i.getDay() || 7)), e = i.getTime(), i.setMonth(0), i.setDate(1), Math.floor(Math.round((e - i) / 864e5) / 7) + 1
        },
        parseDate: function (e, i, s) {
            if (null == e || null == i) throw"Invalid arguments";
            if (i = "object" == typeof i ? "" + i : i + "", "" === i) return null;
            var n, o, a, r, l = 0, h = (s ? s.shortYearCutoff : null) || this._defaults.shortYearCutoff,
                c = "string" != typeof h ? h : (new Date).getFullYear() % 100 + parseInt(h, 10),
                u = (s ? s.dayNamesShort : null) || this._defaults.dayNamesShort,
                d = (s ? s.dayNames : null) || this._defaults.dayNames,
                p = (s ? s.monthNamesShort : null) || this._defaults.monthNamesShort,
                f = (s ? s.monthNames : null) || this._defaults.monthNames, g = -1, m = -1, _ = -1, v = -1,
                b = !1, y = function (t) {
                    var i = e.length > n + 1 && e.charAt(n + 1) === t;
                    return i && n++, i
                }, w = function (t) {
                    var e = y(t), s = "@" === t ? 14 : "!" === t ? 20 : "y" === t && e ? 4 : "o" === t ? 3 : 2,
                        n = "y" === t ? s : 1, o = RegExp("^\\d{" + n + "," + s + "}"), a = i.substring(l).match(o);
                    if (!a) throw"Missing number at position " + l;
                    return l += a[0].length, parseInt(a[0], 10)
                }, k = function (e, s, n) {
                    var o = -1, a = t.map(y(e) ? n : s, function (t, e) {
                        return [[e, t]]
                    }).sort(function (t, e) {
                        return -(t[1].length - e[1].length)
                    });
                    if (t.each(a, function (t, e) {
                        var s = e[1];
                        return i.substr(l, s.length).toLowerCase() === s.toLowerCase() ? (o = e[0], l += s.length, !1) : void 0
                    }), -1 !== o) return o + 1;
                    throw"Unknown name at position " + l
                }, x = function () {
                    if (i.charAt(l) !== e.charAt(n)) throw"Unexpected literal at position " + l;
                    l++
                };
            for (n = 0; e.length > n; n++) if (b) "'" !== e.charAt(n) || y("'") ? x() : b = !1; else switch (e.charAt(n)) {
                case"d":
                    _ = w("d");
                    break;
                case"D":
                    k("D", u, d);
                    break;
                case"o":
                    v = w("o");
                    break;
                case"m":
                    m = w("m");
                    break;
                case"M":
                    m = k("M", p, f);
                    break;
                case"y":
                    g = w("y");
                    break;
                case"@":
                    r = new Date(w("@")), g = r.getFullYear(), m = r.getMonth() + 1, _ = r.getDate();
                    break;
                case"!":
                    r = new Date((w("!") - this._ticksTo1970) / 1e4), g = r.getFullYear(), m = r.getMonth() + 1, _ = r.getDate();
                    break;
                case"'":
                    y("'") ? x() : b = !0;
                    break;
                default:
                    x()
            }
            if (i.length > l && (a = i.substr(l), !/^\s+/.test(a))) throw"Extra/unparsed characters found in date: " + a;
            if (-1 === g ? g = (new Date).getFullYear() : 100 > g && (g += (new Date).getFullYear() - (new Date).getFullYear() % 100 + (c >= g ? 0 : -100)), v > -1) for (m = 1, _ = v; ;) {
                if (o = this._getDaysInMonth(g, m - 1), o >= _) break;
                m++, _ -= o
            }
            if (r = this._daylightSavingAdjust(new Date(g, m - 1, _)), r.getFullYear() !== g || r.getMonth() + 1 !== m || r.getDate() !== _) throw"Invalid date";
            return r
        },
        ATOM: "yy-mm-dd",
        COOKIE: "D, dd M yy",
        ISO_8601: "yy-mm-dd",
        RFC_822: "D, d M y",
        RFC_850: "DD, dd-M-y",
        RFC_1036: "D, d M y",
        RFC_1123: "D, d M yy",
        RFC_2822: "D, d M yy",
        RSS: "D, d M y",
        TICKS: "!",
        TIMESTAMP: "@",
        W3C: "yy-mm-dd",
        _ticksTo1970: 1e7 * 60 * 60 * 24 * (718685 + Math.floor(492.5) - Math.floor(19.7) + Math.floor(4.925)),
        formatDate: function (t, e, i) {
            if (!e) return "";
            var s, n = (i ? i.dayNamesShort : null) || this._defaults.dayNamesShort,
                o = (i ? i.dayNames : null) || this._defaults.dayNames,
                a = (i ? i.monthNamesShort : null) || this._defaults.monthNamesShort,
                r = (i ? i.monthNames : null) || this._defaults.monthNames, l = function (e) {
                    var i = t.length > s + 1 && t.charAt(s + 1) === e;
                    return i && s++, i
                }, h = function (t, e, i) {
                    var s = "" + e;
                    if (l(t)) for (; i > s.length;) s = "0" + s;
                    return s
                }, c = function (t, e, i, s) {
                    return l(t) ? s[e] : i[e]
                }, u = "", d = !1;
            if (e) for (s = 0; t.length > s; s++) if (d) "'" !== t.charAt(s) || l("'") ? u += t.charAt(s) : d = !1; else switch (t.charAt(s)) {
                case"d":
                    u += h("d", e.getDate(), 2);
                    break;
                case"D":
                    u += c("D", e.getDay(), n, o);
                    break;
                case"o":
                    u += h("o", Math.round((new Date(e.getFullYear(), e.getMonth(), e.getDate()).getTime() - new Date(e.getFullYear(), 0, 0).getTime()) / 864e5), 3);
                    break;
                case"m":
                    u += h("m", e.getMonth() + 1, 2);
                    break;
                case"M":
                    u += c("M", e.getMonth(), a, r);
                    break;
                case"y":
                    u += l("y") ? e.getFullYear() : (10 > e.getFullYear() % 100 ? "0" : "") + e.getFullYear() % 100;
                    break;
                case"@":
                    u += e.getTime();
                    break;
                case"!":
                    u += 1e4 * e.getTime() + this._ticksTo1970;
                    break;
                case"'":
                    l("'") ? u += "'" : d = !0;
                    break;
                default:
                    u += t.charAt(s)
            }
            return u
        },
        _possibleChars: function (t) {
            var e, i = "", s = !1, n = function (i) {
                var s = t.length > e + 1 && t.charAt(e + 1) === i;
                return s && e++, s
            };
            for (e = 0; t.length > e; e++) if (s) "'" !== t.charAt(e) || n("'") ? i += t.charAt(e) : s = !1; else switch (t.charAt(e)) {
                case"d":
                case"m":
                case"y":
                case"@":
                    i += "0123456789";
                    break;
                case"D":
                case"M":
                    return null;
                case"'":
                    n("'") ? i += "'" : s = !0;
                    break;
                default:
                    i += t.charAt(e)
            }
            return i
        },
        _get: function (t, e) {
            return void 0 !== t.settings[e] ? t.settings[e] : this._defaults[e]
        },
        _setDateFromField: function (t, e) {
            if (t.input.val() !== t.lastVal) {
                var i = this._get(t, "dateFormat"), s = t.lastVal = t.input ? t.input.val() : null,
                    n = this._getDefaultDate(t), o = n, a = this._getFormatConfig(t);
                try {
                    o = this.parseDate(i, s, a) || n
                } catch (r) {
                    s = e ? "" : s
                }
                t.selectedDay = o.getDate(), t.drawMonth = t.selectedMonth = o.getMonth(), t.drawYear = t.selectedYear = o.getFullYear(), t.currentDay = s ? o.getDate() : 0, t.currentMonth = s ? o.getMonth() : 0, t.currentYear = s ? o.getFullYear() : 0, this._adjustInstDate(t)
            }
        },
        _getDefaultDate: function (t) {
            return this._restrictMinMax(t, this._determineDate(t, this._get(t, "defaultDate"), new Date))
        },
        _determineDate: function (e, i, s) {
            var n = function (t) {
                    var e = new Date;
                    return e.setDate(e.getDate() + t), e
                }, o = function (i) {
                    try {
                        return t.datepicker.parseDate(t.datepicker._get(e, "dateFormat"), i, t.datepicker._getFormatConfig(e))
                    } catch (s) {
                    }
                    for (var n = (i.toLowerCase().match(/^c/) ? t.datepicker._getDate(e) : null) || new Date, o = n.getFullYear(), a = n.getMonth(), r = n.getDate(), l = /([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g, h = l.exec(i); h;) {
                        switch (h[2] || "d") {
                            case"d":
                            case"D":
                                r += parseInt(h[1], 10);
                                break;
                            case"w":
                            case"W":
                                r += 7 * parseInt(h[1], 10);
                                break;
                            case"m":
                            case"M":
                                a += parseInt(h[1], 10), r = Math.min(r, t.datepicker._getDaysInMonth(o, a));
                                break;
                            case"y":
                            case"Y":
                                o += parseInt(h[1], 10), r = Math.min(r, t.datepicker._getDaysInMonth(o, a))
                        }
                        h = l.exec(i)
                    }
                    return new Date(o, a, r)
                },
                a = null == i || "" === i ? s : "string" == typeof i ? o(i) : "number" == typeof i ? isNaN(i) ? s : n(i) : new Date(i.getTime());
            return a = a && "Invalid Date" == "" + a ? s : a, a && (a.setHours(0), a.setMinutes(0), a.setSeconds(0), a.setMilliseconds(0)), this._daylightSavingAdjust(a)
        },
        _daylightSavingAdjust: function (t) {
            return t ? (t.setHours(t.getHours() > 12 ? t.getHours() + 2 : 0), t) : null
        },
        _setDate: function (t, e, i) {
            var s = !e, n = t.selectedMonth, o = t.selectedYear,
                a = this._restrictMinMax(t, this._determineDate(t, e, new Date));
            t.selectedDay = t.currentDay = a.getDate(), t.drawMonth = t.selectedMonth = t.currentMonth = a.getMonth(), t.drawYear = t.selectedYear = t.currentYear = a.getFullYear(), n === t.selectedMonth && o === t.selectedYear || i || this._notifyChange(t), this._adjustInstDate(t), t.input && t.input.val(s ? "" : this._formatDate(t))
        },
        _getDate: function (t) {
            var e = !t.currentYear || t.input && "" === t.input.val() ? null : this._daylightSavingAdjust(new Date(t.currentYear, t.currentMonth, t.currentDay));
            return e
        },
        _attachHandlers: function (e) {
            var i = this._get(e, "stepMonths"), s = "#" + e.id.replace(/\\\\/g, "\\");
            e.dpDiv.find("[data-handler]").map(function () {
                var e = {
                    prev: function () {
                        t.datepicker._adjustDate(s, -i, "M")
                    }, next: function () {
                        t.datepicker._adjustDate(s, +i, "M")
                    }, hide: function () {
                        t.datepicker._hideDatepicker()
                    }, today: function () {
                        t.datepicker._gotoToday(s)
                    }, selectDay: function () {
                        return t.datepicker._selectDay(s, +this.getAttribute("data-month"), +this.getAttribute("data-year"), this), !1
                    }, selectMonth: function () {
                        return t.datepicker._selectMonthYear(s, this, "M"), !1
                    }, selectYear: function () {
                        return t.datepicker._selectMonthYear(s, this, "Y"), !1
                    }
                };
                t(this).on(this.getAttribute("data-event"), e[this.getAttribute("data-handler")])
            })
        },
        _generateHTML: function (t) {
            var e, i, s, n, o, a, r, l, h, c, u, d, p, f, g, m, _, v, b, y, w, k, x, C, D, I, P, T, M, S, H, z,
                O, A, N, E, W, F, L, R = new Date,
                B = this._daylightSavingAdjust(new Date(R.getFullYear(), R.getMonth(), R.getDate())),
                Y = this._get(t, "isRTL"), j = this._get(t, "showButtonPanel"),
                q = this._get(t, "hideIfNoPrevNext"), K = this._get(t, "navigationAsDateFormat"),
                U = this._getNumberOfMonths(t), V = this._get(t, "showCurrentAtPos"),
                X = this._get(t, "stepMonths"), $ = 1 !== U[0] || 1 !== U[1],
                G = this._daylightSavingAdjust(t.currentDay ? new Date(t.currentYear, t.currentMonth, t.currentDay) : new Date(9999, 9, 9)),
                Q = this._getMinMaxDate(t, "min"), J = this._getMinMaxDate(t, "max"), Z = t.drawMonth - V,
                te = t.drawYear;
            if (0 > Z && (Z += 12, te--), J) for (e = this._daylightSavingAdjust(new Date(J.getFullYear(), J.getMonth() - U[0] * U[1] + 1, J.getDate())), e = Q && Q > e ? Q : e; this._daylightSavingAdjust(new Date(te, Z, 1)) > e;) Z--, 0 > Z && (Z = 11, te--);
            for (t.drawMonth = Z, t.drawYear = te, i = this._get(t, "prevText"), i = K ? this.formatDate(i, this._daylightSavingAdjust(new Date(te, Z - X, 1)), this._getFormatConfig(t)) : i, s = this._canAdjustMonth(t, -1, te, Z) ? "<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>" : q ? "" : "<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='" + i + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "e" : "w") + "'>" + i + "</span></a>", n = this._get(t, "nextText"), n = K ? this.formatDate(n, this._daylightSavingAdjust(new Date(te, Z + X, 1)), this._getFormatConfig(t)) : n, o = this._canAdjustMonth(t, 1, te, Z) ? "<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='" + n + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + n + "</span></a>" : q ? "" : "<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='" + n + "'><span class='ui-icon ui-icon-circle-triangle-" + (Y ? "w" : "e") + "'>" + n + "</span></a>", a = this._get(t, "currentText"), r = this._get(t, "gotoCurrent") && t.currentDay ? G : B, a = K ? this.formatDate(a, r, this._getFormatConfig(t)) : a, l = t.inline ? "" : "<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>" + this._get(t, "closeText") + "</button>", h = j ? "<div class='ui-datepicker-buttonpane ui-widget-content'>" + (Y ? l : "") + (this._isInRange(t, r) ? "<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>" + a + "</button>" : "") + (Y ? "" : l) + "</div>" : "", c = parseInt(this._get(t, "firstDay"), 10), c = isNaN(c) ? 0 : c, u = this._get(t, "showWeek"), d = this._get(t, "dayNames"), p = this._get(t, "dayNamesMin"), f = this._get(t, "monthNames"), g = this._get(t, "monthNamesShort"), m = this._get(t, "beforeShowDay"), _ = this._get(t, "showOtherMonths"), v = this._get(t, "selectOtherMonths"), b = this._getDefaultDate(t), y = "", k = 0; U[0] > k; k++) {
                for (x = "", this.maxRows = 4, C = 0; U[1] > C; C++) {
                    if (D = this._daylightSavingAdjust(new Date(te, Z, t.selectedDay)), I = " ui-corner-all", P = "", $) {
                        if (P += "<div class='ui-datepicker-group", U[1] > 1) switch (C) {
                            case 0:
                                P += " ui-datepicker-group-first", I = " ui-corner-" + (Y ? "right" : "left");
                                break;
                            case U[1] - 1:
                                P += " ui-datepicker-group-last", I = " ui-corner-" + (Y ? "left" : "right");
                                break;
                            default:
                                P += " ui-datepicker-group-middle", I = ""
                        }
                        P += "'>"
                    }
                    for (P += "<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix" + I + "'>" + (/all|left/.test(I) && 0 === k ? Y ? o : s : "") + (/all|right/.test(I) && 0 === k ? Y ? s : o : "") + this._generateMonthYearHeader(t, Z, te, Q, J, k > 0 || C > 0, f, g) + "</div><table class='ui-datepicker-calendar'><thead>" + "<tr>", T = u ? "<th class='ui-datepicker-week-col'>" + this._get(t, "weekHeader") + "</th>" : "", w = 0; 7 > w; w++) M = (w + c) % 7, T += "<th scope='col'" + ((w + c + 6) % 7 >= 5 ? " class='ui-datepicker-week-end'" : "") + ">" + "<span title='" + d[M] + "'>" + p[M] + "</span></th>";
                    for (P += T + "</tr></thead><tbody>", S = this._getDaysInMonth(te, Z), te === t.selectedYear && Z === t.selectedMonth && (t.selectedDay = Math.min(t.selectedDay, S)), H = (this._getFirstDayOfMonth(te, Z) - c + 7) % 7, z = Math.ceil((H + S) / 7), O = $ ? this.maxRows > z ? this.maxRows : z : z, this.maxRows = O, A = this._daylightSavingAdjust(new Date(te, Z, 1 - H)), N = 0; O > N; N++) {
                        for (P += "<tr>", E = u ? "<td class='ui-datepicker-week-col'>" + this._get(t, "calculateWeek")(A) + "</td>" : "", w = 0; 7 > w; w++) W = m ? m.apply(t.input ? t.input[0] : null, [A]) : [!0, ""], F = A.getMonth() !== Z, L = F && !v || !W[0] || Q && Q > A || J && A > J, E += "<td class='" + ((w + c + 6) % 7 >= 5 ? " ui-datepicker-week-end" : "") + (F ? " ui-datepicker-other-month" : "") + (A.getTime() === D.getTime() && Z === t.selectedMonth && t._keyEvent || b.getTime() === A.getTime() && b.getTime() === D.getTime() ? " " + this._dayOverClass : "") + (L ? " " + this._unselectableClass + " ui-state-disabled" : "") + (F && !_ ? "" : " " + W[1] + (A.getTime() === G.getTime() ? " " + this._currentClass : "") + (A.getTime() === B.getTime() ? " ui-datepicker-today" : "")) + "'" + (F && !_ || !W[2] ? "" : " title='" + W[2].replace(/'/g, "&#39;") + "'") + (L ? "" : " data-handler='selectDay' data-event='click' data-month='" + A.getMonth() + "' data-year='" + A.getFullYear() + "'") + ">" + (F && !_ ? "&#xa0;" : L ? "<span class='ui-state-default'>" + A.getDate() + "</span>" : "<a class='ui-state-default" + (A.getTime() === B.getTime() ? " ui-state-highlight" : "") + (A.getTime() === G.getTime() ? " ui-state-active" : "") + (F ? " ui-priority-secondary" : "") + "' href='#'>" + A.getDate() + "</a>") + "</td>", A.setDate(A.getDate() + 1), A = this._daylightSavingAdjust(A);
                        P += E + "</tr>"
                    }
                    Z++, Z > 11 && (Z = 0, te++), P += "</tbody></table>" + ($ ? "</div>" + (U[0] > 0 && C === U[1] - 1 ? "<div class='ui-datepicker-row-break'></div>" : "") : ""), x += P
                }
                y += x
            }
            return y += h, t._keyEvent = !1, y
        },
        _generateMonthYearHeader: function (t, e, i, s, n, o, a, r) {
            var l, h, c, u, d, p, f, g, m = this._get(t, "changeMonth"), _ = this._get(t, "changeYear"),
                v = this._get(t, "showMonthAfterYear"), b = "<div class='ui-datepicker-title'>", y = "";
            if (o || !m) y += "<span class='ui-datepicker-month'>" + a[e] + "</span>"; else {
                for (l = s && s.getFullYear() === i, h = n && n.getFullYear() === i, y += "<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>", c = 0; 12 > c; c++) (!l || c >= s.getMonth()) && (!h || n.getMonth() >= c) && (y += "<option value='" + c + "'" + (c === e ? " selected='selected'" : "") + ">" + r[c] + "</option>");
                y += "</select>"
            }
            if (v || (b += y + (!o && m && _ ? "" : "&#xa0;")), !t.yearshtml) if (t.yearshtml = "", o || !_) b += "<span class='ui-datepicker-year'>" + i + "</span>"; else {
                for (u = this._get(t, "yearRange").split(":"), d = (new Date).getFullYear(), p = function (t) {
                    var e = t.match(/c[+\-].*/) ? i + parseInt(t.substring(1), 10) : t.match(/[+\-].*/) ? d + parseInt(t, 10) : parseInt(t, 10);
                    return isNaN(e) ? d : e
                }, f = p(u[0]), g = Math.max(f, p(u[1] || "")), f = s ? Math.max(f, s.getFullYear()) : f, g = n ? Math.min(g, n.getFullYear()) : g, t.yearshtml += "<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>"; g >= f; f++) t.yearshtml += "<option value='" + f + "'" + (f === i ? " selected='selected'" : "") + ">" + f + "</option>";
                t.yearshtml += "</select>", b += t.yearshtml, t.yearshtml = null
            }
            return b += this._get(t, "yearSuffix"), v && (b += (!o && m && _ ? "" : "&#xa0;") + y), b += "</div>"
        },
        _adjustInstDate: function (t, e, i) {
            var s = t.selectedYear + ("Y" === i ? e : 0), n = t.selectedMonth + ("M" === i ? e : 0),
                o = Math.min(t.selectedDay, this._getDaysInMonth(s, n)) + ("D" === i ? e : 0),
                a = this._restrictMinMax(t, this._daylightSavingAdjust(new Date(s, n, o)));
            t.selectedDay = a.getDate(), t.drawMonth = t.selectedMonth = a.getMonth(), t.drawYear = t.selectedYear = a.getFullYear(), ("M" === i || "Y" === i) && this._notifyChange(t)
        },
        _restrictMinMax: function (t, e) {
            var i = this._getMinMaxDate(t, "min"), s = this._getMinMaxDate(t, "max"), n = i && i > e ? i : e;
            return s && n > s ? s : n
        },
        _notifyChange: function (t) {
            var e = this._get(t, "onChangeMonthYear");
            e && e.apply(t.input ? t.input[0] : null, [t.selectedYear, t.selectedMonth + 1, t])
        },
        _getNumberOfMonths: function (t) {
            var e = this._get(t, "numberOfMonths");
            return null == e ? [1, 1] : "number" == typeof e ? [1, e] : e
        },
        _getMinMaxDate: function (t, e) {
            return this._determineDate(t, this._get(t, e + "Date"), null)
        },
        _getDaysInMonth: function (t, e) {
            return 32 - this._daylightSavingAdjust(new Date(t, e, 32)).getDate()
        },
        _getFirstDayOfMonth: function (t, e) {
            return new Date(t, e, 1).getDay()
        },
        _canAdjustMonth: function (t, e, i, s) {
            var n = this._getNumberOfMonths(t),
                o = this._daylightSavingAdjust(new Date(i, s + (0 > e ? e : n[0] * n[1]), 1));
            return 0 > e && o.setDate(this._getDaysInMonth(o.getFullYear(), o.getMonth())), this._isInRange(t, o)
        },
        _isInRange: function (t, e) {
            var i, s, n = this._getMinMaxDate(t, "min"), o = this._getMinMaxDate(t, "max"), a = null, r = null,
                l = this._get(t, "yearRange");
            return l && (i = l.split(":"), s = (new Date).getFullYear(), a = parseInt(i[0], 10), r = parseInt(i[1], 10), i[0].match(/[+\-].*/) && (a += s), i[1].match(/[+\-].*/) && (r += s)), (!n || e.getTime() >= n.getTime()) && (!o || e.getTime() <= o.getTime()) && (!a || e.getFullYear() >= a) && (!r || r >= e.getFullYear())
        },
        _getFormatConfig: function (t) {
            var e = this._get(t, "shortYearCutoff");
            return e = "string" != typeof e ? e : (new Date).getFullYear() % 100 + parseInt(e, 10), {
                shortYearCutoff: e,
                dayNamesShort: this._get(t, "dayNamesShort"),
                dayNames: this._get(t, "dayNames"),
                monthNamesShort: this._get(t, "monthNamesShort"),
                monthNames: this._get(t, "monthNames")
            }
        },
        _formatDate: function (t, e, i, s) {
            e || (t.currentDay = t.selectedDay, t.currentMonth = t.selectedMonth, t.currentYear = t.selectedYear);
            var n = e ? "object" == typeof e ? e : this._daylightSavingAdjust(new Date(s, i, e)) : this._daylightSavingAdjust(new Date(t.currentYear, t.currentMonth, t.currentDay));
            return this.formatDate(this._get(t, "dateFormat"), n, this._getFormatConfig(t))
        }
    }), t.fn.datepicker = function (e) {
        if (!this.length) return this;
        t.datepicker.initialized || (t(document).on("mousedown", t.datepicker._checkExternalClick), t.datepicker.initialized = !0), 0 === t("#" + t.datepicker._mainDivId).length && t("body").append(t.datepicker.dpDiv);
        var i = Array.prototype.slice.call(arguments, 1);
        return "string" != typeof e || "isDisabled" !== e && "getDate" !== e && "widget" !== e ? "option" === e && 2 === arguments.length && "string" == typeof arguments[1] ? t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this[0]].concat(i)) : this.each(function () {
            "string" == typeof e ? t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this].concat(i)) : t.datepicker._attachDatepicker(this, e)
        }) : t.datepicker["_" + e + "Datepicker"].apply(t.datepicker, [this[0]].concat(i))
    }, t.datepicker = new s, t.datepicker.initialized = !1, t.datepicker.uuid = (new Date).getTime(), t.datepicker.version = "1.12.1", t.datepicker, t.widget("ui.dialog", {
        version: "1.12.1",
        options: {
            appendTo: "body",
            autoOpen: !0,
            buttons: [],
            classes: {"ui-dialog": "ui-corner-all", "ui-dialog-titlebar": "ui-corner-all"},
            closeOnEscape: !0,
            closeText: "Close",
            draggable: !0,
            hide: null,
            height: "auto",
            maxHeight: null,
            maxWidth: null,
            minHeight: 150,
            minWidth: 150,
            modal: !1,
            position: {
                my: "center", at: "center", of: window, collision: "fit", using: function (e) {
                    var i = t(this).css(e).offset().top;
                    0 > i && t(this).css("top", e.top - i)
                }
            },
            resizable: !0,
            show: null,
            title: null,
            width: 300,
            beforeClose: null,
            close: null,
            drag: null,
            dragStart: null,
            dragStop: null,
            focus: null,
            open: null,
            resize: null,
            resizeStart: null,
            resizeStop: null
        },
        sizeRelatedOptions: {
            buttons: !0,
            height: !0,
            maxHeight: !0,
            maxWidth: !0,
            minHeight: !0,
            minWidth: !0,
            width: !0
        },
        resizableRelatedOptions: {maxHeight: !0, maxWidth: !0, minHeight: !0, minWidth: !0},
        _create: function () {
            this.originalCss = {
                display: this.element[0].style.display,
                width: this.element[0].style.width,
                minHeight: this.element[0].style.minHeight,
                maxHeight: this.element[0].style.maxHeight,
                height: this.element[0].style.height
            }, this.originalPosition = {
                parent: this.element.parent(),
                index: this.element.parent().children().index(this.element)
            }, this.originalTitle = this.element.attr("title"), null == this.options.title && null != this.originalTitle && (this.options.title = this.originalTitle), this.options.disabled && (this.options.disabled = !1), this._createWrapper(), this.element.show().removeAttr("title").appendTo(this.uiDialog), this._addClass("ui-dialog-content", "ui-widget-content"), this._createTitlebar(), this._createButtonPane(), this.options.draggable && t.fn.draggable && this._makeDraggable(), this.options.resizable && t.fn.resizable && this._makeResizable(), this._isOpen = !1, this._trackFocus()
        },
        _init: function () {
            this.options.autoOpen && this.open()
        },
        _appendTo: function () {
            var e = this.options.appendTo;
            return e && (e.jquery || e.nodeType) ? t(e) : this.document.find(e || "body").eq(0)
        },
        _destroy: function () {
            var t, e = this.originalPosition;
            this._untrackInstance(), this._destroyOverlay(), this.element.removeUniqueId().css(this.originalCss).detach(), this.uiDialog.remove(), this.originalTitle && this.element.attr("title", this.originalTitle), t = e.parent.children().eq(e.index), t.length && t[0] !== this.element[0] ? t.before(this.element) : e.parent.append(this.element)
        },
        widget: function () {
            return this.uiDialog
        },
        disable: t.noop,
        enable: t.noop,
        close: function (e) {
            var i = this;
            this._isOpen && this._trigger("beforeClose", e) !== !1 && (this._isOpen = !1, this._focusedElement = null, this._destroyOverlay(), this._untrackInstance(), this.opener.filter(":focusable").trigger("focus").length || t.ui.safeBlur(t.ui.safeActiveElement(this.document[0])), this._hide(this.uiDialog, this.options.hide, function () {
                i._trigger("close", e)
            }))
        },
        isOpen: function () {
            return this._isOpen
        },
        moveToTop: function () {
            this._moveToTop()
        },
        _moveToTop: function (e, i) {
            var s = !1, n = this.uiDialog.siblings(".ui-front:visible").map(function () {
                return +t(this).css("z-index")
            }).get(), o = Math.max.apply(null, n);
            return o >= +this.uiDialog.css("z-index") && (this.uiDialog.css("z-index", o + 1), s = !0), s && !i && this._trigger("focus", e), s
        },
        open: function () {
            var e = this;
            return this._isOpen ? (this._moveToTop() && this._focusTabbable(), void 0) : (this._isOpen = !0, this.opener = t(t.ui.safeActiveElement(this.document[0])), this._size(), this._position(), this._createOverlay(), this._moveToTop(null, !0), this.overlay && this.overlay.css("z-index", this.uiDialog.css("z-index") - 1), this._show(this.uiDialog, this.options.show, function () {
                e._focusTabbable(), e._trigger("focus")
            }), this._makeFocusTarget(), this._trigger("open"), void 0)
        },
        _focusTabbable: function () {
            var t = this._focusedElement;
            t || (t = this.element.find("[autofocus]")), t.length || (t = this.element.find(":tabbable")), t.length || (t = this.uiDialogButtonPane.find(":tabbable")), t.length || (t = this.uiDialogTitlebarClose.filter(":tabbable")), t.length || (t = this.uiDialog), t.eq(0).trigger("focus")
        },
        _keepFocus: function (e) {
            function i() {
                var e = t.ui.safeActiveElement(this.document[0]),
                    i = this.uiDialog[0] === e || t.contains(this.uiDialog[0], e);
                i || this._focusTabbable()
            }

            e.preventDefault(), i.call(this), this._delay(i)
        },
        _createWrapper: function () {
            this.uiDialog = t("<div>").hide().attr({
                tabIndex: -1,
                role: "dialog"
            }).appendTo(this._appendTo()), this._addClass(this.uiDialog, "ui-dialog", "ui-widget ui-widget-content ui-front"), this._on(this.uiDialog, {
                keydown: function (e) {
                    if (this.options.closeOnEscape && !e.isDefaultPrevented() && e.keyCode && e.keyCode === t.ui.keyCode.ESCAPE) return e.preventDefault(), this.close(e), void 0;
                    if (e.keyCode === t.ui.keyCode.TAB && !e.isDefaultPrevented()) {
                        var i = this.uiDialog.find(":tabbable"), s = i.filter(":first"), n = i.filter(":last");
                        e.target !== n[0] && e.target !== this.uiDialog[0] || e.shiftKey ? e.target !== s[0] && e.target !== this.uiDialog[0] || !e.shiftKey || (this._delay(function () {
                            n.trigger("focus")
                        }), e.preventDefault()) : (this._delay(function () {
                            s.trigger("focus")
                        }), e.preventDefault())
                    }
                }, mousedown: function (t) {
                    this._moveToTop(t) && this._focusTabbable()
                }
            }), this.element.find("[aria-describedby]").length || this.uiDialog.attr({"aria-describedby": this.element.uniqueId().attr("id")})
        },
        _createTitlebar: function () {
            var e;
            this.uiDialogTitlebar = t("<div>"), this._addClass(this.uiDialogTitlebar, "ui-dialog-titlebar", "ui-widget-header ui-helper-clearfix"), this._on(this.uiDialogTitlebar, {
                mousedown: function (e) {
                    t(e.target).closest(".ui-dialog-titlebar-close") || this.uiDialog.trigger("focus")
                }
            }), this.uiDialogTitlebarClose = t("<button type='button'></button>").button({
                label: t("<a>").text(this.options.closeText).html(),
                icon: "ui-icon-closethick",
                showLabel: !1
            }).appendTo(this.uiDialogTitlebar), this._addClass(this.uiDialogTitlebarClose, "ui-dialog-titlebar-close"), this._on(this.uiDialogTitlebarClose, {
                click: function (t) {
                    t.preventDefault(), this.close(t)
                }
            }), e = t("<span>").uniqueId().prependTo(this.uiDialogTitlebar), this._addClass(e, "ui-dialog-title"), this._title(e), this.uiDialogTitlebar.prependTo(this.uiDialog), this.uiDialog.attr({"aria-labelledby": e.attr("id")})
        },
        _title: function (t) {
            this.options.title ? t.text(this.options.title) : t.html("&#160;")
        },
        _createButtonPane: function () {
            this.uiDialogButtonPane = t("<div>"), this._addClass(this.uiDialogButtonPane, "ui-dialog-buttonpane", "ui-widget-content ui-helper-clearfix"), this.uiButtonSet = t("<div>").appendTo(this.uiDialogButtonPane), this._addClass(this.uiButtonSet, "ui-dialog-buttonset"), this._createButtons()
        },
        _createButtons: function () {
            var e = this, i = this.options.buttons;
            return this.uiDialogButtonPane.remove(), this.uiButtonSet.empty(), t.isEmptyObject(i) || t.isArray(i) && !i.length ? (this._removeClass(this.uiDialog, "ui-dialog-buttons"), void 0) : (t.each(i, function (i, s) {
                var n, o;
                s = t.isFunction(s) ? {
                    click: s,
                    text: i
                } : s, s = t.extend({type: "button"}, s), n = s.click, o = {
                    icon: s.icon,
                    iconPosition: s.iconPosition,
                    showLabel: s.showLabel,
                    icons: s.icons,
                    text: s.text
                }, delete s.click, delete s.icon, delete s.iconPosition, delete s.showLabel, delete s.icons, "boolean" == typeof s.text && delete s.text, t("<button></button>", s).button(o).appendTo(e.uiButtonSet).on("click", function () {
                    n.apply(e.element[0], arguments)
                })
            }), this._addClass(this.uiDialog, "ui-dialog-buttons"), this.uiDialogButtonPane.appendTo(this.uiDialog), void 0)
        },
        _makeDraggable: function () {
            function e(t) {
                return {position: t.position, offset: t.offset}
            }

            var i = this, s = this.options;
            this.uiDialog.draggable({
                cancel: ".ui-dialog-content, .ui-dialog-titlebar-close",
                handle: ".ui-dialog-titlebar",
                containment: "document",
                start: function (s, n) {
                    i._addClass(t(this), "ui-dialog-dragging"), i._blockFrames(), i._trigger("dragStart", s, e(n))
                },
                drag: function (t, s) {
                    i._trigger("drag", t, e(s))
                },
                stop: function (n, o) {
                    var a = o.offset.left - i.document.scrollLeft(), r = o.offset.top - i.document.scrollTop();
                    s.position = {
                        my: "left top",
                        at: "left" + (a >= 0 ? "+" : "") + a + " " + "top" + (r >= 0 ? "+" : "") + r,
                        of: i.window
                    }, i._removeClass(t(this), "ui-dialog-dragging"), i._unblockFrames(), i._trigger("dragStop", n, e(o))
                }
            })
        },
        _makeResizable: function () {
            function e(t) {
                return {
                    originalPosition: t.originalPosition,
                    originalSize: t.originalSize,
                    position: t.position,
                    size: t.size
                }
            }

            var i = this, s = this.options, n = s.resizable, o = this.uiDialog.css("position"),
                a = "string" == typeof n ? n : "n,e,s,w,se,sw,ne,nw";
            this.uiDialog.resizable({
                cancel: ".ui-dialog-content",
                containment: "document",
                alsoResize: this.element,
                maxWidth: s.maxWidth,
                maxHeight: s.maxHeight,
                minWidth: s.minWidth,
                minHeight: this._minHeight(),
                handles: a,
                start: function (s, n) {
                    i._addClass(t(this), "ui-dialog-resizing"), i._blockFrames(), i._trigger("resizeStart", s, e(n))
                },
                resize: function (t, s) {
                    i._trigger("resize", t, e(s))
                },
                stop: function (n, o) {
                    var a = i.uiDialog.offset(), r = a.left - i.document.scrollLeft(),
                        l = a.top - i.document.scrollTop();
                    s.height = i.uiDialog.height(), s.width = i.uiDialog.width(), s.position = {
                        my: "left top",
                        at: "left" + (r >= 0 ? "+" : "") + r + " " + "top" + (l >= 0 ? "+" : "") + l,
                        of: i.window
                    }, i._removeClass(t(this), "ui-dialog-resizing"), i._unblockFrames(), i._trigger("resizeStop", n, e(o))
                }
            }).css("position", o)
        },
        _trackFocus: function () {
            this._on(this.widget(), {
                focusin: function (e) {
                    this._makeFocusTarget(), this._focusedElement = t(e.target)
                }
            })
        },
        _makeFocusTarget: function () {
            this._untrackInstance(), this._trackingInstances().unshift(this)
        },
        _untrackInstance: function () {
            var e = this._trackingInstances(), i = t.inArray(this, e);
            -1 !== i && e.splice(i, 1)
        },
        _trackingInstances: function () {
            var t = this.document.data("ui-dialog-instances");
            return t || (t = [], this.document.data("ui-dialog-instances", t)), t
        },
        _minHeight: function () {
            var t = this.options;
            return "auto" === t.height ? t.minHeight : Math.min(t.minHeight, t.height)
        },
        _position: function () {
            var t = this.uiDialog.is(":visible");
            t || this.uiDialog.show(), this.uiDialog.position(this.options.position), t || this.uiDialog.hide()
        },
        _setOptions: function (e) {
            var i = this, s = !1, n = {};
            t.each(e, function (t, e) {
                i._setOption(t, e), t in i.sizeRelatedOptions && (s = !0), t in i.resizableRelatedOptions && (n[t] = e)
            }), s && (this._size(), this._position()), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", n)
        },
        _setOption: function (e, i) {
            var s, n, o = this.uiDialog;
            "disabled" !== e && (this._super(e, i), "appendTo" === e && this.uiDialog.appendTo(this._appendTo()), "buttons" === e && this._createButtons(), "closeText" === e && this.uiDialogTitlebarClose.button({label: t("<a>").text("" + this.options.closeText).html()}), "draggable" === e && (s = o.is(":data(ui-draggable)"), s && !i && o.draggable("destroy"), !s && i && this._makeDraggable()), "position" === e && this._position(), "resizable" === e && (n = o.is(":data(ui-resizable)"), n && !i && o.resizable("destroy"), n && "string" == typeof i && o.resizable("option", "handles", i), n || i === !1 || this._makeResizable()), "title" === e && this._title(this.uiDialogTitlebar.find(".ui-dialog-title")))
        },
        _size: function () {
            var t, e, i, s = this.options;
            this.element.show().css({
                width: "auto",
                minHeight: 0,
                maxHeight: "none",
                height: 0
            }), s.minWidth > s.width && (s.width = s.minWidth), t = this.uiDialog.css({
                height: "auto",
                width: s.width
            }).outerHeight(), e = Math.max(0, s.minHeight - t), i = "number" == typeof s.maxHeight ? Math.max(0, s.maxHeight - t) : "none", "auto" === s.height ? this.element.css({
                minHeight: e,
                maxHeight: i,
                height: "auto"
            }) : this.element.height(Math.max(0, s.height - t)), this.uiDialog.is(":data(ui-resizable)") && this.uiDialog.resizable("option", "minHeight", this._minHeight())
        },
        _blockFrames: function () {
            this.iframeBlocks = this.document.find("iframe").map(function () {
                var e = t(this);
                return t("<div>").css({
                    position: "absolute",
                    width: e.outerWidth(),
                    height: e.outerHeight()
                }).appendTo(e.parent()).offset(e.offset())[0]
            })
        },
        _unblockFrames: function () {
            this.iframeBlocks && (this.iframeBlocks.remove(), delete this.iframeBlocks)
        },
        _allowInteraction: function (e) {
            return t(e.target).closest(".ui-dialog").length ? !0 : !!t(e.target).closest(".ui-datepicker").length
        },
        _createOverlay: function () {
            if (this.options.modal) {
                var e = !0;
                this._delay(function () {
                    e = !1
                }), this.document.data("ui-dialog-overlays") || this._on(this.document, {
                    focusin: function (t) {
                        e || this._allowInteraction(t) || (t.preventDefault(), this._trackingInstances()[0]._focusTabbable())
                    }
                }), this.overlay = t("<div>").appendTo(this._appendTo()), this._addClass(this.overlay, null, "ui-widget-overlay ui-front"), this._on(this.overlay, {mousedown: "_keepFocus"}), this.document.data("ui-dialog-overlays", (this.document.data("ui-dialog-overlays") || 0) + 1)
            }
        },
        _destroyOverlay: function () {
            if (this.options.modal && this.overlay) {
                var t = this.document.data("ui-dialog-overlays") - 1;
                t ? this.document.data("ui-dialog-overlays", t) : (this._off(this.document, "focusin"), this.document.removeData("ui-dialog-overlays")), this.overlay.remove(), this.overlay = null
            }
        }
    }), t.uiBackCompat !== !1 && t.widget("ui.dialog", t.ui.dialog, {
        options: {dialogClass: ""},
        _createWrapper: function () {
            this._super(), this.uiDialog.addClass(this.options.dialogClass)
        },
        _setOption: function (t, e) {
            "dialogClass" === t && this.uiDialog.removeClass(this.options.dialogClass).addClass(e), this._superApply(arguments)
        }
    }), t.ui.dialog, t.widget("ui.progressbar", {
        version: "1.12.1",
        options: {
            classes: {
                "ui-progressbar": "ui-corner-all",
                "ui-progressbar-value": "ui-corner-left",
                "ui-progressbar-complete": "ui-corner-right"
            }, max: 100, value: 0, change: null, complete: null
        },
        min: 0,
        _create: function () {
            this.oldValue = this.options.value = this._constrainedValue(), this.element.attr({
                role: "progressbar",
                "aria-valuemin": this.min
            }), this._addClass("ui-progressbar", "ui-widget ui-widget-content"), this.valueDiv = t("<div>").appendTo(this.element), this._addClass(this.valueDiv, "ui-progressbar-value", "ui-widget-header"), this._refreshValue()
        },
        _destroy: function () {
            this.element.removeAttr("role aria-valuemin aria-valuemax aria-valuenow"), this.valueDiv.remove()
        },
        value: function (t) {
            return void 0 === t ? this.options.value : (this.options.value = this._constrainedValue(t), this._refreshValue(), void 0)
        },
        _constrainedValue: function (t) {
            return void 0 === t && (t = this.options.value), this.indeterminate = t === !1, "number" != typeof t && (t = 0), this.indeterminate ? !1 : Math.min(this.options.max, Math.max(this.min, t))
        },
        _setOptions: function (t) {
            var e = t.value;
            delete t.value, this._super(t), this.options.value = this._constrainedValue(e), this._refreshValue()
        },
        _setOption: function (t, e) {
            "max" === t && (e = Math.max(this.min, e)), this._super(t, e)
        },
        _setOptionDisabled: function (t) {
            this._super(t), this.element.attr("aria-disabled", t), this._toggleClass(null, "ui-state-disabled", !!t)
        },
        _percentage: function () {
            return this.indeterminate ? 100 : 100 * (this.options.value - this.min) / (this.options.max - this.min)
        },
        _refreshValue: function () {
            var e = this.options.value, i = this._percentage();
            this.valueDiv.toggle(this.indeterminate || e > this.min).width(i.toFixed(0) + "%"), this._toggleClass(this.valueDiv, "ui-progressbar-complete", null, e === this.options.max)._toggleClass("ui-progressbar-indeterminate", null, this.indeterminate), this.indeterminate ? (this.element.removeAttr("aria-valuenow"), this.overlayDiv || (this.overlayDiv = t("<div>").appendTo(this.valueDiv), this._addClass(this.overlayDiv, "ui-progressbar-overlay"))) : (this.element.attr({
                "aria-valuemax": this.options.max,
                "aria-valuenow": e
            }), this.overlayDiv && (this.overlayDiv.remove(), this.overlayDiv = null)), this.oldValue !== e && (this.oldValue = e, this._trigger("change")), e === this.options.max && this._trigger("complete")
        }
    }), t.widget("ui.selectmenu", [t.ui.formResetMixin, {
        version: "1.12.1",
        defaultElement: "<select>",
        options: {
            appendTo: null,
            classes: {
                "ui-selectmenu-button-open": "ui-corner-top",
                "ui-selectmenu-button-closed": "ui-corner-all"
            },
            disabled: null,
            icons: {button: "ui-icon-triangle-1-s"},
            position: {my: "left top", at: "left bottom", collision: "none"},
            width: !1,
            change: null,
            close: null,
            focus: null,
            open: null,
            select: null
        },
        _create: function () {
            var e = this.element.uniqueId().attr("id");
            this.ids = {
                element: e,
                button: e + "-button",
                menu: e + "-menu"
            }, this._drawButton(), this._drawMenu(), this._bindFormResetHandler(), this._rendered = !1, this.menuItems = t()
        },
        _drawButton: function () {
            var e, i = this,
                s = this._parseOption(this.element.find("option:selected"), this.element[0].selectedIndex);
            this.labels = this.element.labels().attr("for", this.ids.button), this._on(this.labels, {
                click: function (t) {
                    this.button.focus(), t.preventDefault()
                }
            }), this.element.hide(), this.button = t("<span>", {
                tabindex: this.options.disabled ? -1 : 0,
                id: this.ids.button,
                role: "combobox",
                "aria-expanded": "false",
                "aria-autocomplete": "list",
                "aria-owns": this.ids.menu,
                "aria-haspopup": "true",
                title: this.element.attr("title")
            }).insertAfter(this.element), this._addClass(this.button, "ui-selectmenu-button ui-selectmenu-button-closed", "ui-button ui-widget"), e = t("<span>").appendTo(this.button), this._addClass(e, "ui-selectmenu-icon", "ui-icon " + this.options.icons.button), this.buttonItem = this._renderButtonItem(s).appendTo(this.button), this.options.width !== !1 && this._resizeButton(), this._on(this.button, this._buttonEvents), this.button.one("focusin", function () {
                i._rendered || i._refreshMenu()
            })
        },
        _drawMenu: function () {
            var e = this;
            this.menu = t("<ul>", {
                "aria-hidden": "true",
                "aria-labelledby": this.ids.button,
                id: this.ids.menu
            }), this.menuWrap = t("<div>").append(this.menu), this._addClass(this.menuWrap, "ui-selectmenu-menu", "ui-front"), this.menuWrap.appendTo(this._appendTo()), this.menuInstance = this.menu.menu({
                classes: {"ui-menu": "ui-corner-bottom"},
                role: "listbox",
                select: function (t, i) {
                    t.preventDefault(), e._setSelection(), e._select(i.item.data("ui-selectmenu-item"), t)
                },
                focus: function (t, i) {
                    var s = i.item.data("ui-selectmenu-item");
                    null != e.focusIndex && s.index !== e.focusIndex && (e._trigger("focus", t, {item: s}), e.isOpen || e._select(s, t)), e.focusIndex = s.index, e.button.attr("aria-activedescendant", e.menuItems.eq(s.index).attr("id"))
                }
            }).menu("instance"), this.menuInstance._off(this.menu, "mouseleave"), this.menuInstance._closeOnDocumentClick = function () {
                return !1
            }, this.menuInstance._isDivider = function () {
                return !1
            }
        },
        refresh: function () {
            this._refreshMenu(), this.buttonItem.replaceWith(this.buttonItem = this._renderButtonItem(this._getSelectedItem().data("ui-selectmenu-item") || {})), null === this.options.width && this._resizeButton()
        },
        _refreshMenu: function () {
            var t, e = this.element.find("option");
            this.menu.empty(), this._parseOptions(e), this._renderMenu(this.menu, this.items), this.menuInstance.refresh(), this.menuItems = this.menu.find("li").not(".ui-selectmenu-optgroup").find(".ui-menu-item-wrapper"), this._rendered = !0, e.length && (t = this._getSelectedItem(), this.menuInstance.focus(null, t), this._setAria(t.data("ui-selectmenu-item")), this._setOption("disabled", this.element.prop("disabled")))
        },
        open: function (t) {
            this.options.disabled || (this._rendered ? (this._removeClass(this.menu.find(".ui-state-active"), null, "ui-state-active"), this.menuInstance.focus(null, this._getSelectedItem())) : this._refreshMenu(), this.menuItems.length && (this.isOpen = !0, this._toggleAttr(), this._resizeMenu(), this._position(), this._on(this.document, this._documentClick), this._trigger("open", t)))
        },
        _position: function () {
            this.menuWrap.position(t.extend({of: this.button}, this.options.position))
        },
        close: function (t) {
            this.isOpen && (this.isOpen = !1, this._toggleAttr(), this.range = null, this._off(this.document), this._trigger("close", t))
        },
        widget: function () {
            return this.button
        },
        menuWidget: function () {
            return this.menu
        },
        _renderButtonItem: function (e) {
            var i = t("<span>");
            return this._setText(i, e.label), this._addClass(i, "ui-selectmenu-text"), i
        },
        _renderMenu: function (e, i) {
            var s = this, n = "";
            t.each(i, function (i, o) {
                var a;
                o.optgroup !== n && (a = t("<li>", {text: o.optgroup}), s._addClass(a, "ui-selectmenu-optgroup", "ui-menu-divider" + (o.element.parent("optgroup").prop("disabled") ? " ui-state-disabled" : "")), a.appendTo(e), n = o.optgroup), s._renderItemData(e, o)
            })
        },
        _renderItemData: function (t, e) {
            return this._renderItem(t, e).data("ui-selectmenu-item", e)
        },
        _renderItem: function (e, i) {
            var s = t("<li>"), n = t("<div>", {title: i.element.attr("title")});
            return i.disabled && this._addClass(s, null, "ui-state-disabled"), this._setText(n, i.label), s.append(n).appendTo(e)
        },
        _setText: function (t, e) {
            e ? t.text(e) : t.html("&#160;")
        },
        _move: function (t, e) {
            var i, s, n = ".ui-menu-item";
            this.isOpen ? i = this.menuItems.eq(this.focusIndex).parent("li") : (i = this.menuItems.eq(this.element[0].selectedIndex).parent("li"), n += ":not(.ui-state-disabled)"), s = "first" === t || "last" === t ? i["first" === t ? "prevAll" : "nextAll"](n).eq(-1) : i[t + "All"](n).eq(0), s.length && this.menuInstance.focus(e, s)
        },
        _getSelectedItem: function () {
            return this.menuItems.eq(this.element[0].selectedIndex).parent("li")
        },
        _toggle: function (t) {
            this[this.isOpen ? "close" : "open"](t)
        },
        _setSelection: function () {
            var t;
            this.range && (window.getSelection ? (t = window.getSelection(), t.removeAllRanges(), t.addRange(this.range)) : this.range.select(), this.button.focus())
        },
        _documentClick: {
            mousedown: function (e) {
                this.isOpen && (t(e.target).closest(".ui-selectmenu-menu, #" + t.ui.escapeSelector(this.ids.button)).length || this.close(e))
            }
        },
        _buttonEvents: {
            mousedown: function () {
                var t;
                window.getSelection ? (t = window.getSelection(), t.rangeCount && (this.range = t.getRangeAt(0))) : this.range = document.selection.createRange()
            }, click: function (t) {
                this._setSelection(), this._toggle(t)
            }, keydown: function (e) {
                var i = !0;
                switch (e.keyCode) {
                    case t.ui.keyCode.TAB:
                    case t.ui.keyCode.ESCAPE:
                        this.close(e), i = !1;
                        break;
                    case t.ui.keyCode.ENTER:
                        this.isOpen && this._selectFocusedItem(e);
                        break;
                    case t.ui.keyCode.UP:
                        e.altKey ? this._toggle(e) : this._move("prev", e);
                        break;
                    case t.ui.keyCode.DOWN:
                        e.altKey ? this._toggle(e) : this._move("next", e);
                        break;
                    case t.ui.keyCode.SPACE:
                        this.isOpen ? this._selectFocusedItem(e) : this._toggle(e);
                        break;
                    case t.ui.keyCode.LEFT:
                        this._move("prev", e);
                        break;
                    case t.ui.keyCode.RIGHT:
                        this._move("next", e);
                        break;
                    case t.ui.keyCode.HOME:
                    case t.ui.keyCode.PAGE_UP:
                        this._move("first", e);
                        break;
                    case t.ui.keyCode.END:
                    case t.ui.keyCode.PAGE_DOWN:
                        this._move("last", e);
                        break;
                    default:
                        this.menu.trigger(e), i = !1
                }
                i && e.preventDefault()
            }
        },
        _selectFocusedItem: function (t) {
            var e = this.menuItems.eq(this.focusIndex).parent("li");
            e.hasClass("ui-state-disabled") || this._select(e.data("ui-selectmenu-item"), t)
        },
        _select: function (t, e) {
            var i = this.element[0].selectedIndex;
            this.element[0].selectedIndex = t.index, this.buttonItem.replaceWith(this.buttonItem = this._renderButtonItem(t)), this._setAria(t), this._trigger("select", e, {item: t}), t.index !== i && this._trigger("change", e, {item: t}), this.close(e)
        },
        _setAria: function (t) {
            var e = this.menuItems.eq(t.index).attr("id");
            this.button.attr({
                "aria-labelledby": e,
                "aria-activedescendant": e
            }), this.menu.attr("aria-activedescendant", e)
        },
        _setOption: function (t, e) {
            if ("icons" === t) {
                var i = this.button.find("span.ui-icon");
                this._removeClass(i, null, this.options.icons.button)._addClass(i, null, e.button)
            }
            this._super(t, e), "appendTo" === t && this.menuWrap.appendTo(this._appendTo()), "width" === t && this._resizeButton()
        },
        _setOptionDisabled: function (t) {
            this._super(t), this.menuInstance.option("disabled", t), this.button.attr("aria-disabled", t), this._toggleClass(this.button, null, "ui-state-disabled", t), this.element.prop("disabled", t), t ? (this.button.attr("tabindex", -1), this.close()) : this.button.attr("tabindex", 0)
        },
        _appendTo: function () {
            var e = this.options.appendTo;
            return e && (e = e.jquery || e.nodeType ? t(e) : this.document.find(e).eq(0)), e && e[0] || (e = this.element.closest(".ui-front, dialog")), e.length || (e = this.document[0].body), e
        },
        _toggleAttr: function () {
            this.button.attr("aria-expanded", this.isOpen), this._removeClass(this.button, "ui-selectmenu-button-" + (this.isOpen ? "closed" : "open"))._addClass(this.button, "ui-selectmenu-button-" + (this.isOpen ? "open" : "closed"))._toggleClass(this.menuWrap, "ui-selectmenu-open", null, this.isOpen), this.menu.attr("aria-hidden", !this.isOpen)
        },
        _resizeButton: function () {
            var t = this.options.width;
            return t === !1 ? (this.button.css("width", ""), void 0) : (null === t && (t = this.element.show().outerWidth(), this.element.hide()), this.button.outerWidth(t), void 0)
        },
        _resizeMenu: function () {
            this.menu.outerWidth(Math.max(this.button.outerWidth(), this.menu.width("").outerWidth() + 1))
        },
        _getCreateOptions: function () {
            var t = this._super();
            return t.disabled = this.element.prop("disabled"), t
        },
        _parseOptions: function (e) {
            var i = this, s = [];
            e.each(function (e, n) {
                s.push(i._parseOption(t(n), e))
            }), this.items = s
        },
        _parseOption: function (t, e) {
            var i = t.parent("optgroup");
            return {
                element: t,
                index: e,
                value: t.val(),
                label: t.text(),
                optgroup: i.attr("label") || "",
                disabled: i.prop("disabled") || t.prop("disabled")
            }
        },
        _destroy: function () {
            this._unbindFormResetHandler(), this.menuWrap.remove(), this.button.remove(), this.element.show(), this.element.removeUniqueId(), this.labels.attr("for", this.ids.element)
        }
    }]), t.widget("ui.slider", t.ui.mouse, {
        version: "1.12.1",
        widgetEventPrefix: "slide",
        options: {
            animate: !1,
            classes: {
                "ui-slider": "ui-corner-all",
                "ui-slider-handle": "ui-corner-all",
                "ui-slider-range": "ui-corner-all ui-widget-header"
            },
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: !1,
            step: 1,
            value: 0,
            values: null,
            change: null,
            slide: null,
            start: null,
            stop: null
        },
        numPages: 5,
        _create: function () {
            this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this._calculateNewMax(), this._addClass("ui-slider ui-slider-" + this.orientation, "ui-widget ui-widget-content"), this._refresh(), this._animateOff = !1
        },
        _refresh: function () {
            this._createRange(), this._createHandles(), this._setupEvents(), this._refreshValue()
        },
        _createHandles: function () {
            var e, i, s = this.options, n = this.element.find(".ui-slider-handle"),
                o = "<span tabindex='0'></span>", a = [];
            for (i = s.values && s.values.length || 1, n.length > i && (n.slice(i).remove(), n = n.slice(0, i)), e = n.length; i > e; e++) a.push(o);
            this.handles = n.add(t(a.join("")).appendTo(this.element)), this._addClass(this.handles, "ui-slider-handle", "ui-state-default"), this.handle = this.handles.eq(0), this.handles.each(function (e) {
                t(this).data("ui-slider-handle-index", e).attr("tabIndex", 0)
            })
        },
        _createRange: function () {
            var e = this.options;
            e.range ? (e.range === !0 && (e.values ? e.values.length && 2 !== e.values.length ? e.values = [e.values[0], e.values[0]] : t.isArray(e.values) && (e.values = e.values.slice(0)) : e.values = [this._valueMin(), this._valueMin()]), this.range && this.range.length ? (this._removeClass(this.range, "ui-slider-range-min ui-slider-range-max"), this.range.css({
                left: "",
                bottom: ""
            })) : (this.range = t("<div>").appendTo(this.element), this._addClass(this.range, "ui-slider-range")), ("min" === e.range || "max" === e.range) && this._addClass(this.range, "ui-slider-range-" + e.range)) : (this.range && this.range.remove(), this.range = null)
        },
        _setupEvents: function () {
            this._off(this.handles), this._on(this.handles, this._handleEvents), this._hoverable(this.handles), this._focusable(this.handles)
        },
        _destroy: function () {
            this.handles.remove(), this.range && this.range.remove(), this._mouseDestroy()
        },
        _mouseCapture: function (e) {
            var i, s, n, o, a, r, l, h, c = this, u = this.options;
            return u.disabled ? !1 : (this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            }, this.elementOffset = this.element.offset(), i = {
                x: e.pageX,
                y: e.pageY
            }, s = this._normValueFromMouse(i), n = this._valueMax() - this._valueMin() + 1, this.handles.each(function (e) {
                var i = Math.abs(s - c.values(e));
                (n > i || n === i && (e === c._lastChangedValue || c.values(e) === u.min)) && (n = i, o = t(this), a = e)
            }), r = this._start(e, a), r === !1 ? !1 : (this._mouseSliding = !0, this._handleIndex = a, this._addClass(o, null, "ui-state-active"), o.trigger("focus"), l = o.offset(), h = !t(e.target).parents().addBack().is(".ui-slider-handle"), this._clickOffset = h ? {
                left: 0,
                top: 0
            } : {
                left: e.pageX - l.left - o.width() / 2,
                top: e.pageY - l.top - o.height() / 2 - (parseInt(o.css("borderTopWidth"), 10) || 0) - (parseInt(o.css("borderBottomWidth"), 10) || 0) + (parseInt(o.css("marginTop"), 10) || 0)
            }, this.handles.hasClass("ui-state-hover") || this._slide(e, a, s), this._animateOff = !0, !0))
        },
        _mouseStart: function () {
            return !0
        },
        _mouseDrag: function (t) {
            var e = {x: t.pageX, y: t.pageY}, i = this._normValueFromMouse(e);
            return this._slide(t, this._handleIndex, i), !1
        },
        _mouseStop: function (t) {
            return this._removeClass(this.handles, null, "ui-state-active"), this._mouseSliding = !1, this._stop(t, this._handleIndex), this._change(t, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1, !1
        },
        _detectOrientation: function () {
            this.orientation = "vertical" === this.options.orientation ? "vertical" : "horizontal"
        },
        _normValueFromMouse: function (t) {
            var e, i, s, n, o;
            return "horizontal" === this.orientation ? (e = this.elementSize.width, i = t.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (e = this.elementSize.height, i = t.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), s = i / e, s > 1 && (s = 1), 0 > s && (s = 0), "vertical" === this.orientation && (s = 1 - s), n = this._valueMax() - this._valueMin(), o = this._valueMin() + s * n, this._trimAlignValue(o)
        },
        _uiHash: function (t, e, i) {
            var s = {handle: this.handles[t], handleIndex: t, value: void 0 !== e ? e : this.value()};
            return this._hasMultipleValues() && (s.value = void 0 !== e ? e : this.values(t), s.values = i || this.values()), s
        },
        _hasMultipleValues: function () {
            return this.options.values && this.options.values.length
        },
        _start: function (t, e) {
            return this._trigger("start", t, this._uiHash(e))
        },
        _slide: function (t, e, i) {
            var s, n, o = this.value(), a = this.values();
            this._hasMultipleValues() && (n = this.values(e ? 0 : 1), o = this.values(e), 2 === this.options.values.length && this.options.range === !0 && (i = 0 === e ? Math.min(n, i) : Math.max(n, i)), a[e] = i), i !== o && (s = this._trigger("slide", t, this._uiHash(e, i, a)), s !== !1 && (this._hasMultipleValues() ? this.values(e, i) : this.value(i)))
        },
        _stop: function (t, e) {
            this._trigger("stop", t, this._uiHash(e))
        },
        _change: function (t, e) {
            this._keySliding || this._mouseSliding || (this._lastChangedValue = e, this._trigger("change", t, this._uiHash(e)))
        },
        value: function (t) {
            return arguments.length ? (this.options.value = this._trimAlignValue(t), this._refreshValue(), this._change(null, 0), void 0) : this._value()
        },
        values: function (e, i) {
            var s, n, o;
            if (arguments.length > 1) return this.options.values[e] = this._trimAlignValue(i), this._refreshValue(), this._change(null, e), void 0;
            if (!arguments.length) return this._values();
            if (!t.isArray(arguments[0])) return this._hasMultipleValues() ? this._values(e) : this.value();
            for (s = this.options.values, n = arguments[0], o = 0; s.length > o; o += 1) s[o] = this._trimAlignValue(n[o]), this._change(null, o);
            this._refreshValue()
        },
        _setOption: function (e, i) {
            var s, n = 0;
            switch ("range" === e && this.options.range === !0 && ("min" === i ? (this.options.value = this._values(0), this.options.values = null) : "max" === i && (this.options.value = this._values(this.options.values.length - 1), this.options.values = null)), t.isArray(this.options.values) && (n = this.options.values.length), this._super(e, i), e) {
                case"orientation":
                    this._detectOrientation(), this._removeClass("ui-slider-horizontal ui-slider-vertical")._addClass("ui-slider-" + this.orientation), this._refreshValue(), this.options.range && this._refreshRange(i), this.handles.css("horizontal" === i ? "bottom" : "left", "");
                    break;
                case"value":
                    this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
                    break;
                case"values":
                    for (this._animateOff = !0, this._refreshValue(), s = n - 1; s >= 0; s--) this._change(null, s);
                    this._animateOff = !1;
                    break;
                case"step":
                case"min":
                case"max":
                    this._animateOff = !0, this._calculateNewMax(), this._refreshValue(), this._animateOff = !1;
                    break;
                case"range":
                    this._animateOff = !0, this._refresh(), this._animateOff = !1
            }
        },
        _setOptionDisabled: function (t) {
            this._super(t), this._toggleClass(null, "ui-state-disabled", !!t)
        },
        _value: function () {
            var t = this.options.value;
            return t = this._trimAlignValue(t)
        },
        _values: function (t) {
            var e, i, s;
            if (arguments.length) return e = this.options.values[t], e = this._trimAlignValue(e);
            if (this._hasMultipleValues()) {
                for (i = this.options.values.slice(), s = 0; i.length > s; s += 1) i[s] = this._trimAlignValue(i[s]);
                return i
            }
            return []
        },
        _trimAlignValue: function (t) {
            if (this._valueMin() >= t) return this._valueMin();
            if (t >= this._valueMax()) return this._valueMax();
            var e = this.options.step > 0 ? this.options.step : 1, i = (t - this._valueMin()) % e, s = t - i;
            return 2 * Math.abs(i) >= e && (s += i > 0 ? e : -e), parseFloat(s.toFixed(5))
        },
        _calculateNewMax: function () {
            var t = this.options.max, e = this._valueMin(), i = this.options.step,
                s = Math.round((t - e) / i) * i;
            t = s + e, t > this.options.max && (t -= i), this.max = parseFloat(t.toFixed(this._precision()))
        },
        _precision: function () {
            var t = this._precisionOf(this.options.step);
            return null !== this.options.min && (t = Math.max(t, this._precisionOf(this.options.min))), t
        },
        _precisionOf: function (t) {
            var e = "" + t, i = e.indexOf(".");
            return -1 === i ? 0 : e.length - i - 1
        },
        _valueMin: function () {
            return this.options.min
        },
        _valueMax: function () {
            return this.max
        },
        _refreshRange: function (t) {
            "vertical" === t && this.range.css({
                width: "",
                left: ""
            }), "horizontal" === t && this.range.css({height: "", bottom: ""})
        },
        _refreshValue: function () {
            var e, i, s, n, o, a = this.options.range, r = this.options, l = this,
                h = this._animateOff ? !1 : r.animate, c = {};
            this._hasMultipleValues() ? this.handles.each(function (s) {
                i = 100 * ((l.values(s) - l._valueMin()) / (l._valueMax() - l._valueMin())), c["horizontal" === l.orientation ? "left" : "bottom"] = i + "%", t(this).stop(1, 1)[h ? "animate" : "css"](c, r.animate), l.options.range === !0 && ("horizontal" === l.orientation ? (0 === s && l.range.stop(1, 1)[h ? "animate" : "css"]({left: i + "%"}, r.animate), 1 === s && l.range[h ? "animate" : "css"]({width: i - e + "%"}, {
                    queue: !1,
                    duration: r.animate
                })) : (0 === s && l.range.stop(1, 1)[h ? "animate" : "css"]({bottom: i + "%"}, r.animate), 1 === s && l.range[h ? "animate" : "css"]({height: i - e + "%"}, {
                    queue: !1,
                    duration: r.animate
                }))), e = i
            }) : (s = this.value(), n = this._valueMin(), o = this._valueMax(), i = o !== n ? 100 * ((s - n) / (o - n)) : 0, c["horizontal" === this.orientation ? "left" : "bottom"] = i + "%", this.handle.stop(1, 1)[h ? "animate" : "css"](c, r.animate), "min" === a && "horizontal" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({width: i + "%"}, r.animate), "max" === a && "horizontal" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({width: 100 - i + "%"}, r.animate), "min" === a && "vertical" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({height: i + "%"}, r.animate), "max" === a && "vertical" === this.orientation && this.range.stop(1, 1)[h ? "animate" : "css"]({height: 100 - i + "%"}, r.animate))
        },
        _handleEvents: {
            keydown: function (e) {
                var i, s, n, o, a = t(e.target).data("ui-slider-handle-index");
                switch (e.keyCode) {
                    case t.ui.keyCode.HOME:
                    case t.ui.keyCode.END:
                    case t.ui.keyCode.PAGE_UP:
                    case t.ui.keyCode.PAGE_DOWN:
                    case t.ui.keyCode.UP:
                    case t.ui.keyCode.RIGHT:
                    case t.ui.keyCode.DOWN:
                    case t.ui.keyCode.LEFT:
                        if (e.preventDefault(), !this._keySliding && (this._keySliding = !0, this._addClass(t(e.target), null, "ui-state-active"), i = this._start(e, a), i === !1)) return
                }
                switch (o = this.options.step, s = n = this._hasMultipleValues() ? this.values(a) : this.value(), e.keyCode) {
                    case t.ui.keyCode.HOME:
                        n = this._valueMin();
                        break;
                    case t.ui.keyCode.END:
                        n = this._valueMax();
                        break;
                    case t.ui.keyCode.PAGE_UP:
                        n = this._trimAlignValue(s + (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case t.ui.keyCode.PAGE_DOWN:
                        n = this._trimAlignValue(s - (this._valueMax() - this._valueMin()) / this.numPages);
                        break;
                    case t.ui.keyCode.UP:
                    case t.ui.keyCode.RIGHT:
                        if (s === this._valueMax()) return;
                        n = this._trimAlignValue(s + o);
                        break;
                    case t.ui.keyCode.DOWN:
                    case t.ui.keyCode.LEFT:
                        if (s === this._valueMin()) return;
                        n = this._trimAlignValue(s - o)
                }
                this._slide(e, a, n)
            }, keyup: function (e) {
                var i = t(e.target).data("ui-slider-handle-index");
                this._keySliding && (this._keySliding = !1, this._stop(e, i), this._change(e, i), this._removeClass(t(e.target), null, "ui-state-active"))
            }
        }
    }), t.widget("ui.spinner", {
        version: "1.12.1",
        defaultElement: "<input>",
        widgetEventPrefix: "spin",
        options: {
            classes: {
                "ui-spinner": "ui-corner-all",
                "ui-spinner-down": "ui-corner-br",
                "ui-spinner-up": "ui-corner-tr"
            },
            culture: null,
            icons: {down: "ui-icon-triangle-1-s", up: "ui-icon-triangle-1-n"},
            incremental: !0,
            max: null,
            min: null,
            numberFormat: null,
            page: 10,
            step: 1,
            change: null,
            spin: null,
            start: null,
            stop: null
        },
        _create: function () {
            this._setOption("max", this.options.max), this._setOption("min", this.options.min), this._setOption("step", this.options.step), "" !== this.value() && this._value(this.element.val(), !0), this._draw(), this._on(this._events), this._refresh(), this._on(this.window, {
                beforeunload: function () {
                    this.element.removeAttr("autocomplete")
                }
            })
        },
        _getCreateOptions: function () {
            var e = this._super(), i = this.element;
            return t.each(["min", "max", "step"], function (t, s) {
                var n = i.attr(s);
                null != n && n.length && (e[s] = n)
            }), e
        },
        _events: {
            keydown: function (t) {
                this._start(t) && this._keydown(t) && t.preventDefault()
            }, keyup: "_stop", focus: function () {
                this.previous = this.element.val()
            }, blur: function (t) {
                return this.cancelBlur ? (delete this.cancelBlur, void 0) : (this._stop(), this._refresh(), this.previous !== this.element.val() && this._trigger("change", t), void 0)
            }, mousewheel: function (t, e) {
                if (e) {
                    if (!this.spinning && !this._start(t)) return !1;
                    this._spin((e > 0 ? 1 : -1) * this.options.step, t), clearTimeout(this.mousewheelTimer), this.mousewheelTimer = this._delay(function () {
                        this.spinning && this._stop(t)
                    }, 100), t.preventDefault()
                }
            }, "mousedown .ui-spinner-button": function (e) {
                function i() {
                    var e = this.element[0] === t.ui.safeActiveElement(this.document[0]);
                    e || (this.element.trigger("focus"), this.previous = s, this._delay(function () {
                        this.previous = s
                    }))
                }

                var s;
                s = this.element[0] === t.ui.safeActiveElement(this.document[0]) ? this.previous : this.element.val(), e.preventDefault(), i.call(this), this.cancelBlur = !0, this._delay(function () {
                    delete this.cancelBlur, i.call(this)
                }), this._start(e) !== !1 && this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e)
            }, "mouseup .ui-spinner-button": "_stop", "mouseenter .ui-spinner-button": function (e) {
                return t(e.currentTarget).hasClass("ui-state-active") ? this._start(e) === !1 ? !1 : (this._repeat(null, t(e.currentTarget).hasClass("ui-spinner-up") ? 1 : -1, e), void 0) : void 0
            }, "mouseleave .ui-spinner-button": "_stop"
        },
        _enhance: function () {
            this.uiSpinner = this.element.attr("autocomplete", "off").wrap("<span>").parent().append("<a></a><a></a>")
        },
        _draw: function () {
            this._enhance(), this._addClass(this.uiSpinner, "ui-spinner", "ui-widget ui-widget-content"), this._addClass("ui-spinner-input"), this.element.attr("role", "spinbutton"), this.buttons = this.uiSpinner.children("a").attr("tabIndex", -1).attr("aria-hidden", !0).button({classes: {"ui-button": ""}}), this._removeClass(this.buttons, "ui-corner-all"), this._addClass(this.buttons.first(), "ui-spinner-button ui-spinner-up"), this._addClass(this.buttons.last(), "ui-spinner-button ui-spinner-down"), this.buttons.first().button({
                icon: this.options.icons.up,
                showLabel: !1
            }), this.buttons.last().button({
                icon: this.options.icons.down,
                showLabel: !1
            }), this.buttons.height() > Math.ceil(.5 * this.uiSpinner.height()) && this.uiSpinner.height() > 0 && this.uiSpinner.height(this.uiSpinner.height())
        },
        _keydown: function (e) {
            var i = this.options, s = t.ui.keyCode;
            switch (e.keyCode) {
                case s.UP:
                    return this._repeat(null, 1, e), !0;
                case s.DOWN:
                    return this._repeat(null, -1, e), !0;
                case s.PAGE_UP:
                    return this._repeat(null, i.page, e), !0;
                case s.PAGE_DOWN:
                    return this._repeat(null, -i.page, e), !0
            }
            return !1
        },
        _start: function (t) {
            return this.spinning || this._trigger("start", t) !== !1 ? (this.counter || (this.counter = 1), this.spinning = !0, !0) : !1
        },
        _repeat: function (t, e, i) {
            t = t || 500, clearTimeout(this.timer), this.timer = this._delay(function () {
                this._repeat(40, e, i)
            }, t), this._spin(e * this.options.step, i)
        },
        _spin: function (t, e) {
            var i = this.value() || 0;
            this.counter || (this.counter = 1), i = this._adjustValue(i + t * this._increment(this.counter)), this.spinning && this._trigger("spin", e, {value: i}) === !1 || (this._value(i), this.counter++)
        },
        _increment: function (e) {
            var i = this.options.incremental;
            return i ? t.isFunction(i) ? i(e) : Math.floor(e * e * e / 5e4 - e * e / 500 + 17 * e / 200 + 1) : 1
        },
        _precision: function () {
            var t = this._precisionOf(this.options.step);
            return null !== this.options.min && (t = Math.max(t, this._precisionOf(this.options.min))), t
        },
        _precisionOf: function (t) {
            var e = "" + t, i = e.indexOf(".");
            return -1 === i ? 0 : e.length - i - 1
        },
        _adjustValue: function (t) {
            var e, i, s = this.options;
            return e = null !== s.min ? s.min : 0, i = t - e, i = Math.round(i / s.step) * s.step, t = e + i, t = parseFloat(t.toFixed(this._precision())), null !== s.max && t > s.max ? s.max : null !== s.min && s.min > t ? s.min : t
        },
        _stop: function (t) {
            this.spinning && (clearTimeout(this.timer), clearTimeout(this.mousewheelTimer), this.counter = 0, this.spinning = !1, this._trigger("stop", t))
        },
        _setOption: function (t, e) {
            var i, s, n;
            return "culture" === t || "numberFormat" === t ? (i = this._parse(this.element.val()), this.options[t] = e, this.element.val(this._format(i)), void 0) : (("max" === t || "min" === t || "step" === t) && "string" == typeof e && (e = this._parse(e)), "icons" === t && (s = this.buttons.first().find(".ui-icon"), this._removeClass(s, null, this.options.icons.up), this._addClass(s, null, e.up), n = this.buttons.last().find(".ui-icon"), this._removeClass(n, null, this.options.icons.down), this._addClass(n, null, e.down)), this._super(t, e), void 0)
        },
        _setOptionDisabled: function (t) {
            this._super(t), this._toggleClass(this.uiSpinner, null, "ui-state-disabled", !!t), this.element.prop("disabled", !!t), this.buttons.button(t ? "disable" : "enable")
        },
        _setOptions: r(function (t) {
            this._super(t)
        }),
        _parse: function (t) {
            return "string" == typeof t && "" !== t && (t = window.Globalize && this.options.numberFormat ? Globalize.parseFloat(t, 10, this.options.culture) : +t), "" === t || isNaN(t) ? null : t
        },
        _format: function (t) {
            return "" === t ? "" : window.Globalize && this.options.numberFormat ? Globalize.format(t, this.options.numberFormat, this.options.culture) : t
        },
        _refresh: function () {
            this.element.attr({
                "aria-valuemin": this.options.min,
                "aria-valuemax": this.options.max,
                "aria-valuenow": this._parse(this.element.val())
            })
        },
        isValid: function () {
            var t = this.value();
            return null === t ? !1 : t === this._adjustValue(t)
        },
        _value: function (t, e) {
            var i;
            "" !== t && (i = this._parse(t), null !== i && (e || (i = this._adjustValue(i)), t = this._format(i))), this.element.val(t), this._refresh()
        },
        _destroy: function () {
            this.element.prop("disabled", !1).removeAttr("autocomplete role aria-valuemin aria-valuemax aria-valuenow"), this.uiSpinner.replaceWith(this.element)
        },
        stepUp: r(function (t) {
            this._stepUp(t)
        }),
        _stepUp: function (t) {
            this._start() && (this._spin((t || 1) * this.options.step), this._stop())
        },
        stepDown: r(function (t) {
            this._stepDown(t)
        }),
        _stepDown: function (t) {
            this._start() && (this._spin((t || 1) * -this.options.step), this._stop())
        },
        pageUp: r(function (t) {
            this._stepUp((t || 1) * this.options.page)
        }),
        pageDown: r(function (t) {
            this._stepDown((t || 1) * this.options.page)
        }),
        value: function (t) {
            return arguments.length ? (r(this._value).call(this, t), void 0) : this._parse(this.element.val())
        },
        widget: function () {
            return this.uiSpinner
        }
    }), t.uiBackCompat !== !1 && t.widget("ui.spinner", t.ui.spinner, {
        _enhance: function () {
            this.uiSpinner = this.element.attr("autocomplete", "off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml())
        }, _uiSpinnerHtml: function () {
            return "<span>"
        }, _buttonHtml: function () {
            return "<a></a><a></a>"
        }
    }), t.ui.spinner, t.widget("ui.tabs", {
        version: "1.12.1",
        delay: 300,
        options: {
            active: null,
            classes: {
                "ui-tabs": "ui-corner-all",
                "ui-tabs-nav": "ui-corner-all",
                "ui-tabs-panel": "ui-corner-bottom",
                "ui-tabs-tab": "ui-corner-top"
            },
            collapsible: !1,
            event: "click",
            heightStyle: "content",
            hide: null,
            show: null,
            activate: null,
            beforeActivate: null,
            beforeLoad: null,
            load: null
        },
        _isLocal: function () {
            var t = /#.*$/;
            return function (e) {
                var i, s;
                i = e.href.replace(t, ""), s = location.href.replace(t, "");
                try {
                    i = decodeURIComponent(i)
                } catch (n) {
                }
                try {
                    s = decodeURIComponent(s)
                } catch (n) {
                }
                return e.hash.length > 1 && i === s
            }
        }(),
        _create: function () {
            var e = this, i = this.options;
            this.running = !1, this._addClass("ui-tabs", "ui-widget ui-widget-content"), this._toggleClass("ui-tabs-collapsible", null, i.collapsible), this._processTabs(), i.active = this._initialActive(), t.isArray(i.disabled) && (i.disabled = t.unique(i.disabled.concat(t.map(this.tabs.filter(".ui-state-disabled"), function (t) {
                return e.tabs.index(t)
            }))).sort()), this.active = this.options.active !== !1 && this.anchors.length ? this._findActive(i.active) : t(), this._refresh(), this.active.length && this.load(i.active)
        },
        _initialActive: function () {
            var e = this.options.active, i = this.options.collapsible, s = location.hash.substring(1);
            return null === e && (s && this.tabs.each(function (i, n) {
                return t(n).attr("aria-controls") === s ? (e = i, !1) : void 0
            }), null === e && (e = this.tabs.index(this.tabs.filter(".ui-tabs-active"))), (null === e || -1 === e) && (e = this.tabs.length ? 0 : !1)), e !== !1 && (e = this.tabs.index(this.tabs.eq(e)), -1 === e && (e = i ? !1 : 0)), !i && e === !1 && this.anchors.length && (e = 0), e
        },
        _getCreateEventData: function () {
            return {tab: this.active, panel: this.active.length ? this._getPanelForTab(this.active) : t()}
        },
        _tabKeydown: function (e) {
            var i = t(t.ui.safeActiveElement(this.document[0])).closest("li"), s = this.tabs.index(i), n = !0;
            if (!this._handlePageNav(e)) {
                switch (e.keyCode) {
                    case t.ui.keyCode.RIGHT:
                    case t.ui.keyCode.DOWN:
                        s++;
                        break;
                    case t.ui.keyCode.UP:
                    case t.ui.keyCode.LEFT:
                        n = !1, s--;
                        break;
                    case t.ui.keyCode.END:
                        s = this.anchors.length - 1;
                        break;
                    case t.ui.keyCode.HOME:
                        s = 0;
                        break;
                    case t.ui.keyCode.SPACE:
                        return e.preventDefault(), clearTimeout(this.activating), this._activate(s), void 0;
                    case t.ui.keyCode.ENTER:
                        return e.preventDefault(), clearTimeout(this.activating), this._activate(s === this.options.active ? !1 : s), void 0;
                    default:
                        return
                }
                e.preventDefault(), clearTimeout(this.activating), s = this._focusNextTab(s, n), e.ctrlKey || e.metaKey || (i.attr("aria-selected", "false"), this.tabs.eq(s).attr("aria-selected", "true"), this.activating = this._delay(function () {
                    this.option("active", s)
                }, this.delay))
            }
        },
        _panelKeydown: function (e) {
            this._handlePageNav(e) || e.ctrlKey && e.keyCode === t.ui.keyCode.UP && (e.preventDefault(), this.active.trigger("focus"))
        },
        _handlePageNav: function (e) {
            return e.altKey && e.keyCode === t.ui.keyCode.PAGE_UP ? (this._activate(this._focusNextTab(this.options.active - 1, !1)), !0) : e.altKey && e.keyCode === t.ui.keyCode.PAGE_DOWN ? (this._activate(this._focusNextTab(this.options.active + 1, !0)), !0) : void 0
        },
        _findNextTab: function (e, i) {
            function s() {
                return e > n && (e = 0), 0 > e && (e = n), e
            }

            for (var n = this.tabs.length - 1; -1 !== t.inArray(s(), this.options.disabled);) e = i ? e + 1 : e - 1;
            return e
        },
        _focusNextTab: function (t, e) {
            return t = this._findNextTab(t, e), this.tabs.eq(t).trigger("focus"), t
        },
        _setOption: function (t, e) {
            return "active" === t ? (this._activate(e), void 0) : (this._super(t, e), "collapsible" === t && (this._toggleClass("ui-tabs-collapsible", null, e), e || this.options.active !== !1 || this._activate(0)), "event" === t && this._setupEvents(e), "heightStyle" === t && this._setupHeightStyle(e), void 0)
        },
        _sanitizeSelector: function (t) {
            return t ? t.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g, "\\$&") : ""
        },
        refresh: function () {
            var e = this.options, i = this.tablist.children(":has(a[href])");
            e.disabled = t.map(i.filter(".ui-state-disabled"), function (t) {
                return i.index(t)
            }), this._processTabs(), e.active !== !1 && this.anchors.length ? this.active.length && !t.contains(this.tablist[0], this.active[0]) ? this.tabs.length === e.disabled.length ? (e.active = !1, this.active = t()) : this._activate(this._findNextTab(Math.max(0, e.active - 1), !1)) : e.active = this.tabs.index(this.active) : (e.active = !1, this.active = t()), this._refresh()
        },
        _refresh: function () {
            this._setOptionDisabled(this.options.disabled), this._setupEvents(this.options.event), this._setupHeightStyle(this.options.heightStyle), this.tabs.not(this.active).attr({
                "aria-selected": "false",
                "aria-expanded": "false",
                tabIndex: -1
            }), this.panels.not(this._getPanelForTab(this.active)).hide().attr({"aria-hidden": "true"}), this.active.length ? (this.active.attr({
                "aria-selected": "true",
                "aria-expanded": "true",
                tabIndex: 0
            }), this._addClass(this.active, "ui-tabs-active", "ui-state-active"), this._getPanelForTab(this.active).show().attr({"aria-hidden": "false"})) : this.tabs.eq(0).attr("tabIndex", 0)
        },
        _processTabs: function () {
            var e = this, i = this.tabs, s = this.anchors, n = this.panels;
            this.tablist = this._getList().attr("role", "tablist"), this._addClass(this.tablist, "ui-tabs-nav", "ui-helper-reset ui-helper-clearfix ui-widget-header"), this.tablist.on("mousedown" + this.eventNamespace, "> li", function (e) {
                t(this).is(".ui-state-disabled") && e.preventDefault()
            }).on("focus" + this.eventNamespace, ".ui-tabs-anchor", function () {
                t(this).closest("li").is(".ui-state-disabled") && this.blur()
            }), this.tabs = this.tablist.find("> li:has(a[href])").attr({
                role: "tab",
                tabIndex: -1
            }), this._addClass(this.tabs, "ui-tabs-tab", "ui-state-default"), this.anchors = this.tabs.map(function () {
                return t("a", this)[0]
            }).attr({
                role: "presentation",
                tabIndex: -1
            }), this._addClass(this.anchors, "ui-tabs-anchor"), this.panels = t(), this.anchors.each(function (i, s) {
                var n, o, a, r = t(s).uniqueId().attr("id"), l = t(s).closest("li"),
                    h = l.attr("aria-controls");
                e._isLocal(s) ? (n = s.hash, a = n.substring(1), o = e.element.find(e._sanitizeSelector(n))) : (a = l.attr("aria-controls") || t({}).uniqueId()[0].id, n = "#" + a, o = e.element.find(n), o.length || (o = e._createPanel(a), o.insertAfter(e.panels[i - 1] || e.tablist)), o.attr("aria-live", "polite")), o.length && (e.panels = e.panels.add(o)), h && l.data("ui-tabs-aria-controls", h), l.attr({
                    "aria-controls": a,
                    "aria-labelledby": r
                }), o.attr("aria-labelledby", r)
            }), this.panels.attr("role", "tabpanel"), this._addClass(this.panels, "ui-tabs-panel", "ui-widget-content"), i && (this._off(i.not(this.tabs)), this._off(s.not(this.anchors)), this._off(n.not(this.panels)))
        },
        _getList: function () {
            return this.tablist || this.element.find("ol, ul").eq(0)
        },
        _createPanel: function (e) {
            return t("<div>").attr("id", e).data("ui-tabs-destroy", !0)
        },
        _setOptionDisabled: function (e) {
            var i, s, n;
            for (t.isArray(e) && (e.length ? e.length === this.anchors.length && (e = !0) : e = !1), n = 0; s = this.tabs[n]; n++) i = t(s), e === !0 || -1 !== t.inArray(n, e) ? (i.attr("aria-disabled", "true"), this._addClass(i, null, "ui-state-disabled")) : (i.removeAttr("aria-disabled"), this._removeClass(i, null, "ui-state-disabled"));
            this.options.disabled = e, this._toggleClass(this.widget(), this.widgetFullName + "-disabled", null, e === !0)
        },
        _setupEvents: function (e) {
            var i = {};
            e && t.each(e.split(" "), function (t, e) {
                i[e] = "_eventHandler"
            }), this._off(this.anchors.add(this.tabs).add(this.panels)), this._on(!0, this.anchors, {
                click: function (t) {
                    t.preventDefault()
                }
            }), this._on(this.anchors, i), this._on(this.tabs, {keydown: "_tabKeydown"}), this._on(this.panels, {keydown: "_panelKeydown"}), this._focusable(this.tabs), this._hoverable(this.tabs)
        },
        _setupHeightStyle: function (e) {
            var i, s = this.element.parent();
            "fill" === e ? (i = s.height(), i -= this.element.outerHeight() - this.element.height(), this.element.siblings(":visible").each(function () {
                var e = t(this), s = e.css("position");
                "absolute" !== s && "fixed" !== s && (i -= e.outerHeight(!0))
            }), this.element.children().not(this.panels).each(function () {
                i -= t(this).outerHeight(!0)
            }), this.panels.each(function () {
                t(this).height(Math.max(0, i - t(this).innerHeight() + t(this).height()))
            }).css("overflow", "auto")) : "auto" === e && (i = 0, this.panels.each(function () {
                i = Math.max(i, t(this).height("").height())
            }).height(i))
        },
        _eventHandler: function (e) {
            var i = this.options, s = this.active, n = t(e.currentTarget), o = n.closest("li"),
                a = o[0] === s[0], r = a && i.collapsible, l = r ? t() : this._getPanelForTab(o),
                h = s.length ? this._getPanelForTab(s) : t(),
                c = {oldTab: s, oldPanel: h, newTab: r ? t() : o, newPanel: l};
            e.preventDefault(), o.hasClass("ui-state-disabled") || o.hasClass("ui-tabs-loading") || this.running || a && !i.collapsible || this._trigger("beforeActivate", e, c) === !1 || (i.active = r ? !1 : this.tabs.index(o), this.active = a ? t() : o, this.xhr && this.xhr.abort(), h.length || l.length || t.error("jQuery UI Tabs: Mismatching fragment identifier."), l.length && this.load(this.tabs.index(o), e), this._toggle(e, c))
        },
        _toggle: function (e, i) {
            function s() {
                o.running = !1, o._trigger("activate", e, i)
            }

            function n() {
                o._addClass(i.newTab.closest("li"), "ui-tabs-active", "ui-state-active"), a.length && o.options.show ? o._show(a, o.options.show, s) : (a.show(), s())
            }

            var o = this, a = i.newPanel, r = i.oldPanel;
            this.running = !0, r.length && this.options.hide ? this._hide(r, this.options.hide, function () {
                o._removeClass(i.oldTab.closest("li"), "ui-tabs-active", "ui-state-active"), n()
            }) : (this._removeClass(i.oldTab.closest("li"), "ui-tabs-active", "ui-state-active"), r.hide(), n()), r.attr("aria-hidden", "true"), i.oldTab.attr({
                "aria-selected": "false",
                "aria-expanded": "false"
            }), a.length && r.length ? i.oldTab.attr("tabIndex", -1) : a.length && this.tabs.filter(function () {
                return 0 === t(this).attr("tabIndex")
            }).attr("tabIndex", -1), a.attr("aria-hidden", "false"), i.newTab.attr({
                "aria-selected": "true",
                "aria-expanded": "true",
                tabIndex: 0
            })
        },
        _activate: function (e) {
            var i, s = this._findActive(e);
            s[0] !== this.active[0] && (s.length || (s = this.active), i = s.find(".ui-tabs-anchor")[0], this._eventHandler({
                target: i,
                currentTarget: i,
                preventDefault: t.noop
            }))
        },
        _findActive: function (e) {
            return e === !1 ? t() : this.tabs.eq(e)
        },
        _getIndex: function (e) {
            return "string" == typeof e && (e = this.anchors.index(this.anchors.filter("[href$='" + t.ui.escapeSelector(e) + "']"))), e
        },
        _destroy: function () {
            this.xhr && this.xhr.abort(), this.tablist.removeAttr("role").off(this.eventNamespace), this.anchors.removeAttr("role tabIndex").removeUniqueId(), this.tabs.add(this.panels).each(function () {
                t.data(this, "ui-tabs-destroy") ? t(this).remove() : t(this).removeAttr("role tabIndex aria-live aria-busy aria-selected aria-labelledby aria-hidden aria-expanded")
            }), this.tabs.each(function () {
                var e = t(this), i = e.data("ui-tabs-aria-controls");
                i ? e.attr("aria-controls", i).removeData("ui-tabs-aria-controls") : e.removeAttr("aria-controls")
            }), this.panels.show(), "content" !== this.options.heightStyle && this.panels.css("height", "")
        },
        enable: function (e) {
            var i = this.options.disabled;
            i !== !1 && (void 0 === e ? i = !1 : (e = this._getIndex(e), i = t.isArray(i) ? t.map(i, function (t) {
                return t !== e ? t : null
            }) : t.map(this.tabs, function (t, i) {
                return i !== e ? i : null
            })), this._setOptionDisabled(i))
        },
        disable: function (e) {
            var i = this.options.disabled;
            if (i !== !0) {
                if (void 0 === e) i = !0; else {
                    if (e = this._getIndex(e), -1 !== t.inArray(e, i)) return;
                    i = t.isArray(i) ? t.merge([e], i).sort() : [e]
                }
                this._setOptionDisabled(i)
            }
        },
        load: function (e, i) {
            e = this._getIndex(e);
            var s = this, n = this.tabs.eq(e), o = n.find(".ui-tabs-anchor"), a = this._getPanelForTab(n),
                r = {tab: n, panel: a}, l = function (t, e) {
                    "abort" === e && s.panels.stop(!1, !0), s._removeClass(n, "ui-tabs-loading"), a.removeAttr("aria-busy"), t === s.xhr && delete s.xhr
                };
            this._isLocal(o[0]) || (this.xhr = t.ajax(this._ajaxSettings(o, i, r)), this.xhr && "canceled" !== this.xhr.statusText && (this._addClass(n, "ui-tabs-loading"), a.attr("aria-busy", "true"), this.xhr.done(function (t, e, n) {
                setTimeout(function () {
                    a.html(t), s._trigger("load", i, r), l(n, e)
                }, 1)
            }).fail(function (t, e) {
                setTimeout(function () {
                    l(t, e)
                }, 1)
            })))
        },
        _ajaxSettings: function (e, i, s) {
            var n = this;
            return {
                url: e.attr("href").replace(/#.*$/, ""), beforeSend: function (e, o) {
                    return n._trigger("beforeLoad", i, t.extend({jqXHR: e, ajaxSettings: o}, s))
                }
            }
        },
        _getPanelForTab: function (e) {
            var i = t(e).attr("aria-controls");
            return this.element.find(this._sanitizeSelector("#" + i))
        }
    }), t.uiBackCompat !== !1 && t.widget("ui.tabs", t.ui.tabs, {
        _processTabs: function () {
            this._superApply(arguments), this._addClass(this.tabs, "ui-tab")
        }
    }), t.ui.tabs, t.widget("ui.tooltip", {
        version: "1.12.1",
        options: {
            classes: {"ui-tooltip": "ui-corner-all ui-widget-shadow"},
            content: function () {
                var e = t(this).attr("title") || "";
                return t("<a>").text(e).html()
            },
            hide: !0,
            items: "[title]:not([disabled])",
            position: {my: "left top+15", at: "left bottom", collision: "flipfit flip"},
            show: !0,
            track: !1,
            close: null,
            open: null
        },
        _addDescribedBy: function (e, i) {
            var s = (e.attr("aria-describedby") || "").split(/\s+/);
            s.push(i), e.data("ui-tooltip-id", i).attr("aria-describedby", t.trim(s.join(" ")))
        },
        _removeDescribedBy: function (e) {
            var i = e.data("ui-tooltip-id"), s = (e.attr("aria-describedby") || "").split(/\s+/),
                n = t.inArray(i, s);
            -1 !== n && s.splice(n, 1), e.removeData("ui-tooltip-id"), s = t.trim(s.join(" ")), s ? e.attr("aria-describedby", s) : e.removeAttr("aria-describedby")
        },
        _create: function () {
            this._on({
                mouseover: "open",
                focusin: "open"
            }), this.tooltips = {}, this.parents = {}, this.liveRegion = t("<div>").attr({
                role: "log",
                "aria-live": "assertive",
                "aria-relevant": "additions"
            }).appendTo(this.document[0].body), this._addClass(this.liveRegion, null, "ui-helper-hidden-accessible"), this.disabledTitles = t([])
        },
        _setOption: function (e, i) {
            var s = this;
            this._super(e, i), "content" === e && t.each(this.tooltips, function (t, e) {
                s._updateContent(e.element)
            })
        },
        _setOptionDisabled: function (t) {
            this[t ? "_disable" : "_enable"]()
        },
        _disable: function () {
            var e = this;
            t.each(this.tooltips, function (i, s) {
                var n = t.Event("blur");
                n.target = n.currentTarget = s.element[0], e.close(n, !0)
            }), this.disabledTitles = this.disabledTitles.add(this.element.find(this.options.items).addBack().filter(function () {
                var e = t(this);
                return e.is("[title]") ? e.data("ui-tooltip-title", e.attr("title")).removeAttr("title") : void 0
            }))
        },
        _enable: function () {
            this.disabledTitles.each(function () {
                var e = t(this);
                e.data("ui-tooltip-title") && e.attr("title", e.data("ui-tooltip-title"))
            }), this.disabledTitles = t([])
        },
        open: function (e) {
            var i = this, s = t(e ? e.target : this.element).closest(this.options.items);
            s.length && !s.data("ui-tooltip-id") && (s.attr("title") && s.data("ui-tooltip-title", s.attr("title")), s.data("ui-tooltip-open", !0), e && "mouseover" === e.type && s.parents().each(function () {
                var e, s = t(this);
                s.data("ui-tooltip-open") && (e = t.Event("blur"), e.target = e.currentTarget = this, i.close(e, !0)), s.attr("title") && (s.uniqueId(), i.parents[this.id] = {
                    element: this,
                    title: s.attr("title")
                }, s.attr("title", ""))
            }), this._registerCloseHandlers(e, s), this._updateContent(s, e))
        },
        _updateContent: function (t, e) {
            var i, s = this.options.content, n = this, o = e ? e.type : null;
            return "string" == typeof s || s.nodeType || s.jquery ? this._open(e, t, s) : (i = s.call(t[0], function (i) {
                n._delay(function () {
                    t.data("ui-tooltip-open") && (e && (e.type = o), this._open(e, t, i))
                })
            }), i && this._open(e, t, i), void 0)
        },
        _open: function (e, i, s) {
            function n(t) {
                h.of = t, a.is(":hidden") || a.position(h)
            }

            var o, a, r, l, h = t.extend({}, this.options.position);
            if (s) {
                if (o = this._find(i)) return o.tooltip.find(".ui-tooltip-content").html(s), void 0;
                i.is("[title]") && (e && "mouseover" === e.type ? i.attr("title", "") : i.removeAttr("title")), o = this._tooltip(i), a = o.tooltip, this._addDescribedBy(i, a.attr("id")), a.find(".ui-tooltip-content").html(s), this.liveRegion.children().hide(), l = t("<div>").html(a.find(".ui-tooltip-content").html()), l.removeAttr("name").find("[name]").removeAttr("name"), l.removeAttr("id").find("[id]").removeAttr("id"), l.appendTo(this.liveRegion), this.options.track && e && /^mouse/.test(e.type) ? (this._on(this.document, {mousemove: n}), n(e)) : a.position(t.extend({of: i}, this.options.position)), a.hide(), this._show(a, this.options.show), this.options.track && this.options.show && this.options.show.delay && (r = this.delayedShow = setInterval(function () {
                    a.is(":visible") && (n(h.of), clearInterval(r))
                }, t.fx.interval)), this._trigger("open", e, {tooltip: a})
            }
        },
        _registerCloseHandlers: function (e, i) {
            var s = {
                keyup: function (e) {
                    if (e.keyCode === t.ui.keyCode.ESCAPE) {
                        var s = t.Event(e);
                        s.currentTarget = i[0], this.close(s, !0)
                    }
                }
            };
            i[0] !== this.element[0] && (s.remove = function () {
                this._removeTooltip(this._find(i).tooltip)
            }), e && "mouseover" !== e.type || (s.mouseleave = "close"), e && "focusin" !== e.type || (s.focusout = "close"), this._on(!0, i, s)
        },
        close: function (e) {
            var i, s = this, n = t(e ? e.currentTarget : this.element), o = this._find(n);
            return o ? (i = o.tooltip, o.closing || (clearInterval(this.delayedShow), n.data("ui-tooltip-title") && !n.attr("title") && n.attr("title", n.data("ui-tooltip-title")), this._removeDescribedBy(n), o.hiding = !0, i.stop(!0), this._hide(i, this.options.hide, function () {
                s._removeTooltip(t(this))
            }), n.removeData("ui-tooltip-open"), this._off(n, "mouseleave focusout keyup"), n[0] !== this.element[0] && this._off(n, "remove"), this._off(this.document, "mousemove"), e && "mouseleave" === e.type && t.each(this.parents, function (e, i) {
                t(i.element).attr("title", i.title), delete s.parents[e]
            }), o.closing = !0, this._trigger("close", e, {tooltip: i}), o.hiding || (o.closing = !1)), void 0) : (n.removeData("ui-tooltip-open"), void 0)
        },
        _tooltip: function (e) {
            var i = t("<div>").attr("role", "tooltip"), s = t("<div>").appendTo(i), n = i.uniqueId().attr("id");
            return this._addClass(s, "ui-tooltip-content"), this._addClass(i, "ui-tooltip", "ui-widget ui-widget-content"), i.appendTo(this._appendTo(e)), this.tooltips[n] = {
                element: e,
                tooltip: i
            }
        },
        _find: function (t) {
            var e = t.data("ui-tooltip-id");
            return e ? this.tooltips[e] : null
        },
        _removeTooltip: function (t) {
            t.remove(), delete this.tooltips[t.attr("id")]
        },
        _appendTo: function (t) {
            var e = t.closest(".ui-front, dialog");
            return e.length || (e = this.document[0].body), e
        },
        _destroy: function () {
            var e = this;
            t.each(this.tooltips, function (i, s) {
                var n = t.Event("blur"), o = s.element;
                n.target = n.currentTarget = o[0], e.close(n, !0), t("#" + i).remove(), o.data("ui-tooltip-title") && (o.attr("title") || o.attr("title", o.data("ui-tooltip-title")), o.removeData("ui-tooltip-title"))
            }), this.liveRegion.remove()
        }
    }), t.uiBackCompat !== !1 && t.widget("ui.tooltip", t.ui.tooltip, {
        options: {tooltipClass: null},
        _tooltip: function () {
            var t = this._superApply(arguments);
            return this.options.tooltipClass && t.tooltip.addClass(this.options.tooltipClass), t
        }
    }), t.ui.tooltip;
    var f = "ui-effects-", g = "ui-effects-style", m = "ui-effects-animated", _ = t;
    t.effects = {effect: {}}, function (t, e) {
        function i(t, e, i) {
            var s = u[e.type] || {};
            return null == t ? i || !e.def ? null : e.def : (t = s.floor ? ~~t : parseFloat(t), isNaN(t) ? e.def : s.mod ? (t + s.mod) % s.mod : 0 > t ? 0 : t > s.max ? s.max : t)
        }

        function s(i) {
            var s = h(), n = s._rgba = [];
            return i = i.toLowerCase(), f(l, function (t, o) {
                var a, r = o.re.exec(i), l = r && o.parse(r), h = o.space || "rgba";
                return l ? (a = s[h](l), s[c[h].cache] = a[c[h].cache], n = s._rgba = a._rgba, !1) : e
            }), n.length ? ("0,0,0,0" === n.join() && t.extend(n, o.transparent), s) : o[i]
        }

        function n(t, e, i) {
            return i = (i + 1) % 1, 1 > 6 * i ? t + 6 * (e - t) * i : 1 > 2 * i ? e : 2 > 3 * i ? t + 6 * (e - t) * (2 / 3 - i) : t
        }

        var o,
            a = "backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",
            r = /^([\-+])=\s*(\d+\.?\d*)/, l = [{
                re: /rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function (t) {
                    return [t[1], t[2], t[3], t[4]]
                }
            }, {
                re: /rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                parse: function (t) {
                    return [2.55 * t[1], 2.55 * t[2], 2.55 * t[3], t[4]]
                }
            }, {
                re: /#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/, parse: function (t) {
                    return [parseInt(t[1], 16), parseInt(t[2], 16), parseInt(t[3], 16)]
                }
            }, {
                re: /#([a-f0-9])([a-f0-9])([a-f0-9])/, parse: function (t) {
                    return [parseInt(t[1] + t[1], 16), parseInt(t[2] + t[2], 16), parseInt(t[3] + t[3], 16)]
                }
            }, {
                re: /hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,
                space: "hsla",
                parse: function (t) {
                    return [t[1], t[2] / 100, t[3] / 100, t[4]]
                }
            }], h = t.Color = function (e, i, s, n) {
                return new t.Color.fn.parse(e, i, s, n)
            }, c = {
                rgba: {
                    props: {
                        red: {idx: 0, type: "byte"},
                        green: {idx: 1, type: "byte"},
                        blue: {idx: 2, type: "byte"}
                    }
                },
                hsla: {
                    props: {
                        hue: {idx: 0, type: "degrees"},
                        saturation: {idx: 1, type: "percent"},
                        lightness: {idx: 2, type: "percent"}
                    }
                }
            }, u = {"byte": {floor: !0, max: 255}, percent: {max: 1}, degrees: {mod: 360, floor: !0}},
            d = h.support = {}, p = t("<p>")[0], f = t.each;
        p.style.cssText = "background-color:rgba(1,1,1,.5)", d.rgba = p.style.backgroundColor.indexOf("rgba") > -1, f(c, function (t, e) {
            e.cache = "_" + t, e.props.alpha = {idx: 3, type: "percent", def: 1}
        }), h.fn = t.extend(h.prototype, {
            parse: function (n, a, r, l) {
                if (n === e) return this._rgba = [null, null, null, null], this;
                (n.jquery || n.nodeType) && (n = t(n).css(a), a = e);
                var u = this, d = t.type(n), p = this._rgba = [];
                return a !== e && (n = [n, a, r, l], d = "array"), "string" === d ? this.parse(s(n) || o._default) : "array" === d ? (f(c.rgba.props, function (t, e) {
                    p[e.idx] = i(n[e.idx], e)
                }), this) : "object" === d ? (n instanceof h ? f(c, function (t, e) {
                    n[e.cache] && (u[e.cache] = n[e.cache].slice())
                }) : f(c, function (e, s) {
                    var o = s.cache;
                    f(s.props, function (t, e) {
                        if (!u[o] && s.to) {
                            if ("alpha" === t || null == n[t]) return;
                            u[o] = s.to(u._rgba)
                        }
                        u[o][e.idx] = i(n[t], e, !0)
                    }), u[o] && 0 > t.inArray(null, u[o].slice(0, 3)) && (u[o][3] = 1, s.from && (u._rgba = s.from(u[o])))
                }), this) : e
            }, is: function (t) {
                var i = h(t), s = !0, n = this;
                return f(c, function (t, o) {
                    var a, r = i[o.cache];
                    return r && (a = n[o.cache] || o.to && o.to(n._rgba) || [], f(o.props, function (t, i) {
                        return null != r[i.idx] ? s = r[i.idx] === a[i.idx] : e
                    })), s
                }), s
            }, _space: function () {
                var t = [], e = this;
                return f(c, function (i, s) {
                    e[s.cache] && t.push(i)
                }), t.pop()
            }, transition: function (t, e) {
                var s = h(t), n = s._space(), o = c[n], a = 0 === this.alpha() ? h("transparent") : this,
                    r = a[o.cache] || o.to(a._rgba), l = r.slice();
                return s = s[o.cache], f(o.props, function (t, n) {
                    var o = n.idx, a = r[o], h = s[o], c = u[n.type] || {};
                    null !== h && (null === a ? l[o] = h : (c.mod && (h - a > c.mod / 2 ? a += c.mod : a - h > c.mod / 2 && (a -= c.mod)), l[o] = i((h - a) * e + a, n)))
                }), this[n](l)
            }, blend: function (e) {
                if (1 === this._rgba[3]) return this;
                var i = this._rgba.slice(), s = i.pop(), n = h(e)._rgba;
                return h(t.map(i, function (t, e) {
                    return (1 - s) * n[e] + s * t
                }))
            }, toRgbaString: function () {
                var e = "rgba(", i = t.map(this._rgba, function (t, e) {
                    return null == t ? e > 2 ? 1 : 0 : t
                });
                return 1 === i[3] && (i.pop(), e = "rgb("), e + i.join() + ")"
            }, toHslaString: function () {
                var e = "hsla(", i = t.map(this.hsla(), function (t, e) {
                    return null == t && (t = e > 2 ? 1 : 0), e && 3 > e && (t = Math.round(100 * t) + "%"), t
                });
                return 1 === i[3] && (i.pop(), e = "hsl("), e + i.join() + ")"
            }, toHexString: function (e) {
                var i = this._rgba.slice(), s = i.pop();
                return e && i.push(~~(255 * s)), "#" + t.map(i, function (t) {
                    return t = (t || 0).toString(16), 1 === t.length ? "0" + t : t
                }).join("")
            }, toString: function () {
                return 0 === this._rgba[3] ? "transparent" : this.toRgbaString()
            }
        }), h.fn.parse.prototype = h.fn, c.hsla.to = function (t) {
            if (null == t[0] || null == t[1] || null == t[2]) return [null, null, null, t[3]];
            var e, i, s = t[0] / 255, n = t[1] / 255, o = t[2] / 255, a = t[3], r = Math.max(s, n, o),
                l = Math.min(s, n, o), h = r - l, c = r + l, u = .5 * c;
            return e = l === r ? 0 : s === r ? 60 * (n - o) / h + 360 : n === r ? 60 * (o - s) / h + 120 : 60 * (s - n) / h + 240, i = 0 === h ? 0 : .5 >= u ? h / c : h / (2 - c), [Math.round(e) % 360, i, u, null == a ? 1 : a]
        }, c.hsla.from = function (t) {
            if (null == t[0] || null == t[1] || null == t[2]) return [null, null, null, t[3]];
            var e = t[0] / 360, i = t[1], s = t[2], o = t[3], a = .5 >= s ? s * (1 + i) : s + i - s * i,
                r = 2 * s - a;
            return [Math.round(255 * n(r, a, e + 1 / 3)), Math.round(255 * n(r, a, e)), Math.round(255 * n(r, a, e - 1 / 3)), o]
        }, f(c, function (s, n) {
            var o = n.props, a = n.cache, l = n.to, c = n.from;
            h.fn[s] = function (s) {
                if (l && !this[a] && (this[a] = l(this._rgba)), s === e) return this[a].slice();
                var n, r = t.type(s), u = "array" === r || "object" === r ? s : arguments, d = this[a].slice();
                return f(o, function (t, e) {
                    var s = u["object" === r ? t : e.idx];
                    null == s && (s = d[e.idx]), d[e.idx] = i(s, e)
                }), c ? (n = h(c(d)), n[a] = d, n) : h(d)
            }, f(o, function (e, i) {
                h.fn[e] || (h.fn[e] = function (n) {
                    var o, a = t.type(n), l = "alpha" === e ? this._hsla ? "hsla" : "rgba" : s, h = this[l](),
                        c = h[i.idx];
                    return "undefined" === a ? c : ("function" === a && (n = n.call(this, c), a = t.type(n)), null == n && i.empty ? this : ("string" === a && (o = r.exec(n), o && (n = c + parseFloat(o[2]) * ("+" === o[1] ? 1 : -1))), h[i.idx] = n, this[l](h)))
                })
            })
        }), h.hook = function (e) {
            var i = e.split(" ");
            f(i, function (e, i) {
                t.cssHooks[i] = {
                    set: function (e, n) {
                        var o, a, r = "";
                        if ("transparent" !== n && ("string" !== t.type(n) || (o = s(n)))) {
                            if (n = h(o || n), !d.rgba && 1 !== n._rgba[3]) {
                                for (a = "backgroundColor" === i ? e.parentNode : e; ("" === r || "transparent" === r) && a && a.style;) try {
                                    r = t.css(a, "backgroundColor"), a = a.parentNode
                                } catch (l) {
                                }
                                n = n.blend(r && "transparent" !== r ? r : "_default")
                            }
                            n = n.toRgbaString()
                        }
                        try {
                            e.style[i] = n
                        } catch (l) {
                        }
                    }
                }, t.fx.step[i] = function (e) {
                    e.colorInit || (e.start = h(e.elem, i), e.end = h(e.end), e.colorInit = !0), t.cssHooks[i].set(e.elem, e.start.transition(e.end, e.pos))
                }
            })
        }, h.hook(a), t.cssHooks.borderColor = {
            expand: function (t) {
                var e = {};
                return f(["Top", "Right", "Bottom", "Left"], function (i, s) {
                    e["border" + s + "Color"] = t
                }), e
            }
        }, o = t.Color.names = {
            aqua: "#00ffff",
            black: "#000000",
            blue: "#0000ff",
            fuchsia: "#ff00ff",
            gray: "#808080",
            green: "#008000",
            lime: "#00ff00",
            maroon: "#800000",
            navy: "#000080",
            olive: "#808000",
            purple: "#800080",
            red: "#ff0000",
            silver: "#c0c0c0",
            teal: "#008080",
            white: "#ffffff",
            yellow: "#ffff00",
            transparent: [null, null, null, 0],
            _default: "#ffffff"
        }
    }(_), function () {
        function e(e) {
            var i, s,
                n = e.ownerDocument.defaultView ? e.ownerDocument.defaultView.getComputedStyle(e, null) : e.currentStyle,
                o = {};
            if (n && n.length && n[0] && n[n[0]]) for (s = n.length; s--;) i = n[s], "string" == typeof n[i] && (o[t.camelCase(i)] = n[i]); else for (i in n) "string" == typeof n[i] && (o[i] = n[i]);
            return o
        }

        function i(e, i) {
            var s, o, a = {};
            for (s in i) o = i[s], e[s] !== o && (n[s] || (t.fx.step[s] || !isNaN(parseFloat(o))) && (a[s] = o));
            return a
        }

        var s = ["add", "remove", "toggle"], n = {
            border: 1,
            borderBottom: 1,
            borderColor: 1,
            borderLeft: 1,
            borderRight: 1,
            borderTop: 1,
            borderWidth: 1,
            margin: 1,
            padding: 1
        };
        t.each(["borderLeftStyle", "borderRightStyle", "borderBottomStyle", "borderTopStyle"], function (e, i) {
            t.fx.step[i] = function (t) {
                ("none" !== t.end && !t.setAttr || 1 === t.pos && !t.setAttr) && (_.style(t.elem, i, t.end), t.setAttr = !0)
            }
        }), t.fn.addBack || (t.fn.addBack = function (t) {
            return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
        }), t.effects.animateClass = function (n, o, a, r) {
            var l = t.speed(o, a, r);
            return this.queue(function () {
                var o, a = t(this), r = a.attr("class") || "", h = l.children ? a.find("*").addBack() : a;
                h = h.map(function () {
                    var i = t(this);
                    return {el: i, start: e(this)}
                }), o = function () {
                    t.each(s, function (t, e) {
                        n[e] && a[e + "Class"](n[e])
                    })
                }, o(), h = h.map(function () {
                    return this.end = e(this.el[0]), this.diff = i(this.start, this.end), this
                }), a.attr("class", r), h = h.map(function () {
                    var e = this, i = t.Deferred(), s = t.extend({}, l, {
                        queue: !1, complete: function () {
                            i.resolve(e)
                        }
                    });
                    return this.el.animate(this.diff, s), i.promise()
                }), t.when.apply(t, h.get()).done(function () {
                    o(), t.each(arguments, function () {
                        var e = this.el;
                        t.each(this.diff, function (t) {
                            e.css(t, "")
                        })
                    }), l.complete.call(a[0])
                })
            })
        }, t.fn.extend({
            addClass: function (e) {
                return function (i, s, n, o) {
                    return s ? t.effects.animateClass.call(this, {add: i}, s, n, o) : e.apply(this, arguments)
                }
            }(t.fn.addClass), removeClass: function (e) {
                return function (i, s, n, o) {
                    return arguments.length > 1 ? t.effects.animateClass.call(this, {remove: i}, s, n, o) : e.apply(this, arguments)
                }
            }(t.fn.removeClass), toggleClass: function (e) {
                return function (i, s, n, o, a) {
                    return "boolean" == typeof s || void 0 === s ? n ? t.effects.animateClass.call(this, s ? {add: i} : {remove: i}, n, o, a) : e.apply(this, arguments) : t.effects.animateClass.call(this, {toggle: i}, s, n, o)
                }
            }(t.fn.toggleClass), switchClass: function (e, i, s, n, o) {
                return t.effects.animateClass.call(this, {add: i, remove: e}, s, n, o)
            }
        })
    }(), function () {
        function e(e, i, s, n) {
            return t.isPlainObject(e) && (i = e, e = e.effect), e = {effect: e}, null == i && (i = {}), t.isFunction(i) && (n = i, s = null, i = {}), ("number" == typeof i || t.fx.speeds[i]) && (n = s, s = i, i = {}), t.isFunction(s) && (n = s, s = null), i && t.extend(e, i), s = s || i.duration, e.duration = t.fx.off ? 0 : "number" == typeof s ? s : s in t.fx.speeds ? t.fx.speeds[s] : t.fx.speeds._default, e.complete = n || i.complete, e
        }

        function i(e) {
            return !e || "number" == typeof e || t.fx.speeds[e] ? !0 : "string" != typeof e || t.effects.effect[e] ? t.isFunction(e) ? !0 : "object" != typeof e || e.effect ? !1 : !0 : !0
        }

        function s(t, e) {
            var i = e.outerWidth(), s = e.outerHeight(),
                n = /^rect\((-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto),?\s*(-?\d*\.?\d*px|-?\d+%|auto)\)$/,
                o = n.exec(t) || ["", 0, i, s, 0];
            return {
                top: parseFloat(o[1]) || 0,
                right: "auto" === o[2] ? i : parseFloat(o[2]),
                bottom: "auto" === o[3] ? s : parseFloat(o[3]),
                left: parseFloat(o[4]) || 0
            }
        }

        t.expr && t.expr.filters && t.expr.filters.animated && (t.expr.filters.animated = function (e) {
            return function (i) {
                return !!t(i).data(m) || e(i)
            }
        }(t.expr.filters.animated)), t.uiBackCompat !== !1 && t.extend(t.effects, {
            save: function (t, e) {
                for (var i = 0, s = e.length; s > i; i++) null !== e[i] && t.data(f + e[i], t[0].style[e[i]])
            }, restore: function (t, e) {
                for (var i, s = 0, n = e.length; n > s; s++) null !== e[s] && (i = t.data(f + e[s]), t.css(e[s], i))
            }, setMode: function (t, e) {
                return "toggle" === e && (e = t.is(":hidden") ? "show" : "hide"), e
            }, createWrapper: function (e) {
                if (e.parent().is(".ui-effects-wrapper")) return e.parent();
                var i = {width: e.outerWidth(!0), height: e.outerHeight(!0), "float": e.css("float")},
                    s = t("<div></div>").addClass("ui-effects-wrapper").css({
                        fontSize: "100%",
                        background: "transparent",
                        border: "none",
                        margin: 0,
                        padding: 0
                    }), n = {width: e.width(), height: e.height()}, o = document.activeElement;
                try {
                    o.id
                } catch (a) {
                    o = document.body
                }
                return e.wrap(s), (e[0] === o || t.contains(e[0], o)) && t(o).trigger("focus"), s = e.parent(), "static" === e.css("position") ? (s.css({position: "relative"}), e.css({position: "relative"})) : (t.extend(i, {
                    position: e.css("position"),
                    zIndex: e.css("z-index")
                }), t.each(["top", "left", "bottom", "right"], function (t, s) {
                    i[s] = e.css(s), isNaN(parseInt(i[s], 10)) && (i[s] = "auto")
                }), e.css({
                    position: "relative",
                    top: 0,
                    left: 0,
                    right: "auto",
                    bottom: "auto"
                })), e.css(n), s.css(i).show()
            }, removeWrapper: function (e) {
                var i = document.activeElement;
                return e.parent().is(".ui-effects-wrapper") && (e.parent().replaceWith(e), (e[0] === i || t.contains(e[0], i)) && t(i).trigger("focus")), e
            }
        }), t.extend(t.effects, {
            version: "1.12.1", define: function (e, i, s) {
                return s || (s = i, i = "effect"), t.effects.effect[e] = s, t.effects.effect[e].mode = i, s
            }, scaledDimensions: function (t, e, i) {
                if (0 === e) return {height: 0, width: 0, outerHeight: 0, outerWidth: 0};
                var s = "horizontal" !== i ? (e || 100) / 100 : 1, n = "vertical" !== i ? (e || 100) / 100 : 1;
                return {
                    height: t.height() * n,
                    width: t.width() * s,
                    outerHeight: t.outerHeight() * n,
                    outerWidth: t.outerWidth() * s
                }
            }, clipToBox: function (t) {
                return {
                    width: t.clip.right - t.clip.left,
                    height: t.clip.bottom - t.clip.top,
                    left: t.clip.left,
                    top: t.clip.top
                }
            }, unshift: function (t, e, i) {
                var s = t.queue();
                e > 1 && s.splice.apply(s, [1, 0].concat(s.splice(e, i))), t.dequeue()
            }, saveStyle: function (t) {
                t.data(g, t[0].style.cssText)
            }, restoreStyle: function (t) {
                t[0].style.cssText = t.data(g) || "", t.removeData(g)
            }, mode: function (t, e) {
                var i = t.is(":hidden");
                return "toggle" === e && (e = i ? "show" : "hide"), (i ? "hide" === e : "show" === e) && (e = "none"), e
            }, getBaseline: function (t, e) {
                var i, s;
                switch (t[0]) {
                    case"top":
                        i = 0;
                        break;
                    case"middle":
                        i = .5;
                        break;
                    case"bottom":
                        i = 1;
                        break;
                    default:
                        i = t[0] / e.height
                }
                switch (t[1]) {
                    case"left":
                        s = 0;
                        break;
                    case"center":
                        s = .5;
                        break;
                    case"right":
                        s = 1;
                        break;
                    default:
                        s = t[1] / e.width
                }
                return {x: s, y: i}
            }, createPlaceholder: function (e) {
                var i, s = e.css("position"), n = e.position();
                return e.css({
                    marginTop: e.css("marginTop"),
                    marginBottom: e.css("marginBottom"),
                    marginLeft: e.css("marginLeft"),
                    marginRight: e.css("marginRight")
                }).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()), /^(static|relative)/.test(s) && (s = "absolute", i = t("<" + e[0].nodeName + ">").insertAfter(e).css({
                    display: /^(inline|ruby)/.test(e.css("display")) ? "inline-block" : "block",
                    visibility: "hidden",
                    marginTop: e.css("marginTop"),
                    marginBottom: e.css("marginBottom"),
                    marginLeft: e.css("marginLeft"),
                    marginRight: e.css("marginRight"),
                    "float": e.css("float")
                }).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()).addClass("ui-effects-placeholder"), e.data(f + "placeholder", i)), e.css({
                    position: s,
                    left: n.left,
                    top: n.top
                }), i
            }, removePlaceholder: function (t) {
                var e = f + "placeholder", i = t.data(e);
                i && (i.remove(), t.removeData(e))
            }, cleanUp: function (e) {
                t.effects.restoreStyle(e), t.effects.removePlaceholder(e)
            }, setTransition: function (e, i, s, n) {
                return n = n || {}, t.each(i, function (t, i) {
                    var o = e.cssUnit(i);
                    o[0] > 0 && (n[i] = o[0] * s + o[1])
                }), n
            }
        }), t.fn.extend({
            effect: function () {
                function i(e) {
                    function i() {
                        r.removeData(m), t.effects.cleanUp(r), "hide" === s.mode && r.hide(), a()
                    }

                    function a() {
                        t.isFunction(l) && l.call(r[0]), t.isFunction(e) && e()
                    }

                    var r = t(this);
                    s.mode = c.shift(), t.uiBackCompat === !1 || o ? "none" === s.mode ? (r[h](), a()) : n.call(r[0], s, i) : (r.is(":hidden") ? "hide" === h : "show" === h) ? (r[h](), a()) : n.call(r[0], s, a)
                }

                var s = e.apply(this, arguments), n = t.effects.effect[s.effect], o = n.mode, a = s.queue,
                    r = a || "fx", l = s.complete, h = s.mode, c = [], u = function (e) {
                        var i = t(this), s = t.effects.mode(i, h) || o;
                        i.data(m, !0), c.push(s), o && ("show" === s || s === o && "hide" === s) && i.show(), o && "none" === s || t.effects.saveStyle(i), t.isFunction(e) && e()
                    };
                return t.fx.off || !n ? h ? this[h](s.duration, l) : this.each(function () {
                    l && l.call(this)
                }) : a === !1 ? this.each(u).each(i) : this.queue(r, u).queue(r, i)
            }, show: function (t) {
                return function (s) {
                    if (i(s)) return t.apply(this, arguments);
                    var n = e.apply(this, arguments);
                    return n.mode = "show", this.effect.call(this, n)
                }
            }(t.fn.show), hide: function (t) {
                return function (s) {
                    if (i(s)) return t.apply(this, arguments);
                    var n = e.apply(this, arguments);
                    return n.mode = "hide", this.effect.call(this, n)
                }
            }(t.fn.hide), toggle: function (t) {
                return function (s) {
                    if (i(s) || "boolean" == typeof s) return t.apply(this, arguments);
                    var n = e.apply(this, arguments);
                    return n.mode = "toggle", this.effect.call(this, n)
                }
            }(t.fn.toggle), cssUnit: function (e) {
                var i = this.css(e), s = [];
                return t.each(["em", "px", "%", "pt"], function (t, e) {
                    i.indexOf(e) > 0 && (s = [parseFloat(i), e])
                }), s
            }, cssClip: function (t) {
                return t ? this.css("clip", "rect(" + t.top + "px " + t.right + "px " + t.bottom + "px " + t.left + "px)") : s(this.css("clip"), this)
            }, transfer: function (e, i) {
                var s = t(this), n = t(e.to), o = "fixed" === n.css("position"), a = t("body"),
                    r = o ? a.scrollTop() : 0, l = o ? a.scrollLeft() : 0, h = n.offset(),
                    c = {top: h.top - r, left: h.left - l, height: n.innerHeight(), width: n.innerWidth()},
                    u = s.offset(),
                    d = t("<div class='ui-effects-transfer'></div>").appendTo("body").addClass(e.className).css({
                        top: u.top - r,
                        left: u.left - l,
                        height: s.innerHeight(),
                        width: s.innerWidth(),
                        position: o ? "fixed" : "absolute"
                    }).animate(c, e.duration, e.easing, function () {
                        d.remove(), t.isFunction(i) && i()
                    })
            }
        }), t.fx.step.clip = function (e) {
            e.clipInit || (e.start = t(e.elem).cssClip(), "string" == typeof e.end && (e.end = s(e.end, e.elem)), e.clipInit = !0), t(e.elem).cssClip({
                top: e.pos * (e.end.top - e.start.top) + e.start.top,
                right: e.pos * (e.end.right - e.start.right) + e.start.right,
                bottom: e.pos * (e.end.bottom - e.start.bottom) + e.start.bottom,
                left: e.pos * (e.end.left - e.start.left) + e.start.left
            })
        }
    }(), function () {
        var e = {};
        t.each(["Quad", "Cubic", "Quart", "Quint", "Expo"], function (t, i) {
            e[i] = function (e) {
                return Math.pow(e, t + 2)
            }
        }), t.extend(e, {
            Sine: function (t) {
                return 1 - Math.cos(t * Math.PI / 2)
            }, Circ: function (t) {
                return 1 - Math.sqrt(1 - t * t)
            }, Elastic: function (t) {
                return 0 === t || 1 === t ? t : -Math.pow(2, 8 * (t - 1)) * Math.sin((80 * (t - 1) - 7.5) * Math.PI / 15)
            }, Back: function (t) {
                return t * t * (3 * t - 2)
            }, Bounce: function (t) {
                for (var e, i = 4; ((e = Math.pow(2, --i)) - 1) / 11 > t;) ;
                return 1 / Math.pow(4, 3 - i) - 7.5625 * Math.pow((3 * e - 2) / 22 - t, 2)
            }
        }), t.each(e, function (e, i) {
            t.easing["easeIn" + e] = i, t.easing["easeOut" + e] = function (t) {
                return 1 - i(1 - t)
            }, t.easing["easeInOut" + e] = function (t) {
                return .5 > t ? i(2 * t) / 2 : 1 - i(-2 * t + 2) / 2
            }
        })
    }();
    var v = t.effects;
    t.effects.define("blind", "hide", function (e, i) {
        var s = {
                up: ["bottom", "top"],
                vertical: ["bottom", "top"],
                down: ["top", "bottom"],
                left: ["right", "left"],
                horizontal: ["right", "left"],
                right: ["left", "right"]
            }, n = t(this), o = e.direction || "up", a = n.cssClip(), r = {clip: t.extend({}, a)},
            l = t.effects.createPlaceholder(n);
        r.clip[s[o][0]] = r.clip[s[o][1]], "show" === e.mode && (n.cssClip(r.clip), l && l.css(t.effects.clipToBox(r)), r.clip = a), l && l.animate(t.effects.clipToBox(r), e.duration, e.easing), n.animate(r, {
            queue: !1,
            duration: e.duration,
            easing: e.easing,
            complete: i
        })
    }), t.effects.define("bounce", function (e, i) {
        var s, n, o, a = t(this), r = e.mode, l = "hide" === r, h = "show" === r, c = e.direction || "up",
            u = e.distance, d = e.times || 5, p = 2 * d + (h || l ? 1 : 0), f = e.duration / p, g = e.easing,
            m = "up" === c || "down" === c ? "top" : "left", _ = "up" === c || "left" === c, v = 0,
            b = a.queue().length;
        for (t.effects.createPlaceholder(a), o = a.css(m), u || (u = a["top" === m ? "outerHeight" : "outerWidth"]() / 3), h && (n = {opacity: 1}, n[m] = o, a.css("opacity", 0).css(m, _ ? 2 * -u : 2 * u).animate(n, f, g)), l && (u /= Math.pow(2, d - 1)), n = {}, n[m] = o; d > v; v++) s = {}, s[m] = (_ ? "-=" : "+=") + u, a.animate(s, f, g).animate(n, f, g), u = l ? 2 * u : u / 2;
        l && (s = {opacity: 0}, s[m] = (_ ? "-=" : "+=") + u, a.animate(s, f, g)), a.queue(i), t.effects.unshift(a, b, p + 1)
    }), t.effects.define("clip", "hide", function (e, i) {
        var s, n = {}, o = t(this), a = e.direction || "vertical", r = "both" === a,
            l = r || "horizontal" === a, h = r || "vertical" === a;
        s = o.cssClip(), n.clip = {
            top: h ? (s.bottom - s.top) / 2 : s.top,
            right: l ? (s.right - s.left) / 2 : s.right,
            bottom: h ? (s.bottom - s.top) / 2 : s.bottom,
            left: l ? (s.right - s.left) / 2 : s.left
        }, t.effects.createPlaceholder(o), "show" === e.mode && (o.cssClip(n.clip), n.clip = s), o.animate(n, {
            queue: !1,
            duration: e.duration,
            easing: e.easing,
            complete: i
        })
    }), t.effects.define("drop", "hide", function (e, i) {
        var s, n = t(this), o = e.mode, a = "show" === o, r = e.direction || "left",
            l = "up" === r || "down" === r ? "top" : "left", h = "up" === r || "left" === r ? "-=" : "+=",
            c = "+=" === h ? "-=" : "+=", u = {opacity: 0};
        t.effects.createPlaceholder(n), s = e.distance || n["top" === l ? "outerHeight" : "outerWidth"](!0) / 2, u[l] = h + s, a && (n.css(u), u[l] = c + s, u.opacity = 1), n.animate(u, {
            queue: !1,
            duration: e.duration,
            easing: e.easing,
            complete: i
        })
    }), t.effects.define("explode", "hide", function (e, i) {
        function s() {
            b.push(this), b.length === u * d && n()
        }

        function n() {
            p.css({visibility: "visible"}), t(b).remove(), i()
        }

        var o, a, r, l, h, c, u = e.pieces ? Math.round(Math.sqrt(e.pieces)) : 3, d = u, p = t(this),
            f = e.mode, g = "show" === f, m = p.show().css("visibility", "hidden").offset(),
            _ = Math.ceil(p.outerWidth() / d), v = Math.ceil(p.outerHeight() / u), b = [];
        for (o = 0; u > o; o++) for (l = m.top + o * v, c = o - (u - 1) / 2, a = 0; d > a; a++) r = m.left + a * _, h = a - (d - 1) / 2, p.clone().appendTo("body").wrap("<div></div>").css({
            position: "absolute",
            visibility: "visible",
            left: -a * _,
            top: -o * v
        }).parent().addClass("ui-effects-explode").css({
            position: "absolute",
            overflow: "hidden",
            width: _,
            height: v,
            left: r + (g ? h * _ : 0),
            top: l + (g ? c * v : 0),
            opacity: g ? 0 : 1
        }).animate({
            left: r + (g ? 0 : h * _),
            top: l + (g ? 0 : c * v),
            opacity: g ? 1 : 0
        }, e.duration || 500, e.easing, s)
    }), t.effects.define("fade", "toggle", function (e, i) {
        var s = "show" === e.mode;
        t(this).css("opacity", s ? 0 : 1).animate({opacity: s ? 1 : 0}, {
            queue: !1,
            duration: e.duration,
            easing: e.easing,
            complete: i
        })
    }), t.effects.define("fold", "hide", function (e, i) {
        var s = t(this), n = e.mode, o = "show" === n, a = "hide" === n, r = e.size || 15,
            l = /([0-9]+)%/.exec(r), h = !!e.horizFirst, c = h ? ["right", "bottom"] : ["bottom", "right"],
            u = e.duration / 2, d = t.effects.createPlaceholder(s), p = s.cssClip(),
            f = {clip: t.extend({}, p)}, g = {clip: t.extend({}, p)}, m = [p[c[0]], p[c[1]]],
            _ = s.queue().length;
        l && (r = parseInt(l[1], 10) / 100 * m[a ? 0 : 1]), f.clip[c[0]] = r, g.clip[c[0]] = r, g.clip[c[1]] = 0, o && (s.cssClip(g.clip), d && d.css(t.effects.clipToBox(g)), g.clip = p), s.queue(function (i) {
            d && d.animate(t.effects.clipToBox(f), u, e.easing).animate(t.effects.clipToBox(g), u, e.easing), i()
        }).animate(f, u, e.easing).animate(g, u, e.easing).queue(i), t.effects.unshift(s, _, 4)
    }), t.effects.define("highlight", "show", function (e, i) {
        var s = t(this), n = {backgroundColor: s.css("backgroundColor")};
        "hide" === e.mode && (n.opacity = 0), t.effects.saveStyle(s), s.css({
            backgroundImage: "none",
            backgroundColor: e.color || "#ffff99"
        }).animate(n, {queue: !1, duration: e.duration, easing: e.easing, complete: i})
    }), t.effects.define("size", function (e, i) {
        var s, n, o, a = t(this), r = ["fontSize"],
            l = ["borderTopWidth", "borderBottomWidth", "paddingTop", "paddingBottom"],
            h = ["borderLeftWidth", "borderRightWidth", "paddingLeft", "paddingRight"], c = e.mode,
            u = "effect" !== c, d = e.scale || "both", p = e.origin || ["middle", "center"],
            f = a.css("position"), g = a.position(), m = t.effects.scaledDimensions(a), _ = e.from || m,
            v = e.to || t.effects.scaledDimensions(a, 0);
        t.effects.createPlaceholder(a), "show" === c && (o = _, _ = v, v = o), n = {
            from: {
                y: _.height / m.height,
                x: _.width / m.width
            }, to: {y: v.height / m.height, x: v.width / m.width}
        }, ("box" === d || "both" === d) && (n.from.y !== n.to.y && (_ = t.effects.setTransition(a, l, n.from.y, _), v = t.effects.setTransition(a, l, n.to.y, v)), n.from.x !== n.to.x && (_ = t.effects.setTransition(a, h, n.from.x, _), v = t.effects.setTransition(a, h, n.to.x, v))), ("content" === d || "both" === d) && n.from.y !== n.to.y && (_ = t.effects.setTransition(a, r, n.from.y, _), v = t.effects.setTransition(a, r, n.to.y, v)), p && (s = t.effects.getBaseline(p, m), _.top = (m.outerHeight - _.outerHeight) * s.y + g.top, _.left = (m.outerWidth - _.outerWidth) * s.x + g.left, v.top = (m.outerHeight - v.outerHeight) * s.y + g.top, v.left = (m.outerWidth - v.outerWidth) * s.x + g.left), a.css(_), ("content" === d || "both" === d) && (l = l.concat(["marginTop", "marginBottom"]).concat(r), h = h.concat(["marginLeft", "marginRight"]), a.find("*[width]").each(function () {
            var i = t(this), s = t.effects.scaledDimensions(i), o = {
                height: s.height * n.from.y,
                width: s.width * n.from.x,
                outerHeight: s.outerHeight * n.from.y,
                outerWidth: s.outerWidth * n.from.x
            }, a = {
                height: s.height * n.to.y,
                width: s.width * n.to.x,
                outerHeight: s.height * n.to.y,
                outerWidth: s.width * n.to.x
            };
            n.from.y !== n.to.y && (o = t.effects.setTransition(i, l, n.from.y, o), a = t.effects.setTransition(i, l, n.to.y, a)), n.from.x !== n.to.x && (o = t.effects.setTransition(i, h, n.from.x, o), a = t.effects.setTransition(i, h, n.to.x, a)), u && t.effects.saveStyle(i), i.css(o), i.animate(a, e.duration, e.easing, function () {
                u && t.effects.restoreStyle(i)
            })
        })), a.animate(v, {
            queue: !1, duration: e.duration, easing: e.easing, complete: function () {
                var e = a.offset();
                0 === v.opacity && a.css("opacity", _.opacity), u || (a.css("position", "static" === f ? "relative" : f).offset(e), t.effects.saveStyle(a)), i()
            }
        })
    }), t.effects.define("scale", function (e, i) {
        var s = t(this), n = e.mode,
            o = parseInt(e.percent, 10) || (0 === parseInt(e.percent, 10) ? 0 : "effect" !== n ? 0 : 100),
            a = t.extend(!0, {
                from: t.effects.scaledDimensions(s),
                to: t.effects.scaledDimensions(s, o, e.direction || "both"),
                origin: e.origin || ["middle", "center"]
            }, e);
        e.fade && (a.from.opacity = 1, a.to.opacity = 0), t.effects.effect.size.call(this, a, i)
    }), t.effects.define("puff", "hide", function (e, i) {
        var s = t.extend(!0, {}, e, {fade: !0, percent: parseInt(e.percent, 10) || 150});
        t.effects.effect.scale.call(this, s, i)
    }), t.effects.define("pulsate", "show", function (e, i) {
        var s = t(this), n = e.mode, o = "show" === n, a = "hide" === n, r = o || a,
            l = 2 * (e.times || 5) + (r ? 1 : 0), h = e.duration / l, c = 0, u = 1, d = s.queue().length;
        for ((o || !s.is(":visible")) && (s.css("opacity", 0).show(), c = 1); l > u; u++) s.animate({opacity: c}, h, e.easing), c = 1 - c;
        s.animate({opacity: c}, h, e.easing), s.queue(i), t.effects.unshift(s, d, l + 1)
    }), t.effects.define("shake", function (e, i) {
        var s = 1, n = t(this), o = e.direction || "left", a = e.distance || 20, r = e.times || 3,
            l = 2 * r + 1, h = Math.round(e.duration / l), c = "up" === o || "down" === o ? "top" : "left",
            u = "up" === o || "left" === o, d = {}, p = {}, f = {}, g = n.queue().length;
        for (t.effects.createPlaceholder(n), d[c] = (u ? "-=" : "+=") + a, p[c] = (u ? "+=" : "-=") + 2 * a, f[c] = (u ? "-=" : "+=") + 2 * a, n.animate(d, h, e.easing); r > s; s++) n.animate(p, h, e.easing).animate(f, h, e.easing);
        n.animate(p, h, e.easing).animate(d, h / 2, e.easing).queue(i), t.effects.unshift(n, g, l + 1)
    }), t.effects.define("slide", "show", function (e, i) {
        var s, n, o = t(this), a = {
                up: ["bottom", "top"],
                down: ["top", "bottom"],
                left: ["right", "left"],
                right: ["left", "right"]
            }, r = e.mode, l = e.direction || "left", h = "up" === l || "down" === l ? "top" : "left",
            c = "up" === l || "left" === l, u = e.distance || o["top" === h ? "outerHeight" : "outerWidth"](!0),
            d = {};
        t.effects.createPlaceholder(o), s = o.cssClip(), n = o.position()[h], d[h] = (c ? -1 : 1) * u + n, d.clip = o.cssClip(), d.clip[a[l][1]] = d.clip[a[l][0]], "show" === r && (o.cssClip(d.clip), o.css(h, d[h]), d.clip = s, d[h] = n), o.animate(d, {
            queue: !1,
            duration: e.duration,
            easing: e.easing,
            complete: i
        })
    });
    var v;
    t.uiBackCompat !== !1 && (v = t.effects.define("transfer", function (e, i) {
        t(this).transfer(e, i)
    }))
});
/* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Andrew Stromnov (stromnov@gmail.com). */
(function (factory) {
    if (typeof define === "function" && define.amd) {

        // AMD. Register as an anonymous module.
        define(["../widgets/datepicker"], factory);
    } else {

        // Browser globals
        factory(jQuery.datepicker);
    }
}(function (datepicker) {

    datepicker.regional.ru = {
        closeText: "Закрыть",
        prevText: "&#x3C;Пред",
        nextText: "След&#x3E;",
        currentText: "Сегодня",
        monthNames: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
            "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
        monthNamesShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн",
            "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
        dayNames: ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"],
        dayNamesShort: ["вск", "пнд", "втр", "срд", "чтв", "птн", "сбт"],
        dayNamesMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        weekHeader: "Нед",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ""
    };
    datepicker.setDefaults(datepicker.regional.ru);

    return datepicker.regional.ru;

}));
/*
    Highcharts JS v7.1.1 (2019-04-09)

    (c) 2009-2018 Torstein Honsi

    License: www.highcharts.com/license
    */
(function (Q, K) {
    "object" === typeof module && module.exports ? (K["default"] = K, module.exports = Q.document ? K(Q) : K) : "function" === typeof define && define.amd ? define("highcharts/highcharts", function () {
        return K(Q)
    }) : (Q.Highcharts && Q.Highcharts.error(16, !0), Q.Highcharts = K(Q))
})("undefined" !== typeof window ? window : this, function (Q) {
    function K(a, C, I, F) {
        a.hasOwnProperty(C) || (a[C] = F.apply(null, I))
    }

    var G = {};
    K(G, "parts/Globals.js", [], function () {
        var a = "undefined" === typeof Q ? "undefined" !== typeof window ? window : {} : Q, C = a.document,
            I = a.navigator && a.navigator.userAgent || "",
            F = C && C.createElementNS && !!C.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
            k = /(edge|msie|trident)/i.test(I) && !a.opera, e = -1 !== I.indexOf("Firefox"),
            q = -1 !== I.indexOf("Chrome"), t = e && 4 > parseInt(I.split("Firefox/")[1], 10);
        return {
            product: "Highcharts",
            version: "7.1.1",
            deg2rad: 2 * Math.PI / 360,
            doc: C,
            hasBidiBug: t,
            hasTouch: C && void 0 !== C.documentElement.ontouchstart,
            isMS: k,
            isWebKit: -1 !== I.indexOf("AppleWebKit"),
            isFirefox: e,
            isChrome: q,
            isSafari: !q && -1 !== I.indexOf("Safari"),
            isTouchDevice: /(Mobile|Android|Windows Phone)/.test(I),
            SVG_NS: "http://www.w3.org/2000/svg",
            chartCount: 0,
            seriesTypes: {},
            symbolSizes: {},
            svg: F,
            win: a,
            marginNames: ["plotTop", "marginRight", "marginBottom", "plotLeft"],
            noop: function () {
            },
            charts: [],
            dateFormats: {}
        }
    });
    K(G, "parts/Utilities.js", [G["parts/Globals.js"]], function (a) {
        a.timers = [];
        var C = a.charts, I = a.doc, F = a.win;
        a.error = function (k, e, q) {
            var t = a.isNumber(k) ? "Highcharts error #" + k + ": www.highcharts.com/errors/" + k : k,
                u = function () {
                    if (e) throw Error(t);
                    F.console &&
                    console.log(t)
                };
            q ? a.fireEvent(q, "displayError", {code: k, message: t}, u) : u()
        };
        a.Fx = function (a, e, q) {
            this.options = e;
            this.elem = a;
            this.prop = q
        };
        a.Fx.prototype = {
            dSetter: function () {
                var a = this.paths[0], e = this.paths[1], q = [], t = this.now, u = a.length, v;
                if (1 === t) q = this.toD; else if (u === e.length && 1 > t) for (; u--;) v = parseFloat(a[u]), q[u] = isNaN(v) ? e[u] : t * parseFloat(e[u] - v) + v; else q = e;
                this.elem.attr("d", q, null, !0)
            }, update: function () {
                var a = this.elem, e = this.prop, q = this.now, t = this.options.step;
                if (this[e + "Setter"]) this[e + "Setter"]();
                else a.attr ? a.element && a.attr(e, q, null, !0) : a.style[e] = q + this.unit;
                t && t.call(a, q, this)
            }, run: function (k, e, q) {
                var t = this, u = t.options, v = function (a) {
                    return v.stopped ? !1 : t.step(a)
                }, p = F.requestAnimationFrame || function (a) {
                    setTimeout(a, 13)
                }, h = function () {
                    for (var d = 0; d < a.timers.length; d++) a.timers[d]() || a.timers.splice(d--, 1);
                    a.timers.length && p(h)
                };
                k !== e || this.elem["forceAnimate:" + this.prop] ? (this.startTime = +new Date, this.start = k, this.end = e, this.unit = q, this.now = this.start, this.pos = 0, v.elem = this.elem, v.prop =
                    this.prop, v() && 1 === a.timers.push(v) && p(h)) : (delete u.curAnim[this.prop], u.complete && 0 === Object.keys(u.curAnim).length && u.complete.call(this.elem))
            }, step: function (k) {
                var e = +new Date, q, t = this.options, u = this.elem, v = t.complete, p = t.duration,
                    h = t.curAnim;
                u.attr && !u.element ? k = !1 : k || e >= p + this.startTime ? (this.now = this.end, this.pos = 1, this.update(), q = h[this.prop] = !0, a.objectEach(h, function (a) {
                    !0 !== a && (q = !1)
                }), q && v && v.call(u), k = !1) : (this.pos = t.easing((e - this.startTime) / p), this.now = this.start + (this.end - this.start) *
                    this.pos, this.update(), k = !0);
                return k
            }, initPath: function (k, e, q) {
                function t(a) {
                    var b, g;
                    for (c = a.length; c--;) b = "M" === a[c] || "L" === a[c], g = /[a-zA-Z]/.test(a[c + 3]), b && g && a.splice(c + 1, 0, a[c + 1], a[c + 2], a[c + 1], a[c + 2])
                }

                function u(a, d) {
                    for (; a.length < g;) {
                        a[0] = d[g - a.length];
                        var n = a.slice(0, b);
                        [].splice.apply(a, [0, 0].concat(n));
                        w && (n = a.slice(a.length - b), [].splice.apply(a, [a.length, 0].concat(n)), c--)
                    }
                    a[0] = "M"
                }

                function v(a, c) {
                    for (var d = (g - a.length) / b; 0 < d && d--;) l = a.slice().splice(a.length / z - b, b * z), l[0] = c[g - b - d * b], m &&
                    (l[b - 6] = l[b - 2], l[b - 5] = l[b - 1]), [].splice.apply(a, [a.length / z, 0].concat(l)), w && d--
                }

                e = e || "";
                var p, h = k.startX, d = k.endX, m = -1 < e.indexOf("C"), b = m ? 7 : 3, g, l, c;
                e = e.split(" ");
                q = q.slice();
                var w = k.isArea, z = w ? 2 : 1, J;
                m && (t(e), t(q));
                if (h && d) {
                    for (c = 0; c < h.length; c++) if (h[c] === d[0]) {
                        p = c;
                        break
                    } else if (h[0] === d[d.length - h.length + c]) {
                        p = c;
                        J = !0;
                        break
                    }
                    void 0 === p && (e = [])
                }
                e.length && a.isNumber(p) && (g = q.length + p * z * b, J ? (u(e, q), v(q, e)) : (u(q, e), v(e, q)));
                return [e, q]
            }, fillSetter: function () {
                a.Fx.prototype.strokeSetter.apply(this, arguments)
            },
            strokeSetter: function () {
                this.elem.attr(this.prop, a.color(this.start).tweenTo(a.color(this.end), this.pos), null, !0)
            }
        };
        a.merge = function () {
            var k, e = arguments, q, t = {}, u = function (e, p) {
                "object" !== typeof e && (e = {});
                a.objectEach(p, function (h, d) {
                    !a.isObject(h, !0) || a.isClass(h) || a.isDOMElement(h) ? e[d] = p[d] : e[d] = u(e[d] || {}, h)
                });
                return e
            };
            !0 === e[0] && (t = e[1], e = Array.prototype.slice.call(e, 2));
            q = e.length;
            for (k = 0; k < q; k++) t = u(t, e[k]);
            return t
        };
        a.pInt = function (a, e) {
            return parseInt(a, e || 10)
        };
        a.isString = function (a) {
            return "string" ===
                typeof a
        };
        a.isArray = function (a) {
            a = Object.prototype.toString.call(a);
            return "[object Array]" === a || "[object Array Iterator]" === a
        };
        a.isObject = function (k, e) {
            return !!k && "object" === typeof k && (!e || !a.isArray(k))
        };
        a.isDOMElement = function (k) {
            return a.isObject(k) && "number" === typeof k.nodeType
        };
        a.isClass = function (k) {
            var e = k && k.constructor;
            return !(!a.isObject(k, !0) || a.isDOMElement(k) || !e || !e.name || "Object" === e.name)
        };
        a.isNumber = function (a) {
            return "number" === typeof a && !isNaN(a) && Infinity > a && -Infinity < a
        };
        a.erase =
            function (a, e) {
                for (var k = a.length; k--;) if (a[k] === e) {
                    a.splice(k, 1);
                    break
                }
            };
        a.defined = function (a) {
            return void 0 !== a && null !== a
        };
        a.attr = function (k, e, q) {
            var t;
            a.isString(e) ? a.defined(q) ? k.setAttribute(e, q) : k && k.getAttribute && ((t = k.getAttribute(e)) || "class" !== e || (t = k.getAttribute(e + "Name"))) : a.defined(e) && a.isObject(e) && a.objectEach(e, function (a, e) {
                k.setAttribute(e, a)
            });
            return t
        };
        a.splat = function (k) {
            return a.isArray(k) ? k : [k]
        };
        a.syncTimeout = function (a, e, q) {
            if (e) return setTimeout(a, e, q);
            a.call(0, q)
        };
        a.clearTimeout =
            function (k) {
                a.defined(k) && clearTimeout(k)
            };
        a.extend = function (a, e) {
            var k;
            a || (a = {});
            for (k in e) a[k] = e[k];
            return a
        };
        a.pick = function () {
            var a = arguments, e, q, t = a.length;
            for (e = 0; e < t; e++) if (q = a[e], void 0 !== q && null !== q) return q
        };
        a.css = function (k, e) {
            a.isMS && !a.svg && e && void 0 !== e.opacity && (e.filter = "alpha(opacity\x3d" + 100 * e.opacity + ")");
            a.extend(k.style, e)
        };
        a.createElement = function (k, e, q, t, u) {
            k = I.createElement(k);
            var v = a.css;
            e && a.extend(k, e);
            u && v(k, {padding: 0, border: "none", margin: 0});
            q && v(k, q);
            t && t.appendChild(k);
            return k
        };
        a.extendClass = function (k, e) {
            var q = function () {
            };
            q.prototype = new k;
            a.extend(q.prototype, e);
            return q
        };
        a.pad = function (a, e, q) {
            return Array((e || 2) + 1 - String(a).replace("-", "").length).join(q || 0) + a
        };
        a.relativeLength = function (a, e, q) {
            return /%$/.test(a) ? e * parseFloat(a) / 100 + (q || 0) : parseFloat(a)
        };
        a.wrap = function (a, e, q) {
            var k = a[e];
            a[e] = function () {
                var a = Array.prototype.slice.call(arguments), e = arguments, p = this;
                p.proceed = function () {
                    k.apply(p, arguments.length ? arguments : e)
                };
                a.unshift(k);
                a = q.apply(this, a);
                p.proceed = null;
                return a
            }
        };
        a.datePropsToTimestamps = function (k) {
            a.objectEach(k, function (e, q) {
                a.isObject(e) && "function" === typeof e.getTime ? k[q] = e.getTime() : (a.isObject(e) || a.isArray(e)) && a.datePropsToTimestamps(e)
            })
        };
        a.formatSingle = function (k, e, q) {
            var t = /\.([0-9])/, u = a.defaultOptions.lang;
            /f$/.test(k) ? (q = (q = k.match(t)) ? q[1] : -1, null !== e && (e = a.numberFormat(e, q, u.decimalPoint, -1 < k.indexOf(",") ? u.thousandsSep : ""))) : e = (q || a.time).dateFormat(k, e);
            return e
        };
        a.format = function (k, e, q) {
            for (var t = "{", u = !1, v, p, h,
                     d, m = [], b; k;) {
                t = k.indexOf(t);
                if (-1 === t) break;
                v = k.slice(0, t);
                if (u) {
                    v = v.split(":");
                    p = v.shift().split(".");
                    d = p.length;
                    b = e;
                    for (h = 0; h < d; h++) b && (b = b[p[h]]);
                    v.length && (b = a.formatSingle(v.join(":"), b, q));
                    m.push(b)
                } else m.push(v);
                k = k.slice(t + 1);
                t = (u = !u) ? "}" : "{"
            }
            m.push(k);
            return m.join("")
        };
        a.getMagnitude = function (a) {
            return Math.pow(10, Math.floor(Math.log(a) / Math.LN10))
        };
        a.normalizeTickInterval = function (k, e, q, t, u) {
            var v, p = k;
            q = a.pick(q, 1);
            v = k / q;
            e || (e = u ? [1, 1.2, 1.5, 2, 2.5, 3, 4, 5, 6, 8, 10] : [1, 2, 2.5, 5, 10], !1 === t && (1 ===
            q ? e = e.filter(function (a) {
                return 0 === a % 1
            }) : .1 >= q && (e = [1 / q])));
            for (t = 0; t < e.length && !(p = e[t], u && p * q >= k || !u && v <= (e[t] + (e[t + 1] || e[t])) / 2); t++) ;
            return p = a.correctFloat(p * q, -Math.round(Math.log(.001) / Math.LN10))
        };
        a.stableSort = function (a, e) {
            var k = a.length, t, u;
            for (u = 0; u < k; u++) a[u].safeI = u;
            a.sort(function (a, p) {
                t = e(a, p);
                return 0 === t ? a.safeI - p.safeI : t
            });
            for (u = 0; u < k; u++) delete a[u].safeI
        };
        a.arrayMin = function (a) {
            for (var e = a.length, k = a[0]; e--;) a[e] < k && (k = a[e]);
            return k
        };
        a.arrayMax = function (a) {
            for (var e = a.length,
                     k = a[0]; e--;) a[e] > k && (k = a[e]);
            return k
        };
        a.destroyObjectProperties = function (k, e) {
            a.objectEach(k, function (a, t) {
                a && a !== e && a.destroy && a.destroy();
                delete k[t]
            })
        };
        a.discardElement = function (k) {
            var e = a.garbageBin;
            e || (e = a.createElement("div"));
            k && e.appendChild(k);
            e.innerHTML = ""
        };
        a.correctFloat = function (a, e) {
            return parseFloat(a.toPrecision(e || 14))
        };
        a.setAnimation = function (k, e) {
            e.renderer.globalAnimation = a.pick(k, e.options.chart.animation, !0)
        };
        a.animObject = function (k) {
            return a.isObject(k) ? a.merge(k) : {
                duration: k ?
                    500 : 0
            }
        };
        a.timeUnits = {
            millisecond: 1,
            second: 1E3,
            minute: 6E4,
            hour: 36E5,
            day: 864E5,
            week: 6048E5,
            month: 24192E5,
            year: 314496E5
        };
        a.numberFormat = function (k, e, q, t) {
            k = +k || 0;
            e = +e;
            var u = a.defaultOptions.lang, v = (k.toString().split(".")[1] || "").split("e")[0].length, p, h,
                d = k.toString().split("e");
            -1 === e ? e = Math.min(v, 20) : a.isNumber(e) ? e && d[1] && 0 > d[1] && (p = e + +d[1], 0 <= p ? (d[0] = (+d[0]).toExponential(p).split("e")[0], e = p) : (d[0] = d[0].split(".")[0] || 0, k = 20 > e ? (d[0] * Math.pow(10, d[1])).toFixed(e) : 0, d[1] = 0)) : e = 2;
            h = (Math.abs(d[1] ?
                d[0] : k) + Math.pow(10, -Math.max(e, v) - 1)).toFixed(e);
            v = String(a.pInt(h));
            p = 3 < v.length ? v.length % 3 : 0;
            q = a.pick(q, u.decimalPoint);
            t = a.pick(t, u.thousandsSep);
            k = (0 > k ? "-" : "") + (p ? v.substr(0, p) + t : "");
            k += v.substr(p).replace(/(\d{3})(?=\d)/g, "$1" + t);
            e && (k += q + h.slice(-e));
            d[1] && 0 !== +k && (k += "e" + d[1]);
            return k
        };
        Math.easeInOutSine = function (a) {
            return -.5 * (Math.cos(Math.PI * a) - 1)
        };
        a.getStyle = function (k, e, q) {
            if ("width" === e) return Math.max(0, Math.min(k.offsetWidth, k.scrollWidth, k.getBoundingClientRect && "none" === a.getStyle(k,
                "transform", !1) ? Math.floor(k.getBoundingClientRect().width) : Infinity) - a.getStyle(k, "padding-left") - a.getStyle(k, "padding-right"));
            if ("height" === e) return Math.max(0, Math.min(k.offsetHeight, k.scrollHeight) - a.getStyle(k, "padding-top") - a.getStyle(k, "padding-bottom"));
            F.getComputedStyle || a.error(27, !0);
            if (k = F.getComputedStyle(k, void 0)) k = k.getPropertyValue(e), a.pick(q, "opacity" !== e) && (k = a.pInt(k));
            return k
        };
        a.inArray = function (a, e, q) {
            return e.indexOf(a, q)
        };
        a.find = Array.prototype.find ? function (a, e) {
                return a.find(e)
            } :
            function (a, e) {
                var k, t = a.length;
                for (k = 0; k < t; k++) if (e(a[k], k)) return a[k]
            };
        a.keys = Object.keys;
        a.offset = function (a) {
            var e = I.documentElement;
            a = a.parentElement || a.parentNode ? a.getBoundingClientRect() : {top: 0, left: 0};
            return {
                top: a.top + (F.pageYOffset || e.scrollTop) - (e.clientTop || 0),
                left: a.left + (F.pageXOffset || e.scrollLeft) - (e.clientLeft || 0)
            }
        };
        a.stop = function (k, e) {
            for (var q = a.timers.length; q--;) a.timers[q].elem !== k || e && e !== a.timers[q].prop || (a.timers[q].stopped = !0)
        };
        a.objectEach = function (a, e, q) {
            for (var k in a) a.hasOwnProperty(k) &&
            e.call(q || a[k], a[k], k, a)
        };
        a.objectEach({
            map: "map",
            each: "forEach",
            grep: "filter",
            reduce: "reduce",
            some: "some"
        }, function (k, e) {
            a[e] = function (a) {
                return Array.prototype[k].apply(a, [].slice.call(arguments, 1))
            }
        });
        a.addEvent = function (k, e, q, t) {
            var u, v = k.addEventListener || a.addEventListenerPolyfill;
            u = "function" === typeof k && k.prototype ? k.prototype.protoEvents = k.prototype.protoEvents || {} : k.hcEvents = k.hcEvents || {};
            a.Point && k instanceof a.Point && k.series && k.series.chart && (k.series.chart.runTrackerClick = !0);
            v && v.call(k,
                e, q, !1);
            u[e] || (u[e] = []);
            u[e].push(q);
            t && a.isNumber(t.order) && (q.order = t.order, u[e].sort(function (a, h) {
                return a.order - h.order
            }));
            return function () {
                a.removeEvent(k, e, q)
            }
        };
        a.removeEvent = function (k, e, q) {
            function t(h, d) {
                var m = k.removeEventListener || a.removeEventListenerPolyfill;
                m && m.call(k, h, d, !1)
            }

            function u(h) {
                var d, m;
                k.nodeName && (e ? (d = {}, d[e] = !0) : d = h, a.objectEach(d, function (a, d) {
                    if (h[d]) for (m = h[d].length; m--;) t(d, h[d][m])
                }))
            }

            var v, p;
            ["protoEvents", "hcEvents"].forEach(function (a) {
                var d = k[a];
                d && (e ? (v =
                    d[e] || [], q ? (p = v.indexOf(q), -1 < p && (v.splice(p, 1), d[e] = v), t(e, q)) : (u(d), d[e] = [])) : (u(d), k[a] = {}))
            })
        };
        a.fireEvent = function (k, e, q, t) {
            var u, v, p, h, d;
            q = q || {};
            I.createEvent && (k.dispatchEvent || k.fireEvent) ? (u = I.createEvent("Events"), u.initEvent(e, !0, !0), a.extend(u, q), k.dispatchEvent ? k.dispatchEvent(u) : k.fireEvent(e, u)) : ["protoEvents", "hcEvents"].forEach(function (m) {
                if (k[m]) for (v = k[m][e] || [], p = v.length, q.target || a.extend(q, {
                    preventDefault: function () {
                        q.defaultPrevented = !0
                    }, target: k, type: e
                }), h = 0; h < p; h++) (d = v[h]) &&
                !1 === d.call(k, q) && q.preventDefault()
            });
            t && !q.defaultPrevented && t.call(k, q)
        };
        a.animate = function (k, e, q) {
            var t, u = "", v, p, h;
            a.isObject(q) || (h = arguments, q = {duration: h[2], easing: h[3], complete: h[4]});
            a.isNumber(q.duration) || (q.duration = 400);
            q.easing = "function" === typeof q.easing ? q.easing : Math[q.easing] || Math.easeInOutSine;
            q.curAnim = a.merge(e);
            a.objectEach(e, function (d, h) {
                a.stop(k, h);
                p = new a.Fx(k, q, h);
                v = null;
                "d" === h ? (p.paths = p.initPath(k, k.d, e.d), p.toD = e.d, t = 0, v = 1) : k.attr ? t = k.attr(h) : (t = parseFloat(a.getStyle(k,
                    h)) || 0, "opacity" !== h && (u = "px"));
                v || (v = d);
                v && v.match && v.match("px") && (v = v.replace(/px/g, ""));
                p.run(t, v, u)
            })
        };
        a.seriesType = function (k, e, q, t, u) {
            var v = a.getOptions(), p = a.seriesTypes;
            v.plotOptions[k] = a.merge(v.plotOptions[e], q);
            p[k] = a.extendClass(p[e] || function () {
            }, t);
            p[k].prototype.type = k;
            u && (p[k].prototype.pointClass = a.extendClass(a.Point, u));
            return p[k]
        };
        a.uniqueKey = function () {
            var a = Math.random().toString(36).substring(2, 9), e = 0;
            return function () {
                return "highcharts-" + a + "-" + e++
            }
        }();
        a.isFunction = function (a) {
            return "function" ===
                typeof a
        };
        F.jQuery && (F.jQuery.fn.highcharts = function () {
            var k = [].slice.call(arguments);
            if (this[0]) return k[0] ? (new (a[a.isString(k[0]) ? k.shift() : "Chart"])(this[0], k[0], k[1]), this) : C[a.attr(this[0], "data-highcharts-chart")]
        })
    });
    K(G, "parts/Color.js", [G["parts/Globals.js"]], function (a) {
        var C = a.isNumber, I = a.merge, F = a.pInt;
        a.Color = function (k) {
            if (!(this instanceof a.Color)) return new a.Color(k);
            this.init(k)
        };
        a.Color.prototype = {
            parsers: [{
                regex: /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/,
                parse: function (a) {
                    return [F(a[1]), F(a[2]), F(a[3]), parseFloat(a[4], 10)]
                }
            }, {
                regex: /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/, parse: function (a) {
                    return [F(a[1]), F(a[2]), F(a[3]), 1]
                }
            }], names: {white: "#ffffff", black: "#000000"}, init: function (k) {
                var e, q, t, u;
                if ((this.input = k = this.names[k && k.toLowerCase ? k.toLowerCase() : ""] || k) && k.stops) this.stops = k.stops.map(function (e) {
                    return new a.Color(e[1])
                }); else if (k && k.charAt && "#" === k.charAt() && (e = k.length, k = parseInt(k.substr(1), 16), 7 === e ? q = [(k & 16711680) >>
                16, (k & 65280) >> 8, k & 255, 1] : 4 === e && (q = [(k & 3840) >> 4 | (k & 3840) >> 8, (k & 240) >> 4 | k & 240, (k & 15) << 4 | k & 15, 1])), !q) for (t = this.parsers.length; t-- && !q;) u = this.parsers[t], (e = u.regex.exec(k)) && (q = u.parse(e));
                this.rgba = q || []
            }, get: function (a) {
                var e = this.input, k = this.rgba, t;
                this.stops ? (t = I(e), t.stops = [].concat(t.stops), this.stops.forEach(function (e, k) {
                    t.stops[k] = [t.stops[k][0], e.get(a)]
                })) : t = k && C(k[0]) ? "rgb" === a || !a && 1 === k[3] ? "rgb(" + k[0] + "," + k[1] + "," + k[2] + ")" : "a" === a ? k[3] : "rgba(" + k.join(",") + ")" : e;
                return t
            }, brighten: function (a) {
                var e,
                    k = this.rgba;
                if (this.stops) this.stops.forEach(function (e) {
                    e.brighten(a)
                }); else if (C(a) && 0 !== a) for (e = 0; 3 > e; e++) k[e] += F(255 * a), 0 > k[e] && (k[e] = 0), 255 < k[e] && (k[e] = 255);
                return this
            }, setOpacity: function (a) {
                this.rgba[3] = a;
                return this
            }, tweenTo: function (a, e) {
                var k = this.rgba, t = a.rgba;
                t.length && k && k.length ? (a = 1 !== t[3] || 1 !== k[3], e = (a ? "rgba(" : "rgb(") + Math.round(t[0] + (k[0] - t[0]) * (1 - e)) + "," + Math.round(t[1] + (k[1] - t[1]) * (1 - e)) + "," + Math.round(t[2] + (k[2] - t[2]) * (1 - e)) + (a ? "," + (t[3] + (k[3] - t[3]) * (1 - e)) : "") + ")") : e = a.input ||
                    "none";
                return e
            }
        };
        a.color = function (k) {
            return new a.Color(k)
        }
    });
    K(G, "parts/SvgRenderer.js", [G["parts/Globals.js"]], function (a) {
        var C, I, F = a.addEvent, k = a.animate, e = a.attr, q = a.charts, t = a.color, u = a.css,
            v = a.createElement, p = a.defined, h = a.deg2rad, d = a.destroyObjectProperties, m = a.doc,
            b = a.extend, g = a.erase, l = a.hasTouch, c = a.isArray, w = a.isFirefox, z = a.isMS,
            J = a.isObject, D = a.isString, A = a.isWebKit, n = a.merge, x = a.noop, B = a.objectEach,
            E = a.pick, H = a.pInt, f = a.removeEvent, r = a.splat, N = a.stop, M = a.svg, L = a.SVG_NS,
            P = a.symbolSizes,
            O = a.win;
        C = a.SVGElement = function () {
            return this
        };
        b(C.prototype, {
            opacity: 1,
            SVG_NS: L,
            textProps: "direction fontSize fontWeight fontFamily fontStyle color lineHeight width textAlign textDecoration textOverflow textOutline cursor".split(" "),
            init: function (y, f) {
                this.element = "span" === f ? v(f) : m.createElementNS(this.SVG_NS, f);
                this.renderer = y;
                a.fireEvent(this, "afterInit")
            },
            animate: function (y, f, b) {
                var c = a.animObject(E(f, this.renderer.globalAnimation, !0));
                E(m.hidden, m.msHidden, m.webkitHidden, !1) && (c.duration = 0);
                0 !== c.duration ? (b && (c.complete = b), k(this, y, c)) : (this.attr(y, null, b), a.objectEach(y, function (a, y) {
                    c.step && c.step.call(this, a, {prop: y, pos: 1})
                }, this));
                return this
            },
            complexColor: function (y, f, b) {
                var r = this.renderer, d, g, l, h, S, m, L, w, x, e, z, M = [], N;
                a.fireEvent(this.renderer, "complexColor", {args: arguments}, function () {
                    y.radialGradient ? g = "radialGradient" : y.linearGradient && (g = "linearGradient");
                    g && (l = y[g], S = r.gradients, L = y.stops, e = b.radialReference, c(l) && (y[g] = l = {
                        x1: l[0],
                        y1: l[1],
                        x2: l[2],
                        y2: l[3],
                        gradientUnits: "userSpaceOnUse"
                    }),
                    "radialGradient" === g && e && !p(l.gradientUnits) && (h = l, l = n(l, r.getRadialAttr(e, h), {gradientUnits: "userSpaceOnUse"})), B(l, function (a, y) {
                        "id" !== y && M.push(y, a)
                    }), B(L, function (a) {
                        M.push(a)
                    }), M = M.join(","), S[M] ? z = S[M].attr("id") : (l.id = z = a.uniqueKey(), S[M] = m = r.createElement(g).attr(l).add(r.defs), m.radAttr = h, m.stops = [], L.forEach(function (y) {
                        0 === y[1].indexOf("rgba") ? (d = a.color(y[1]), w = d.get("rgb"), x = d.get("a")) : (w = y[1], x = 1);
                        y = r.createElement("stop").attr({
                            offset: y[0],
                            "stop-color": w,
                            "stop-opacity": x
                        }).add(m);
                        m.stops.push(y)
                    })), N = "url(" + r.url + "#" + z + ")", b.setAttribute(f, N), b.gradient = M, y.toString = function () {
                        return N
                    })
                })
            },
            applyTextOutline: function (y) {
                var f = this.element, b, c, r;
                -1 !== y.indexOf("contrast") && (y = y.replace(/contrast/g, this.renderer.getContrast(f.style.fill)));
                y = y.split(" ");
                b = y[y.length - 1];
                (c = y[0]) && "none" !== c && a.svg && (this.fakeTS = !0, y = [].slice.call(f.getElementsByTagName("tspan")), this.ySetter = this.xSetter, c = c.replace(/(^[\d\.]+)(.*?)$/g, function (a, y, f) {
                    return 2 * y + f
                }), this.removeTextOutline(y),
                    r = f.firstChild, y.forEach(function (a, y) {
                    0 === y && (a.setAttribute("x", f.getAttribute("x")), y = f.getAttribute("y"), a.setAttribute("y", y || 0), null === y && f.setAttribute("y", 0));
                    a = a.cloneNode(1);
                    e(a, {
                        "class": "highcharts-text-outline",
                        fill: b,
                        stroke: b,
                        "stroke-width": c,
                        "stroke-linejoin": "round"
                    });
                    f.insertBefore(a, r)
                }))
            },
            removeTextOutline: function (a) {
                for (var y = a.length, f; y--;) f = a[y], "highcharts-text-outline" === f.getAttribute("class") && g(a, this.element.removeChild(f))
            },
            symbolCustomAttribs: "x y width height r start end innerR anchorX anchorY rounded".split(" "),
            attr: function (y, f, b, c) {
                var r, d = this.element, g, l = this, n, h, m = this.symbolCustomAttribs;
                "string" === typeof y && void 0 !== f && (r = y, y = {}, y[r] = f);
                "string" === typeof y ? l = (this[y + "Getter"] || this._defaultGetter).call(this, y, d) : (B(y, function (f, b) {
                    n = !1;
                    c || N(this, b);
                    this.symbolName && -1 !== a.inArray(b, m) && (g || (this.symbolAttr(y), g = !0), n = !0);
                    !this.rotation || "x" !== b && "y" !== b || (this.doTransform = !0);
                    n || (h = this[b + "Setter"] || this._defaultSetter, h.call(this, f, b, d), !this.styledMode && this.shadows && /^(width|height|visibility|x|y|d|transform|cx|cy|r)$/.test(b) &&
                    this.updateShadows(b, f, h))
                }, this), this.afterSetters());
                b && b.call(this);
                return l
            },
            afterSetters: function () {
                this.doTransform && (this.updateTransform(), this.doTransform = !1)
            },
            updateShadows: function (a, f, b) {
                for (var y = this.shadows, c = y.length; c--;) b.call(y[c], "height" === a ? Math.max(f - (y[c].cutHeight || 0), 0) : "d" === a ? this.d : f, a, y[c])
            },
            addClass: function (a, f) {
                var y = this.attr("class") || "";
                f || (a = (a || "").split(/ /g).reduce(function (a, f) {
                    -1 === y.indexOf(f) && a.push(f);
                    return a
                }, y ? [y] : []).join(" "));
                a !== y && this.attr("class",
                    a);
                return this
            },
            hasClass: function (a) {
                return -1 !== (this.attr("class") || "").split(" ").indexOf(a)
            },
            removeClass: function (a) {
                return this.attr("class", (this.attr("class") || "").replace(a, ""))
            },
            symbolAttr: function (a) {
                var y = this;
                "x y r start end width height innerR anchorX anchorY clockwise".split(" ").forEach(function (f) {
                    y[f] = E(a[f], y[f])
                });
                y.attr({d: y.renderer.symbols[y.symbolName](y.x, y.y, y.width, y.height, y)})
            },
            clip: function (a) {
                return this.attr("clip-path", a ? "url(" + this.renderer.url + "#" + a.id + ")" : "none")
            },
            crisp: function (a, f) {
                var y;
                f = f || a.strokeWidth || 0;
                y = Math.round(f) % 2 / 2;
                a.x = Math.floor(a.x || this.x || 0) + y;
                a.y = Math.floor(a.y || this.y || 0) + y;
                a.width = Math.floor((a.width || this.width || 0) - 2 * y);
                a.height = Math.floor((a.height || this.height || 0) - 2 * y);
                p(a.strokeWidth) && (a.strokeWidth = f);
                return a
            },
            css: function (a) {
                var y = this.styles, f = {}, c = this.element, r, d = "", g, l = !y,
                    n = ["textOutline", "textOverflow", "width"];
                a && a.color && (a.fill = a.color);
                y && B(a, function (a, b) {
                    a !== y[b] && (f[b] = a, l = !0)
                });
                l && (y && (a = b(y, f)), a && (null === a.width ||
                "auto" === a.width ? delete this.textWidth : "text" === c.nodeName.toLowerCase() && a.width && (r = this.textWidth = H(a.width))), this.styles = a, r && !M && this.renderer.forExport && delete a.width, c.namespaceURI === this.SVG_NS ? (g = function (a, y) {
                    return "-" + y.toLowerCase()
                }, B(a, function (a, y) {
                    -1 === n.indexOf(y) && (d += y.replace(/([A-Z])/g, g) + ":" + a + ";")
                }), d && e(c, "style", d)) : u(c, a), this.added && ("text" === this.element.nodeName && this.renderer.buildText(this), a && a.textOutline && this.applyTextOutline(a.textOutline)));
                return this
            },
            getStyle: function (a) {
                return O.getComputedStyle(this.element ||
                    this, "").getPropertyValue(a)
            },
            strokeWidth: function () {
                if (!this.renderer.styledMode) return this["stroke-width"] || 0;
                var a = this.getStyle("stroke-width"), f;
                a.indexOf("px") === a.length - 2 ? a = H(a) : (f = m.createElementNS(L, "rect"), e(f, {
                    width: a,
                    "stroke-width": 0
                }), this.element.parentNode.appendChild(f), a = f.getBBox().width, f.parentNode.removeChild(f));
                return a
            },
            on: function (a, f) {
                var y = this, b = y.element;
                l && "click" === a ? (b.ontouchstart = function (a) {
                    y.touchEventFired = Date.now();
                    a.preventDefault();
                    f.call(b, a)
                }, b.onclick =
                    function (a) {
                        (-1 === O.navigator.userAgent.indexOf("Android") || 1100 < Date.now() - (y.touchEventFired || 0)) && f.call(b, a)
                    }) : b["on" + a] = f;
                return this
            },
            setRadialReference: function (a) {
                var y = this.renderer.gradients[this.element.gradient];
                this.element.radialReference = a;
                y && y.radAttr && y.animate(this.renderer.getRadialAttr(a, y.radAttr));
                return this
            },
            translate: function (a, f) {
                return this.attr({translateX: a, translateY: f})
            },
            invert: function (a) {
                this.inverted = a;
                this.updateTransform();
                return this
            },
            updateTransform: function () {
                var a =
                        this.translateX || 0, f = this.translateY || 0, b = this.scaleX, c = this.scaleY,
                    r = this.inverted, d = this.rotation, g = this.matrix, l = this.element;
                r && (a += this.width, f += this.height);
                a = ["translate(" + a + "," + f + ")"];
                p(g) && a.push("matrix(" + g.join(",") + ")");
                r ? a.push("rotate(90) scale(-1,1)") : d && a.push("rotate(" + d + " " + E(this.rotationOriginX, l.getAttribute("x"), 0) + " " + E(this.rotationOriginY, l.getAttribute("y") || 0) + ")");
                (p(b) || p(c)) && a.push("scale(" + E(b, 1) + " " + E(c, 1) + ")");
                a.length && l.setAttribute("transform", a.join(" "))
            },
            toFront: function () {
                var a =
                    this.element;
                a.parentNode.appendChild(a);
                return this
            },
            align: function (a, f, b) {
                var y, c, r, d, l = {};
                c = this.renderer;
                r = c.alignedObjects;
                var n, h;
                if (a) {
                    if (this.alignOptions = a, this.alignByTranslate = f, !b || D(b)) this.alignTo = y = b || "renderer", g(r, this), r.push(this), b = null
                } else a = this.alignOptions, f = this.alignByTranslate, y = this.alignTo;
                b = E(b, c[y], c);
                y = a.align;
                c = a.verticalAlign;
                r = (b.x || 0) + (a.x || 0);
                d = (b.y || 0) + (a.y || 0);
                "right" === y ? n = 1 : "center" === y && (n = 2);
                n && (r += (b.width - (a.width || 0)) / n);
                l[f ? "translateX" : "x"] = Math.round(r);
                "bottom" === c ? h = 1 : "middle" === c && (h = 2);
                h && (d += (b.height - (a.height || 0)) / h);
                l[f ? "translateY" : "y"] = Math.round(d);
                this[this.placed ? "animate" : "attr"](l);
                this.placed = !0;
                this.alignAttr = l;
                return this
            },
            getBBox: function (a, f) {
                var y, c = this.renderer, r, d = this.element, l = this.styles, g, n = this.textStr, m,
                    L = c.cache, w = c.cacheKeys, x = d.namespaceURI === this.SVG_NS, B;
                f = E(f, this.rotation);
                r = f * h;
                g = c.styledMode ? d && C.prototype.getStyle.call(d, "font-size") : l && l.fontSize;
                p(n) && (B = n.toString(), -1 === B.indexOf("\x3c") && (B = B.replace(/[0-9]/g,
                    "0")), B += ["", f || 0, g, this.textWidth, l && l.textOverflow].join());
                B && !a && (y = L[B]);
                if (!y) {
                    if (x || c.forExport) {
                        try {
                            (m = this.fakeTS && function (a) {
                                [].forEach.call(d.querySelectorAll(".highcharts-text-outline"), function (y) {
                                    y.style.display = a
                                })
                            }) && m("none"), y = d.getBBox ? b({}, d.getBBox()) : {
                                width: d.offsetWidth,
                                height: d.offsetHeight
                            }, m && m("")
                        } catch (Z) {
                        }
                        if (!y || 0 > y.width) y = {width: 0, height: 0}
                    } else y = this.htmlGetBBox();
                    c.isSVG && (a = y.width, c = y.height, x && (y.height = c = {
                            "11px,17": 14,
                            "13px,20": 16
                        }[l && l.fontSize + "," + Math.round(c)] ||
                        c), f && (y.width = Math.abs(c * Math.sin(r)) + Math.abs(a * Math.cos(r)), y.height = Math.abs(c * Math.cos(r)) + Math.abs(a * Math.sin(r))));
                    if (B && 0 < y.height) {
                        for (; 250 < w.length;) delete L[w.shift()];
                        L[B] || w.push(B);
                        L[B] = y
                    }
                }
                return y
            },
            show: function (a) {
                return this.attr({visibility: a ? "inherit" : "visible"})
            },
            hide: function () {
                return this.attr({visibility: "hidden"})
            },
            fadeOut: function (a) {
                var y = this;
                y.animate({opacity: 0}, {
                    duration: a || 150, complete: function () {
                        y.attr({y: -9999})
                    }
                })
            },
            add: function (a) {
                var y = this.renderer, f = this.element,
                    b;
                a && (this.parentGroup = a);
                this.parentInverted = a && a.inverted;
                void 0 !== this.textStr && y.buildText(this);
                this.added = !0;
                if (!a || a.handleZ || this.zIndex) b = this.zIndexSetter();
                b || (a ? a.element : y.box).appendChild(f);
                if (this.onAdd) this.onAdd();
                return this
            },
            safeRemoveChild: function (a) {
                var y = a.parentNode;
                y && y.removeChild(a)
            },
            destroy: function () {
                var a = this, f = a.element || {}, b = a.renderer,
                    c = b.isSVG && "SPAN" === f.nodeName && a.parentGroup, r = f.ownerSVGElement,
                    d = a.clipPath;
                f.onclick = f.onmouseout = f.onmouseover = f.onmousemove =
                    f.point = null;
                N(a);
                d && r && ([].forEach.call(r.querySelectorAll("[clip-path],[CLIP-PATH]"), function (a) {
                    -1 < a.getAttribute("clip-path").indexOf(d.element.id) && a.removeAttribute("clip-path")
                }), a.clipPath = d.destroy());
                if (a.stops) {
                    for (r = 0; r < a.stops.length; r++) a.stops[r] = a.stops[r].destroy();
                    a.stops = null
                }
                a.safeRemoveChild(f);
                for (b.styledMode || a.destroyShadows(); c && c.div && 0 === c.div.childNodes.length;) f = c.parentGroup, a.safeRemoveChild(c.div), delete c.div, c = f;
                a.alignTo && g(b.alignedObjects, a);
                B(a, function (f, y) {
                    delete a[y]
                });
                return null
            },
            shadow: function (a, f, b) {
                var y = [], c, r, d = this.element, l, g, n, h;
                if (!a) this.destroyShadows(); else if (!this.shadows) {
                    g = E(a.width, 3);
                    n = (a.opacity || .15) / g;
                    h = this.parentInverted ? "(-1,-1)" : "(" + E(a.offsetX, 1) + ", " + E(a.offsetY, 1) + ")";
                    for (c = 1; c <= g; c++) r = d.cloneNode(0), l = 2 * g + 1 - 2 * c, e(r, {
                        stroke: a.color || "#000000",
                        "stroke-opacity": n * c,
                        "stroke-width": l,
                        transform: "translate" + h,
                        fill: "none"
                    }), r.setAttribute("class", (r.getAttribute("class") || "") + " highcharts-shadow"), b && (e(r, "height", Math.max(e(r, "height") -
                        l, 0)), r.cutHeight = l), f ? f.element.appendChild(r) : d.parentNode && d.parentNode.insertBefore(r, d), y.push(r);
                    this.shadows = y
                }
                return this
            },
            destroyShadows: function () {
                (this.shadows || []).forEach(function (a) {
                    this.safeRemoveChild(a)
                }, this);
                this.shadows = void 0
            },
            xGetter: function (a) {
                "circle" === this.element.nodeName && ("x" === a ? a = "cx" : "y" === a && (a = "cy"));
                return this._defaultGetter(a)
            },
            _defaultGetter: function (a) {
                a = E(this[a + "Value"], this[a], this.element ? this.element.getAttribute(a) : null, 0);
                /^[\-0-9\.]+$/.test(a) && (a = parseFloat(a));
                return a
            },
            dSetter: function (a, f, b) {
                a && a.join && (a = a.join(" "));
                /(NaN| {2}|^$)/.test(a) && (a = "M 0 0");
                this[f] !== a && (b.setAttribute(f, a), this[f] = a)
            },
            dashstyleSetter: function (a) {
                var f, y = this["stroke-width"];
                "inherit" === y && (y = 1);
                if (a = a && a.toLowerCase()) {
                    a = a.replace("shortdashdotdot", "3,1,1,1,1,1,").replace("shortdashdot", "3,1,1,1").replace("shortdot", "1,1,").replace("shortdash", "3,1,").replace("longdash", "8,3,").replace(/dot/g, "1,3,").replace("dash", "4,3,").replace(/,$/, "").split(",");
                    for (f = a.length; f--;) a[f] =
                        H(a[f]) * y;
                    a = a.join(",").replace(/NaN/g, "none");
                    this.element.setAttribute("stroke-dasharray", a)
                }
            },
            alignSetter: function (a) {
                var f = {left: "start", center: "middle", right: "end"};
                f[a] && (this.alignValue = a, this.element.setAttribute("text-anchor", f[a]))
            },
            opacitySetter: function (a, f, b) {
                this[f] = a;
                b.setAttribute(f, a)
            },
            titleSetter: function (a) {
                var f = this.element.getElementsByTagName("title")[0];
                f || (f = m.createElementNS(this.SVG_NS, "title"), this.element.appendChild(f));
                f.firstChild && f.removeChild(f.firstChild);
                f.appendChild(m.createTextNode(String(E(a),
                    "").replace(/<[^>]*>/g, "").replace(/&lt;/g, "\x3c").replace(/&gt;/g, "\x3e")))
            },
            textSetter: function (a) {
                a !== this.textStr && (delete this.bBox, this.textStr = a, this.added && this.renderer.buildText(this))
            },
            setTextPath: function (f, b) {
                var y = this.element, c = {textAnchor: "text-anchor"}, r, d = !1, l, g = this.textPathWrapper,
                    h = !g;
                b = n(!0, {enabled: !0, attributes: {dy: -5, startOffset: "50%", textAnchor: "middle"}}, b);
                r = b.attributes;
                if (f && b && b.enabled) {
                    this.options && this.options.padding && (r.dx = -this.options.padding);
                    g || (this.textPathWrapper =
                        g = this.renderer.createElement("textPath"), d = !0);
                    l = g.element;
                    (b = f.element.getAttribute("id")) || f.element.setAttribute("id", b = a.uniqueKey());
                    if (h) for (f = y.getElementsByTagName("tspan"); f.length;) f[0].setAttribute("y", 0), l.appendChild(f[0]);
                    d && g.add({element: this.text ? this.text.element : y});
                    l.setAttributeNS("http://www.w3.org/1999/xlink", "href", this.renderer.url + "#" + b);
                    p(r.dy) && (l.parentNode.setAttribute("dy", r.dy), delete r.dy);
                    p(r.dx) && (l.parentNode.setAttribute("dx", r.dx), delete r.dx);
                    a.objectEach(r,
                        function (a, f) {
                            l.setAttribute(c[f] || f, a)
                        });
                    y.removeAttribute("transform");
                    this.removeTextOutline.call(g, [].slice.call(y.getElementsByTagName("tspan")));
                    this.applyTextOutline = this.updateTransform = x
                } else g && (delete this.updateTransform, delete this.applyTextOutline, this.destroyTextPath(y, f));
                return this
            },
            destroyTextPath: function (a, f) {
                var y;
                f.element.setAttribute("id", "");
                for (y = this.textPathWrapper.element.childNodes; y.length;) a.firstChild.appendChild(y[0]);
                a.firstChild.removeChild(this.textPathWrapper.element);
                delete f.textPathWrapper
            },
            fillSetter: function (a, f, b) {
                "string" === typeof a ? b.setAttribute(f, a) : a && this.complexColor(a, f, b)
            },
            visibilitySetter: function (a, f, b) {
                "inherit" === a ? b.removeAttribute(f) : this[f] !== a && b.setAttribute(f, a);
                this[f] = a
            },
            zIndexSetter: function (a, f) {
                var b = this.renderer, y = this.parentGroup, c = (y || b).element || b.box, r, d = this.element,
                    l, g, b = c === b.box;
                r = this.added;
                var n;
                p(a) ? (d.setAttribute("data-z-index", a), a = +a, this[f] === a && (r = !1)) : p(this[f]) && d.removeAttribute("data-z-index");
                this[f] = a;
                if (r) {
                    (a =
                        this.zIndex) && y && (y.handleZ = !0);
                    f = c.childNodes;
                    for (n = f.length - 1; 0 <= n && !l; n--) if (y = f[n], r = y.getAttribute("data-z-index"), g = !p(r), y !== d) if (0 > a && g && !b && !n) c.insertBefore(d, f[n]), l = !0; else if (H(r) <= a || g && (!p(a) || 0 <= a)) c.insertBefore(d, f[n + 1] || null), l = !0;
                    l || (c.insertBefore(d, f[b ? 3 : 0] || null), l = !0)
                }
                return l
            },
            _defaultSetter: function (a, f, b) {
                b.setAttribute(f, a)
            }
        });
        C.prototype.yGetter = C.prototype.xGetter;
        C.prototype.translateXSetter = C.prototype.translateYSetter = C.prototype.rotationSetter = C.prototype.verticalAlignSetter =
            C.prototype.rotationOriginXSetter = C.prototype.rotationOriginYSetter = C.prototype.scaleXSetter = C.prototype.scaleYSetter = C.prototype.matrixSetter = function (a, f) {
                this[f] = a;
                this.doTransform = !0
            };
        C.prototype["stroke-widthSetter"] = C.prototype.strokeSetter = function (a, f, b) {
            this[f] = a;
            this.stroke && this["stroke-width"] ? (C.prototype.fillSetter.call(this, this.stroke, "stroke", b), b.setAttribute("stroke-width", this["stroke-width"]), this.hasStroke = !0) : "stroke-width" === f && 0 === a && this.hasStroke && (b.removeAttribute("stroke"),
                this.hasStroke = !1)
        };
        I = a.SVGRenderer = function () {
            this.init.apply(this, arguments)
        };
        b(I.prototype, {
            Element: C,
            SVG_NS: L,
            init: function (a, f, b, c, r, d, l) {
                var y;
                y = this.createElement("svg").attr({version: "1.1", "class": "highcharts-root"});
                l || y.css(this.getStyle(c));
                c = y.element;
                a.appendChild(c);
                e(a, "dir", "ltr");
                -1 === a.innerHTML.indexOf("xmlns") && e(c, "xmlns", this.SVG_NS);
                this.isSVG = !0;
                this.box = c;
                this.boxWrapper = y;
                this.alignedObjects = [];
                this.url = (w || A) && m.getElementsByTagName("base").length ? O.location.href.split("#")[0].replace(/<[^>]*>/g,
                    "").replace(/([\('\)])/g, "\\$1").replace(/ /g, "%20") : "";
                this.createElement("desc").add().element.appendChild(m.createTextNode("Created with Highcharts 7.1.1"));
                this.defs = this.createElement("defs").add();
                this.allowHTML = d;
                this.forExport = r;
                this.styledMode = l;
                this.gradients = {};
                this.cache = {};
                this.cacheKeys = [];
                this.imgCount = 0;
                this.setSize(f, b, !1);
                var g;
                w && a.getBoundingClientRect && (f = function () {
                    u(a, {left: 0, top: 0});
                    g = a.getBoundingClientRect();
                    u(a, {
                        left: Math.ceil(g.left) - g.left + "px", top: Math.ceil(g.top) - g.top +
                            "px"
                    })
                }, f(), this.unSubPixelFix = F(O, "resize", f))
            },
            definition: function (a) {
                function f(a, c) {
                    var y;
                    r(a).forEach(function (a) {
                        var r = b.createElement(a.tagName), d = {};
                        B(a, function (a, f) {
                            "tagName" !== f && "children" !== f && "textContent" !== f && (d[f] = a)
                        });
                        r.attr(d);
                        r.add(c || b.defs);
                        a.textContent && r.element.appendChild(m.createTextNode(a.textContent));
                        f(a.children || [], r);
                        y = r
                    });
                    return y
                }

                var b = this;
                return f(a)
            },
            getStyle: function (a) {
                return this.style = b({
                    fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif',
                    fontSize: "12px"
                }, a)
            },
            setStyle: function (a) {
                this.boxWrapper.css(this.getStyle(a))
            },
            isHidden: function () {
                return !this.boxWrapper.getBBox().width
            },
            destroy: function () {
                var a = this.defs;
                this.box = null;
                this.boxWrapper = this.boxWrapper.destroy();
                d(this.gradients || {});
                this.gradients = null;
                a && (this.defs = a.destroy());
                this.unSubPixelFix && this.unSubPixelFix();
                return this.alignedObjects = null
            },
            createElement: function (a) {
                var f = new this.Element;
                f.init(this, a);
                return f
            },
            draw: x,
            getRadialAttr: function (a, f) {
                return {
                    cx: a[0] - a[2] /
                        2 + f.cx * a[2], cy: a[1] - a[2] / 2 + f.cy * a[2], r: f.r * a[2]
                }
            },
            truncate: function (a, f, b, c, r, d, l) {
                var y = this, g = a.rotation, n, h = c ? 1 : 0, L = (b || c).length, w = L, x = [],
                    B = function (a) {
                        f.firstChild && f.removeChild(f.firstChild);
                        a && f.appendChild(m.createTextNode(a))
                    }, p = function (d, g) {
                        g = g || d;
                        if (void 0 === x[g]) if (f.getSubStringLength) try {
                            x[g] = r + f.getSubStringLength(0, c ? g + 1 : g)
                        } catch (aa) {
                        } else y.getSpanWidth && (B(l(b || c, d)), x[g] = r + y.getSpanWidth(a, f));
                        return x[g]
                    }, e, z;
                a.rotation = 0;
                e = p(f.textContent.length);
                if (z = r + e > d) {
                    for (; h <= L;) w = Math.ceil((h +
                        L) / 2), c && (n = l(c, w)), e = p(w, n && n.length - 1), h === L ? h = L + 1 : e > d ? L = w - 1 : h = w;
                    0 === L ? B("") : b && L === b.length - 1 || B(n || l(b || c, w))
                }
                c && c.splice(0, w);
                a.actualWidth = e;
                a.rotation = g;
                return z
            },
            escapes: {
                "\x26": "\x26amp;",
                "\x3c": "\x26lt;",
                "\x3e": "\x26gt;",
                "'": "\x26#39;",
                '"': "\x26quot;"
            },
            buildText: function (a) {
                var f = a.element, b = this, c = b.forExport, r = E(a.textStr, "").toString(),
                    y = -1 !== r.indexOf("\x3c"), d = f.childNodes, g, l = e(f, "x"), n = a.styles,
                    h = a.textWidth, w = n && n.lineHeight, x = n && n.textOutline,
                    p = n && "ellipsis" === n.textOverflow, z =
                        n && "nowrap" === n.whiteSpace, N = n && n.fontSize, P, A, D = d.length,
                    n = h && !a.added && this.box, k = function (a) {
                        var c;
                        b.styledMode || (c = /(px|em)$/.test(a && a.style.fontSize) ? a.style.fontSize : N || b.style.fontSize || 12);
                        return w ? H(w) : b.fontMetrics(c, a.getAttribute("style") ? a : f).h
                    }, J = function (a, f) {
                        B(b.escapes, function (b, c) {
                            f && -1 !== f.indexOf(b) || (a = a.toString().replace(new RegExp(b, "g"), c))
                        });
                        return a
                    }, O = function (a, f) {
                        var b;
                        b = a.indexOf("\x3c");
                        a = a.substring(b, a.indexOf("\x3e") - b);
                        b = a.indexOf(f + "\x3d");
                        if (-1 !== b && (b = b + f.length +
                            1, f = a.charAt(b), '"' === f || "'" === f)) return a = a.substring(b + 1), a.substring(0, a.indexOf(f))
                    };
                P = [r, p, z, w, x, N, h].join();
                if (P !== a.textCache) {
                    for (a.textCache = P; D--;) f.removeChild(d[D]);
                    y || x || p || h || -1 !== r.indexOf(" ") ? (n && n.appendChild(f), y ? (r = b.styledMode ? r.replace(/<(b|strong)>/g, '\x3cspan class\x3d"highcharts-strong"\x3e').replace(/<(i|em)>/g, '\x3cspan class\x3d"highcharts-emphasized"\x3e') : r.replace(/<(b|strong)>/g, '\x3cspan style\x3d"font-weight:bold"\x3e').replace(/<(i|em)>/g, '\x3cspan style\x3d"font-style:italic"\x3e'),
                        r = r.replace(/<a/g, "\x3cspan").replace(/<\/(b|strong|i|em|a)>/g, "\x3c/span\x3e").split(/<br.*?>/g)) : r = [r], r = r.filter(function (a) {
                        return "" !== a
                    }), r.forEach(function (r, y) {
                        var d, n = 0, w = 0;
                        r = r.replace(/^\s+|\s+$/g, "").replace(/<span/g, "|||\x3cspan").replace(/<\/span>/g, "\x3c/span\x3e|||");
                        d = r.split("|||");
                        d.forEach(function (r) {
                            if ("" !== r || 1 === d.length) {
                                var x = {}, B = m.createElementNS(b.SVG_NS, "tspan"), P, E;
                                (P = O(r, "class")) && e(B, "class", P);
                                if (P = O(r, "style")) P = P.replace(/(;| |^)color([ :])/, "$1fill$2"), e(B, "style",
                                    P);
                                (E = O(r, "href")) && !c && (e(B, "onclick", 'location.href\x3d"' + E + '"'), e(B, "class", "highcharts-anchor"), b.styledMode || u(B, {cursor: "pointer"}));
                                r = J(r.replace(/<[a-zA-Z\/](.|\n)*?>/g, "") || " ");
                                if (" " !== r) {
                                    B.appendChild(m.createTextNode(r));
                                    n ? x.dx = 0 : y && null !== l && (x.x = l);
                                    e(B, x);
                                    f.appendChild(B);
                                    !n && A && (!M && c && u(B, {display: "block"}), e(B, "dy", k(B)));
                                    if (h) {
                                        var D = r.replace(/([^\^])-/g, "$1- ").split(" "),
                                            x = !z && (1 < d.length || y || 1 < D.length);
                                        E = 0;
                                        var H = k(B);
                                        if (p) g = b.truncate(a, B, r, void 0, 0, Math.max(0, h - parseInt(N ||
                                            12, 10)), function (a, f) {
                                            return a.substring(0, f) + "\u2026"
                                        }); else if (x) for (; D.length;) D.length && !z && 0 < E && (B = m.createElementNS(L, "tspan"), e(B, {
                                            dy: H,
                                            x: l
                                        }), P && e(B, "style", P), B.appendChild(m.createTextNode(D.join(" ").replace(/- /g, "-"))), f.appendChild(B)), b.truncate(a, B, null, D, 0 === E ? w : 0, h, function (a, f) {
                                            return D.slice(0, f).join(" ").replace(/- /g, "-")
                                        }), w = a.actualWidth, E++
                                    }
                                    n++
                                }
                            }
                        });
                        A = A || f.childNodes.length
                    }), p && g && a.attr("title", J(a.textStr, ["\x26lt;", "\x26gt;"])), n && n.removeChild(f), x && a.applyTextOutline &&
                    a.applyTextOutline(x)) : f.appendChild(m.createTextNode(J(r)))
                }
            },
            getContrast: function (a) {
                a = t(a).rgba;
                a[0] *= 1;
                a[1] *= 1.2;
                a[2] *= .5;
                return 459 < a[0] + a[1] + a[2] ? "#000000" : "#FFFFFF"
            },
            button: function (a, f, r, c, d, g, l, h, L, w) {
                var y = this.label(a, f, r, L, null, null, w, null, "button"), m = 0, B = this.styledMode;
                y.attr(n({padding: 8, r: 2}, d));
                if (!B) {
                    var x, p, e, M;
                    d = n({
                        fill: "#f7f7f7",
                        stroke: "#cccccc",
                        "stroke-width": 1,
                        style: {color: "#333333", cursor: "pointer", fontWeight: "normal"}
                    }, d);
                    x = d.style;
                    delete d.style;
                    g = n(d, {fill: "#e6e6e6"}, g);
                    p = g.style;
                    delete g.style;
                    l = n(d, {fill: "#e6ebf5", style: {color: "#000000", fontWeight: "bold"}}, l);
                    e = l.style;
                    delete l.style;
                    h = n(d, {style: {color: "#cccccc"}}, h);
                    M = h.style;
                    delete h.style
                }
                F(y.element, z ? "mouseover" : "mouseenter", function () {
                    3 !== m && y.setState(1)
                });
                F(y.element, z ? "mouseout" : "mouseleave", function () {
                    3 !== m && y.setState(m)
                });
                y.setState = function (a) {
                    1 !== a && (y.state = m = a);
                    y.removeClass(/highcharts-button-(normal|hover|pressed|disabled)/).addClass("highcharts-button-" + ["normal", "hover", "pressed", "disabled"][a ||
                    0]);
                    B || y.attr([d, g, l, h][a || 0]).css([x, p, e, M][a || 0])
                };
                B || y.attr(d).css(b({cursor: "default"}, x));
                return y.on("click", function (a) {
                    3 !== m && c.call(y, a)
                })
            },
            crispLine: function (a, f) {
                a[1] === a[4] && (a[1] = a[4] = Math.round(a[1]) - f % 2 / 2);
                a[2] === a[5] && (a[2] = a[5] = Math.round(a[2]) + f % 2 / 2);
                return a
            },
            path: function (a) {
                var f = this.styledMode ? {} : {fill: "none"};
                c(a) ? f.d = a : J(a) && b(f, a);
                return this.createElement("path").attr(f)
            },
            circle: function (a, f, b) {
                a = J(a) ? a : void 0 === a ? {} : {x: a, y: f, r: b};
                f = this.createElement("circle");
                f.xSetter =
                    f.ySetter = function (a, f, b) {
                        b.setAttribute("c" + f, a)
                    };
                return f.attr(a)
            },
            arc: function (a, f, b, r, c, d) {
                J(a) ? (r = a, f = r.y, b = r.r, a = r.x) : r = {innerR: r, start: c, end: d};
                a = this.symbol("arc", a, f, b, b, r);
                a.r = b;
                return a
            },
            rect: function (a, f, b, r, c, d) {
                c = J(a) ? a.r : c;
                var g = this.createElement("rect");
                a = J(a) ? a : void 0 === a ? {} : {x: a, y: f, width: Math.max(b, 0), height: Math.max(r, 0)};
                this.styledMode || (void 0 !== d && (a.strokeWidth = d, a = g.crisp(a)), a.fill = "none");
                c && (a.r = c);
                g.rSetter = function (a, f, b) {
                    g.r = a;
                    e(b, {rx: a, ry: a})
                };
                g.rGetter = function () {
                    return g.r
                };
                return g.attr(a)
            },
            setSize: function (a, f, b) {
                var r = this.alignedObjects, c = r.length;
                this.width = a;
                this.height = f;
                for (this.boxWrapper.animate({width: a, height: f}, {
                    step: function () {
                        this.attr({viewBox: "0 0 " + this.attr("width") + " " + this.attr("height")})
                    }, duration: E(b, !0) ? void 0 : 0
                }); c--;) r[c].align()
            },
            g: function (a) {
                var f = this.createElement("g");
                return a ? f.attr({"class": "highcharts-" + a}) : f
            },
            image: function (a, f, r, c, d, g) {
                var l = {preserveAspectRatio: "none"}, n, y = function (a, f) {
                    a.setAttributeNS ? a.setAttributeNS("http://www.w3.org/1999/xlink",
                        "href", f) : a.setAttribute("hc-svg-href", f)
                }, h = function (f) {
                    y(n.element, a);
                    g.call(n, f)
                };
                1 < arguments.length && b(l, {x: f, y: r, width: c, height: d});
                n = this.createElement("image").attr(l);
                g ? (y(n.element, "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw\x3d\x3d"), l = new O.Image, F(l, "load", h), l.src = a, l.complete && h({})) : y(n.element, a);
                return n
            },
            symbol: function (a, f, r, c, d, g) {
                var l = this, n, y = /^url\((.*?)\)$/, h = y.test(a),
                    L = !h && (this.symbols[a] ? a : "circle"), w = L && this.symbols[L],
                    B = p(f) && w && w.call(this.symbols,
                        Math.round(f), Math.round(r), c, d, g), x, e;
                w ? (n = this.path(B), l.styledMode || n.attr("fill", "none"), b(n, {
                    symbolName: L,
                    x: f,
                    y: r,
                    width: c,
                    height: d
                }), g && b(n, g)) : h && (x = a.match(y)[1], n = this.image(x), n.imgwidth = E(P[x] && P[x].width, g && g.width), n.imgheight = E(P[x] && P[x].height, g && g.height), e = function () {
                    n.attr({width: n.width, height: n.height})
                }, ["width", "height"].forEach(function (a) {
                    n[a + "Setter"] = function (a, f) {
                        var b = {}, r = this["img" + f], c = "width" === f ? "translateX" : "translateY";
                        this[f] = a;
                        p(r) && (g && "within" === g.backgroundSize &&
                        this.width && this.height && (r = Math.round(r * Math.min(this.width / this.imgwidth, this.height / this.imgheight))), this.element && this.element.setAttribute(f, r), this.alignByTranslate || (b[c] = ((this[f] || 0) - r) / 2, this.attr(b)))
                    }
                }), p(f) && n.attr({
                    x: f,
                    y: r
                }), n.isImg = !0, p(n.imgwidth) && p(n.imgheight) ? e() : (n.attr({
                    width: 0,
                    height: 0
                }), v("img", {
                    onload: function () {
                        var a = q[l.chartIndex];
                        0 === this.width && (u(this, {
                            position: "absolute",
                            top: "-999em"
                        }), m.body.appendChild(this));
                        P[x] = {width: this.width, height: this.height};
                        n.imgwidth =
                            this.width;
                        n.imgheight = this.height;
                        n.element && e();
                        this.parentNode && this.parentNode.removeChild(this);
                        l.imgCount--;
                        if (!l.imgCount && a && a.onload) a.onload()
                    }, src: x
                }), this.imgCount++));
                return n
            },
            symbols: {
                circle: function (a, f, b, r) {
                    return this.arc(a + b / 2, f + r / 2, b / 2, r / 2, {
                        start: .5 * Math.PI,
                        end: 2.5 * Math.PI,
                        open: !1
                    })
                }, square: function (a, f, b, r) {
                    return ["M", a, f, "L", a + b, f, a + b, f + r, a, f + r, "Z"]
                }, triangle: function (a, f, b, r) {
                    return ["M", a + b / 2, f, "L", a + b, f + r, a, f + r, "Z"]
                }, "triangle-down": function (a, f, b, r) {
                    return ["M", a, f, "L", a + b,
                        f, a + b / 2, f + r, "Z"]
                }, diamond: function (a, f, b, r) {
                    return ["M", a + b / 2, f, "L", a + b, f + r / 2, a + b / 2, f + r, a, f + r / 2, "Z"]
                }, arc: function (a, f, b, r, c) {
                    var d = c.start, g = c.r || b, l = c.r || r || b, n = c.end - .001;
                    b = c.innerR;
                    r = E(c.open, .001 > Math.abs(c.end - c.start - 2 * Math.PI));
                    var y = Math.cos(d), h = Math.sin(d), L = Math.cos(n), n = Math.sin(n),
                        d = .001 > c.end - d - Math.PI ? 0 : 1;
                    c = ["M", a + g * y, f + l * h, "A", g, l, 0, d, E(c.clockwise, 1), a + g * L, f + l * n];
                    p(b) && c.push(r ? "M" : "L", a + b * L, f + b * n, "A", b, b, 0, d, 0, a + b * y, f + b * h);
                    c.push(r ? "" : "Z");
                    return c
                }, callout: function (a, f, b, r, c) {
                    var d =
                        Math.min(c && c.r || 0, b, r), g = d + 6, l = c && c.anchorX;
                    c = c && c.anchorY;
                    var n;
                    n = ["M", a + d, f, "L", a + b - d, f, "C", a + b, f, a + b, f, a + b, f + d, "L", a + b, f + r - d, "C", a + b, f + r, a + b, f + r, a + b - d, f + r, "L", a + d, f + r, "C", a, f + r, a, f + r, a, f + r - d, "L", a, f + d, "C", a, f, a, f, a + d, f];
                    l && l > b ? c > f + g && c < f + r - g ? n.splice(13, 3, "L", a + b, c - 6, a + b + 6, c, a + b, c + 6, a + b, f + r - d) : n.splice(13, 3, "L", a + b, r / 2, l, c, a + b, r / 2, a + b, f + r - d) : l && 0 > l ? c > f + g && c < f + r - g ? n.splice(33, 3, "L", a, c + 6, a - 6, c, a, c - 6, a, f + d) : n.splice(33, 3, "L", a, r / 2, l, c, a, r / 2, a, f + d) : c && c > r && l > a + g && l < a + b - g ? n.splice(23, 3, "L", l + 6, f +
                        r, l, f + r + 6, l - 6, f + r, a + d, f + r) : c && 0 > c && l > a + g && l < a + b - g && n.splice(3, 3, "L", l - 6, f, l, f - 6, l + 6, f, b - d, f);
                    return n
                }
            },
            clipRect: function (f, b, r, c) {
                var d = a.uniqueKey() + "-", g = this.createElement("clipPath").attr({id: d}).add(this.defs);
                f = this.rect(f, b, r, c, 0).add(g);
                f.id = d;
                f.clipPath = g;
                f.count = 0;
                return f
            },
            text: function (a, f, b, r) {
                var c = {};
                if (r && (this.allowHTML || !this.forExport)) return this.html(a, f, b);
                c.x = Math.round(f || 0);
                b && (c.y = Math.round(b));
                p(a) && (c.text = a);
                a = this.createElement("text").attr(c);
                r || (a.xSetter = function (a,
                                            f, b) {
                    var r = b.getElementsByTagName("tspan"), c, d = b.getAttribute(f), g;
                    for (g = 0; g < r.length; g++) c = r[g], c.getAttribute(f) === d && c.setAttribute(f, a);
                    b.setAttribute(f, a)
                });
                return a
            },
            fontMetrics: function (a, f) {
                a = !this.styledMode && /px/.test(a) || !O.getComputedStyle ? a || f && f.style && f.style.fontSize || this.style && this.style.fontSize : f && C.prototype.getStyle.call(f, "font-size");
                a = /px/.test(a) ? H(a) : 12;
                f = 24 > a ? a + 3 : Math.round(1.2 * a);
                return {h: f, b: Math.round(.8 * f), f: a}
            },
            rotCorr: function (a, f, b) {
                var r = a;
                f && b && (r = Math.max(r *
                    Math.cos(f * h), 4));
                return {x: -a / 3 * Math.sin(f * h), y: r}
            },
            label: function (r, c, d, g, l, h, L, w, m) {
                var y = this, B = y.styledMode, x = y.g("button" !== m && "label"),
                    e = x.text = y.text("", 0, 0, L).attr({zIndex: 1}), z, M, P = 0, N = 3, E = 0, A, D, H, k,
                    J, O = {}, v, t, q = /^url\((.*?)\)$/.test(g), u = B || q, S = function () {
                        return B ? z.strokeWidth() % 2 / 2 : (v ? parseInt(v, 10) : 0) % 2 / 2
                    }, U, R, T;
                m && x.addClass("highcharts-" + m);
                U = function () {
                    var a = e.element.style, f = {};
                    M = (void 0 === A || void 0 === D || J) && p(e.textStr) && e.getBBox();
                    x.width = (A || M.width || 0) + 2 * N + E;
                    x.height = (D || M.height ||
                        0) + 2 * N;
                    t = N + Math.min(y.fontMetrics(a && a.fontSize, e).b, M ? M.height : Infinity);
                    u && (z || (x.box = z = y.symbols[g] || q ? y.symbol(g) : y.rect(), z.addClass(("button" === m ? "" : "highcharts-label-box") + (m ? " highcharts-" + m + "-box" : "")), z.add(x), a = S(), f.x = a, f.y = (w ? -t : 0) + a), f.width = Math.round(x.width), f.height = Math.round(x.height), z.attr(b(f, O)), O = {})
                };
                R = function () {
                    var a = E + N, f;
                    f = w ? 0 : t;
                    p(A) && M && ("center" === J || "right" === J) && (a += {
                        center: .5,
                        right: 1
                    }[J] * (A - M.width));
                    if (a !== e.x || f !== e.y) e.attr("x", a), e.hasBoxWidthChanged && (M = e.getBBox(!0),
                        U()), void 0 !== f && e.attr("y", f);
                    e.x = a;
                    e.y = f
                };
                T = function (a, f) {
                    z ? z.attr(a, f) : O[a] = f
                };
                x.onAdd = function () {
                    e.add(x);
                    x.attr({text: r || 0 === r ? r : "", x: c, y: d});
                    z && p(l) && x.attr({anchorX: l, anchorY: h})
                };
                x.widthSetter = function (f) {
                    A = a.isNumber(f) ? f : null
                };
                x.heightSetter = function (a) {
                    D = a
                };
                x["text-alignSetter"] = function (a) {
                    J = a
                };
                x.paddingSetter = function (a) {
                    p(a) && a !== N && (N = x.padding = a, R())
                };
                x.paddingLeftSetter = function (a) {
                    p(a) && a !== E && (E = a, R())
                };
                x.alignSetter = function (a) {
                    a = {left: 0, center: .5, right: 1}[a];
                    a !== P && (P = a, M && x.attr({x: H}))
                };
                x.textSetter = function (a) {
                    void 0 !== a && e.attr({text: a});
                    U();
                    R()
                };
                x["stroke-widthSetter"] = function (a, f) {
                    a && (u = !0);
                    v = this["stroke-width"] = a;
                    T(f, a)
                };
                B ? x.rSetter = function (a, f) {
                    T(f, a)
                } : x.strokeSetter = x.fillSetter = x.rSetter = function (a, f) {
                    "r" !== f && ("fill" === f && a && (u = !0), x[f] = a);
                    T(f, a)
                };
                x.anchorXSetter = function (a, f) {
                    l = x.anchorX = a;
                    T(f, Math.round(a) - S() - H)
                };
                x.anchorYSetter = function (a, f) {
                    h = x.anchorY = a;
                    T(f, a - k)
                };
                x.xSetter = function (a) {
                    x.x = a;
                    P && (a -= P * ((A || M.width) + 2 * N), x["forceAnimate:x"] = !0);
                    H = Math.round(a);
                    x.attr("translateX",
                        H)
                };
                x.ySetter = function (a) {
                    k = x.y = Math.round(a);
                    x.attr("translateY", k)
                };
                var F = x.css;
                L = {
                    css: function (a) {
                        if (a) {
                            var f = {};
                            a = n(a);
                            x.textProps.forEach(function (b) {
                                void 0 !== a[b] && (f[b] = a[b], delete a[b])
                            });
                            e.css(f);
                            "width" in f && U();
                            "fontSize" in f && (U(), R())
                        }
                        return F.call(x, a)
                    }, getBBox: function () {
                        return {width: M.width + 2 * N, height: M.height + 2 * N, x: M.x - N, y: M.y - N}
                    }, destroy: function () {
                        f(x.element, "mouseenter");
                        f(x.element, "mouseleave");
                        e && (e = e.destroy());
                        z && (z = z.destroy());
                        C.prototype.destroy.call(x);
                        x = y = U = R = T = null
                    }
                };
                B || (L.shadow = function (a) {
                    a && (U(), z && z.shadow(a));
                    return x
                });
                return b(x, L)
            }
        });
        a.Renderer = I
    });
    K(G, "parts/Html.js", [G["parts/Globals.js"]], function (a) {
        var C = a.attr, I = a.createElement, F = a.css, k = a.defined, e = a.extend, q = a.isFirefox,
            t = a.isMS, u = a.isWebKit, v = a.pick, p = a.pInt, h = a.SVGElement, d = a.SVGRenderer, m = a.win;
        e(h.prototype, {
            htmlCss: function (a) {
                var b = "SPAN" === this.element.tagName && a && "width" in a, d = v(b && a.width, void 0), c;
                b && (delete a.width, this.textWidth = d, c = !0);
                a && "ellipsis" === a.textOverflow && (a.whiteSpace =
                    "nowrap", a.overflow = "hidden");
                this.styles = e(this.styles, a);
                F(this.element, a);
                c && this.htmlUpdateTransform();
                return this
            }, htmlGetBBox: function () {
                var a = this.element;
                return {x: a.offsetLeft, y: a.offsetTop, width: a.offsetWidth, height: a.offsetHeight}
            }, htmlUpdateTransform: function () {
                if (this.added) {
                    var a = this.renderer, d = this.element, l = this.translateX || 0, c = this.translateY || 0,
                        h = this.x || 0, m = this.y || 0, e = this.textAlign || "left",
                        D = {left: 0, center: .5, right: 1}[e], A = this.styles, n = A && A.whiteSpace;
                    F(d, {marginLeft: l, marginTop: c});
                    !a.styledMode && this.shadows && this.shadows.forEach(function (a) {
                        F(a, {marginLeft: l + 1, marginTop: c + 1})
                    });
                    this.inverted && [].forEach.call(d.childNodes, function (b) {
                        a.invertChild(b, d)
                    });
                    if ("SPAN" === d.tagName) {
                        var A = this.rotation, x = this.textWidth && p(this.textWidth),
                            B = [A, e, d.innerHTML, this.textWidth, this.textAlign].join(), E;
                        (E = x !== this.oldTextWidth) && !(E = x > this.oldTextWidth) && ((E = this.textPxLength) || (F(d, {
                            width: "",
                            whiteSpace: n || "nowrap"
                        }), E = d.offsetWidth), E = E > x);
                        E && (/[ \-]/.test(d.textContent || d.innerText) ||
                            "ellipsis" === d.style.textOverflow) ? (F(d, {
                            width: x + "px",
                            display: "block",
                            whiteSpace: n || "normal"
                        }), this.oldTextWidth = x, this.hasBoxWidthChanged = !0) : this.hasBoxWidthChanged = !1;
                        B !== this.cTT && (n = a.fontMetrics(d.style.fontSize, d).b, !k(A) || A === (this.oldRotation || 0) && e === this.oldAlign || this.setSpanRotation(A, D, n), this.getSpanCorrection(!k(A) && this.textPxLength || d.offsetWidth, n, D, A, e));
                        F(d, {left: h + (this.xCorr || 0) + "px", top: m + (this.yCorr || 0) + "px"});
                        this.cTT = B;
                        this.oldRotation = A;
                        this.oldAlign = e
                    }
                } else this.alignOnAdd =
                    !0
            }, setSpanRotation: function (a, d, l) {
                var b = {}, g = this.renderer.getTransformKey();
                b[g] = b.transform = "rotate(" + a + "deg)";
                b[g + (q ? "Origin" : "-origin")] = b.transformOrigin = 100 * d + "% " + l + "px";
                F(this.element, b)
            }, getSpanCorrection: function (a, d, l) {
                this.xCorr = -a * l;
                this.yCorr = -d
            }
        });
        e(d.prototype, {
            getTransformKey: function () {
                return t && !/Edge/.test(m.navigator.userAgent) ? "-ms-transform" : u ? "-webkit-transform" : q ? "MozTransform" : m.opera ? "-o-transform" : ""
            }, html: function (b, d, l) {
                var c = this.createElement("span"), g = c.element,
                    m = c.renderer, p = m.isSVG, D = function (a, b) {
                        ["opacity", "visibility"].forEach(function (c) {
                            a[c + "Setter"] = function (d, l, f) {
                                var r = a.div ? a.div.style : b;
                                h.prototype[c + "Setter"].call(this, d, l, f);
                                r && (r[l] = d)
                            }
                        });
                        a.addedSetters = !0
                    }, A = a.charts[m.chartIndex], A = A && A.styledMode;
                c.textSetter = function (a) {
                    a !== g.innerHTML && (delete this.bBox, delete this.oldTextWidth);
                    this.textStr = a;
                    g.innerHTML = v(a, "");
                    c.doTransform = !0
                };
                p && D(c, c.element.style);
                c.xSetter = c.ySetter = c.alignSetter = c.rotationSetter = function (a, b) {
                    "align" === b && (b =
                        "textAlign");
                    c[b] = a;
                    c.doTransform = !0
                };
                c.afterSetters = function () {
                    this.doTransform && (this.htmlUpdateTransform(), this.doTransform = !1)
                };
                c.attr({text: b, x: Math.round(d), y: Math.round(l)}).css({position: "absolute"});
                A || c.css({fontFamily: this.style.fontFamily, fontSize: this.style.fontSize});
                g.style.whiteSpace = "nowrap";
                c.css = c.htmlCss;
                p && (c.add = function (a) {
                    var b, d = m.box.parentNode, l = [];
                    if (this.parentGroup = a) {
                        if (b = a.div, !b) {
                            for (; a;) l.push(a), a = a.parentGroup;
                            l.reverse().forEach(function (a) {
                                function f(f, b) {
                                    a[b] =
                                        f;
                                    "translateX" === b ? r.left = f + "px" : r.top = f + "px";
                                    a.doTransform = !0
                                }

                                var r, g = C(a.element, "class");
                                g && (g = {className: g});
                                b = a.div = a.div || I("div", g, {
                                    position: "absolute",
                                    left: (a.translateX || 0) + "px",
                                    top: (a.translateY || 0) + "px",
                                    display: a.display,
                                    opacity: a.opacity,
                                    pointerEvents: a.styles && a.styles.pointerEvents
                                }, b || d);
                                r = b.style;
                                e(a, {
                                    classSetter: function (a) {
                                        return function (f) {
                                            this.element.setAttribute("class", f);
                                            a.className = f
                                        }
                                    }(b), on: function () {
                                        l[0].div && c.on.apply({element: l[0].div}, arguments);
                                        return a
                                    }, translateXSetter: f,
                                    translateYSetter: f
                                });
                                a.addedSetters || D(a)
                            })
                        }
                    } else b = d;
                    b.appendChild(g);
                    c.added = !0;
                    c.alignOnAdd && c.htmlUpdateTransform();
                    return c
                });
                return c
            }
        })
    });
    K(G, "parts/Time.js", [G["parts/Globals.js"]], function (a) {
        var C = a.defined, I = a.extend, F = a.merge, k = a.pick, e = a.timeUnits, q = a.win;
        a.Time = function (a) {
            this.update(a, !1)
        };
        a.Time.prototype = {
            defaultOptions: {}, update: function (a) {
                var e = k(a && a.useUTC, !0), v = this;
                this.options = a = F(!0, this.options || {}, a);
                this.Date = a.Date || q.Date || Date;
                this.timezoneOffset = (this.useUTC = e) &&
                    a.timezoneOffset;
                this.getTimezoneOffset = this.timezoneOffsetFunction();
                (this.variableTimezone = !(e && !a.getTimezoneOffset && !a.timezone)) || this.timezoneOffset ? (this.get = function (a, h) {
                    var d = h.getTime(), m = d - v.getTimezoneOffset(h);
                    h.setTime(m);
                    a = h["getUTC" + a]();
                    h.setTime(d);
                    return a
                }, this.set = function (a, h, d) {
                    var m;
                    if ("Milliseconds" === a || "Seconds" === a || "Minutes" === a && 0 === h.getTimezoneOffset() % 60) h["set" + a](d); else m = v.getTimezoneOffset(h), m = h.getTime() - m, h.setTime(m), h["setUTC" + a](d), a = v.getTimezoneOffset(h),
                        m = h.getTime() + a, h.setTime(m)
                }) : e ? (this.get = function (a, h) {
                    return h["getUTC" + a]()
                }, this.set = function (a, h, d) {
                    return h["setUTC" + a](d)
                }) : (this.get = function (a, h) {
                    return h["get" + a]()
                }, this.set = function (a, h, d) {
                    return h["set" + a](d)
                })
            }, makeTime: function (e, q, v, p, h, d) {
                var m, b, g;
                this.useUTC ? (m = this.Date.UTC.apply(0, arguments), b = this.getTimezoneOffset(m), m += b, g = this.getTimezoneOffset(m), b !== g ? m += g - b : b - 36E5 !== this.getTimezoneOffset(m - 36E5) || a.isSafari || (m -= 36E5)) : m = (new this.Date(e, q, k(v, 1), k(p, 0), k(h, 0), k(d, 0))).getTime();
                return m
            }, timezoneOffsetFunction: function () {
                var e = this, k = this.options, v = q.moment;
                if (!this.useUTC) return function (a) {
                    return 6E4 * (new Date(a)).getTimezoneOffset()
                };
                if (k.timezone) {
                    if (v) return function (a) {
                        return 6E4 * -v.tz(a, k.timezone).utcOffset()
                    };
                    a.error(25)
                }
                return this.useUTC && k.getTimezoneOffset ? function (a) {
                    return 6E4 * k.getTimezoneOffset(a)
                } : function () {
                    return 6E4 * (e.timezoneOffset || 0)
                }
            }, dateFormat: function (e, k, v) {
                if (!a.defined(k) || isNaN(k)) return a.defaultOptions.lang.invalidDate || "";
                e = a.pick(e, "%Y-%m-%d %H:%M:%S");
                var p = this, h = new this.Date(k), d = this.get("Hours", h), m = this.get("Day", h),
                    b = this.get("Date", h), g = this.get("Month", h), l = this.get("FullYear", h),
                    c = a.defaultOptions.lang, w = c.weekdays, z = c.shortWeekdays, J = a.pad, h = a.extend({
                        a: z ? z[m] : w[m].substr(0, 3),
                        A: w[m],
                        d: J(b),
                        e: J(b, 2, " "),
                        w: m,
                        b: c.shortMonths[g],
                        B: c.months[g],
                        m: J(g + 1),
                        o: g + 1,
                        y: l.toString().substr(2, 2),
                        Y: l,
                        H: J(d),
                        k: d,
                        I: J(d % 12 || 12),
                        l: d % 12 || 12,
                        M: J(p.get("Minutes", h)),
                        p: 12 > d ? "AM" : "PM",
                        P: 12 > d ? "am" : "pm",
                        S: J(h.getSeconds()),
                        L: J(Math.floor(k % 1E3), 3)
                    }, a.dateFormats);
                a.objectEach(h, function (a, b) {
                    for (; -1 !== e.indexOf("%" + b);) e = e.replace("%" + b, "function" === typeof a ? a.call(p, k) : a)
                });
                return v ? e.substr(0, 1).toUpperCase() + e.substr(1) : e
            }, resolveDTLFormat: function (e) {
                return a.isObject(e, !0) ? e : (e = a.splat(e), {main: e[0], from: e[1], to: e[2]})
            }, getTimeTicks: function (a, q, v, p) {
                var h = this, d = [], m, b = {}, g;
                m = new h.Date(q);
                var l = a.unitRange, c = a.count || 1, w;
                p = k(p, 1);
                if (C(q)) {
                    h.set("Milliseconds", m, l >= e.second ? 0 : c * Math.floor(h.get("Milliseconds", m) / c));
                    l >= e.second && h.set("Seconds", m, l >=
                    e.minute ? 0 : c * Math.floor(h.get("Seconds", m) / c));
                    l >= e.minute && h.set("Minutes", m, l >= e.hour ? 0 : c * Math.floor(h.get("Minutes", m) / c));
                    l >= e.hour && h.set("Hours", m, l >= e.day ? 0 : c * Math.floor(h.get("Hours", m) / c));
                    l >= e.day && h.set("Date", m, l >= e.month ? 1 : Math.max(1, c * Math.floor(h.get("Date", m) / c)));
                    l >= e.month && (h.set("Month", m, l >= e.year ? 0 : c * Math.floor(h.get("Month", m) / c)), g = h.get("FullYear", m));
                    l >= e.year && h.set("FullYear", m, g - g % c);
                    l === e.week && (g = h.get("Day", m), h.set("Date", m, h.get("Date", m) - g + p + (g < p ? -7 : 0)));
                    g = h.get("FullYear",
                        m);
                    p = h.get("Month", m);
                    var z = h.get("Date", m), J = h.get("Hours", m);
                    q = m.getTime();
                    h.variableTimezone && (w = v - q > 4 * e.month || h.getTimezoneOffset(q) !== h.getTimezoneOffset(v));
                    q = m.getTime();
                    for (m = 1; q < v;) d.push(q), q = l === e.year ? h.makeTime(g + m * c, 0) : l === e.month ? h.makeTime(g, p + m * c) : !w || l !== e.day && l !== e.week ? w && l === e.hour && 1 < c ? h.makeTime(g, p, z, J + m * c) : q + l * c : h.makeTime(g, p, z + m * c * (l === e.day ? 1 : 7)), m++;
                    d.push(q);
                    l <= e.hour && 1E4 > d.length && d.forEach(function (a) {
                        0 === a % 18E5 && "000000000" === h.dateFormat("%H%M%S%L", a) && (b[a] = "day")
                    })
                }
                d.info =
                    I(a, {higherRanks: b, totalRange: l * c});
                return d
            }
        }
    });
    K(G, "parts/Options.js", [G["parts/Globals.js"]], function (a) {
        var C = a.color, I = a.merge;
        a.defaultOptions = {
            colors: "#7cb5ec #434348 #90ed7d #f7a35c #8085e9 #f15c80 #e4d354 #2b908f #f45b5b #91e8e1".split(" "),
            symbols: ["circle", "diamond", "square", "triangle", "triangle-down"],
            lang: {
                loading: "Loading...",
                months: "January February March April May June July August September October November December".split(" "),
                shortMonths: "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
                weekdays: "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),
                decimalPoint: ".",
                numericSymbols: "kMGTPE".split(""),
                resetZoom: "Reset zoom",
                resetZoomTitle: "Reset zoom level 1:1",
                thousandsSep: " "
            },
            global: {},
            time: a.Time.prototype.defaultOptions,
            chart: {
                styledMode: !1,
                borderRadius: 0,
                colorCount: 10,
                defaultSeriesType: "line",
                ignoreHiddenSeries: !0,
                spacing: [10, 10, 15, 10],
                resetZoomButton: {theme: {zIndex: 6}, position: {align: "right", x: -10, y: 10}},
                width: null,
                height: null,
                borderColor: "#335cad",
                backgroundColor: "#ffffff",
                plotBorderColor: "#cccccc"
            },
            title: {text: "Chart title", align: "center", margin: 15, widthAdjust: -44},
            subtitle: {text: "", align: "center", widthAdjust: -44},
            plotOptions: {},
            labels: {style: {position: "absolute", color: "#333333"}},
            legend: {
                enabled: !0,
                align: "center",
                alignColumns: !0,
                layout: "horizontal",
                labelFormatter: function () {
                    return this.name
                },
                borderColor: "#999999",
                borderRadius: 0,
                navigation: {activeColor: "#003399", inactiveColor: "#cccccc"},
                itemStyle: {
                    color: "#333333", cursor: "pointer", fontSize: "12px", fontWeight: "bold",
                    textOverflow: "ellipsis"
                },
                itemHoverStyle: {color: "#000000"},
                itemHiddenStyle: {color: "#cccccc"},
                shadow: !1,
                itemCheckboxStyle: {position: "absolute", width: "13px", height: "13px"},
                squareSymbol: !0,
                symbolPadding: 5,
                verticalAlign: "bottom",
                x: 0,
                y: 0,
                title: {style: {fontWeight: "bold"}}
            },
            loading: {
                labelStyle: {fontWeight: "bold", position: "relative", top: "45%"},
                style: {position: "absolute", backgroundColor: "#ffffff", opacity: .5, textAlign: "center"}
            },
            tooltip: {
                enabled: !0,
                animation: a.svg,
                borderRadius: 3,
                dateTimeLabelFormats: {
                    millisecond: "%A, %b %e, %H:%M:%S.%L",
                    second: "%A, %b %e, %H:%M:%S",
                    minute: "%A, %b %e, %H:%M",
                    hour: "%A, %b %e, %H:%M",
                    day: "%A, %b %e, %Y",
                    week: "Week from %A, %b %e, %Y",
                    month: "%B %Y",
                    year: "%Y"
                },
                footerFormat: "",
                padding: 8,
                snap: a.isTouchDevice ? 25 : 10,
                headerFormat: '\x3cspan style\x3d"font-size: 10px"\x3e{point.key}\x3c/span\x3e\x3cbr/\x3e',
                pointFormat: '\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e {series.name}: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3e',
                backgroundColor: C("#f7f7f7").setOpacity(.85).get(),
                borderWidth: 1,
                shadow: !0,
                style: {
                    color: "#333333",
                    cursor: "default",
                    fontSize: "12px",
                    pointerEvents: "none",
                    whiteSpace: "nowrap"
                }
            },
            credits: {
                enabled: !0,
                href: "https://www.highcharts.com?credits",
                position: {align: "right", x: -10, verticalAlign: "bottom", y: -5},
                style: {cursor: "pointer", color: "#999999", fontSize: "9px"},
                text: "Highcharts.com"
            }
        };
        a.setOptions = function (C) {
            a.defaultOptions = I(!0, a.defaultOptions, C);
            a.time.update(I(a.defaultOptions.global, a.defaultOptions.time), !1);
            return a.defaultOptions
        };
        a.getOptions = function () {
            return a.defaultOptions
        };
        a.defaultPlotOptions = a.defaultOptions.plotOptions;
        a.time = new a.Time(I(a.defaultOptions.global, a.defaultOptions.time));
        a.dateFormat = function (C, k, e) {
            return a.time.dateFormat(C, k, e)
        }
    });
    K(G, "parts/Tick.js", [G["parts/Globals.js"]], function (a) {
        var C = a.correctFloat, I = a.defined, F = a.destroyObjectProperties, k = a.fireEvent, e = a.isNumber,
            q = a.merge, t = a.pick, u = a.deg2rad;
        a.Tick = function (a, e, h, d, m) {
            this.axis = a;
            this.pos = e;
            this.type = h || "";
            this.isNewLabel = this.isNew = !0;
            this.parameters = m || {};
            this.tickmarkOffset = this.parameters.tickmarkOffset;
            this.options = this.parameters.options;
            h || d || this.addLabel()
        };
        a.Tick.prototype = {
            addLabel: function () {
                var e = this, p = e.axis, h = p.options, d = p.chart, m = p.categories, b = p.names, g = e.pos,
                    l = t(e.options && e.options.labels, h.labels), c = p.tickPositions, w = g === c[0],
                    z = g === c[c.length - 1], m = this.parameters.category || (m ? t(m[g], b[g], g) : g),
                    k = e.label, c = c.info, D, A, n, x;
                p.isDatetimeAxis && c && (A = d.time.resolveDTLFormat(h.dateTimeLabelFormats[!h.grid && c.higherRanks[g] || c.unitName]), D = A.main);
                e.isFirst = w;
                e.isLast = z;
                e.formatCtx = {
                    axis: p,
                    chart: d,
                    isFirst: w,
                    isLast: z,
                    dateTimeLabelFormat: D,
                    tickPositionInfo: c,
                    value: p.isLog ? C(p.lin2log(m)) : m,
                    pos: g
                };
                h = p.labelFormatter.call(e.formatCtx, this.formatCtx);
                if (x = A && A.list) e.shortenLabel = function () {
                    for (n = 0; n < x.length; n++) if (k.attr({text: p.labelFormatter.call(a.extend(e.formatCtx, {dateTimeLabelFormat: x[n]}))}), k.getBBox().width < p.getSlotWidth(e) - 2 * t(l.padding, 5)) return;
                    k.attr({text: ""})
                };
                if (I(k)) k && k.textStr !== h && (!k.textWidth || l.style && l.style.width || k.styles.width || k.css({width: null}), k.attr({text: h}));
                else {
                    if (e.label = k = I(h) && l.enabled ? d.renderer.text(h, 0, 0, l.useHTML).add(p.labelGroup) : null) d.styledMode || k.css(q(l.style)), k.textPxLength = k.getBBox().width;
                    e.rotation = 0
                }
            }, getLabelSize: function () {
                return this.label ? this.label.getBBox()[this.axis.horiz ? "height" : "width"] : 0
            }, handleOverflow: function (a) {
                var e = this.axis, h = e.options.labels, d = a.x, m = e.chart.chartWidth, b = e.chart.spacing,
                    g = t(e.labelLeft, Math.min(e.pos, b[3])),
                    b = t(e.labelRight, Math.max(e.isRadial ? 0 : e.pos + e.len, m - b[1])), l = this.label,
                    c = this.rotation,
                    w = {left: 0, center: .5, right: 1}[e.labelAlign || l.attr("align")], z = l.getBBox().width,
                    k = e.getSlotWidth(this), D = k, A = 1, n, x = {};
                if (c || "justify" !== t(h.overflow, "justify")) 0 > c && d - w * z < g ? n = Math.round(d / Math.cos(c * u) - g) : 0 < c && d + w * z > b && (n = Math.round((m - d) / Math.cos(c * u))); else if (m = d + (1 - w) * z, d - w * z < g ? D = a.x + D * (1 - w) - g : m > b && (D = b - a.x + D * w, A = -1), D = Math.min(k, D), D < k && "center" === e.labelAlign && (a.x += A * (k - D - w * (k - Math.min(z, D)))), z > D || e.autoRotation && (l.styles || {}).width) n = D;
                n && (this.shortenLabel ? this.shortenLabel() : (x.width =
                    Math.floor(n), (h.style || {}).textOverflow || (x.textOverflow = "ellipsis"), l.css(x)))
            }, getPosition: function (e, p, h, d) {
                var m = this.axis, b = m.chart, g = d && b.oldChartHeight || b.chartHeight;
                e = {
                    x: e ? a.correctFloat(m.translate(p + h, null, null, d) + m.transB) : m.left + m.offset + (m.opposite ? (d && b.oldChartWidth || b.chartWidth) - m.right - m.left : 0),
                    y: e ? g - m.bottom + m.offset - (m.opposite ? m.height : 0) : a.correctFloat(g - m.translate(p + h, null, null, d) - m.transB)
                };
                k(this, "afterGetPosition", {pos: e});
                return e
            }, getLabelPosition: function (a, e, h, d,
                                           m, b, g, l) {
                var c = this.axis, w = c.transA, z = c.reversed, p = c.staggerLines,
                    D = c.tickRotCorr || {x: 0, y: 0}, A = m.y,
                    n = d || c.reserveSpaceDefault ? 0 : -c.labelOffset * ("center" === c.labelAlign ? .5 : 1),
                    x = {};
                I(A) || (A = 0 === c.side ? h.rotation ? -8 : -h.getBBox().height : 2 === c.side ? D.y + 8 : Math.cos(h.rotation * u) * (D.y - h.getBBox(!1, 0).height / 2));
                a = a + m.x + n + D.x - (b && d ? b * w * (z ? -1 : 1) : 0);
                e = e + A - (b && !d ? b * w * (z ? 1 : -1) : 0);
                p && (h = g / (l || 1) % p, c.opposite && (h = p - h - 1), e += c.labelOffset / p * h);
                x.x = a;
                x.y = Math.round(e);
                k(this, "afterGetLabelPosition", {
                    pos: x, tickmarkOffset: b,
                    index: g
                });
                return x
            }, getMarkPath: function (a, e, h, d, m, b) {
                return b.crispLine(["M", a, e, "L", a + (m ? 0 : -h), e + (m ? h : 0)], d)
            }, renderGridLine: function (a, e, h) {
                var d = this.axis, m = d.options, b = this.gridLine, g = {}, l = this.pos, c = this.type,
                    w = t(this.tickmarkOffset, d.tickmarkOffset), z = d.chart.renderer,
                    p = c ? c + "Grid" : "grid", k = m[p + "LineWidth"], A = m[p + "LineColor"],
                    m = m[p + "LineDashStyle"];
                b || (d.chart.styledMode || (g.stroke = A, g["stroke-width"] = k, m && (g.dashstyle = m)), c || (g.zIndex = 1), a && (e = 0), this.gridLine = b = z.path().attr(g).addClass("highcharts-" +
                    (c ? c + "-" : "") + "grid-line").add(d.gridGroup));
                if (b && (h = d.getPlotLinePath(l + w, b.strokeWidth() * h, a, "pass"))) b[a || this.isNew ? "attr" : "animate"]({
                    d: h,
                    opacity: e
                })
            }, renderMark: function (a, e, h) {
                var d = this.axis, m = d.options, b = d.chart.renderer, g = this.type,
                    l = g ? g + "Tick" : "tick", c = d.tickSize(l), w = this.mark, z = !w, p = a.x;
                a = a.y;
                var k = t(m[l + "Width"], !g && d.isXAxis ? 1 : 0), m = m[l + "Color"];
                c && (d.opposite && (c[0] = -c[0]), z && (this.mark = w = b.path().addClass("highcharts-" + (g ? g + "-" : "") + "tick").add(d.axisGroup), d.chart.styledMode || w.attr({
                    stroke: m,
                    "stroke-width": k
                })), w[z ? "attr" : "animate"]({
                    d: this.getMarkPath(p, a, c[0], w.strokeWidth() * h, d.horiz, b),
                    opacity: e
                }))
            }, renderLabel: function (a, p, h, d) {
                var m = this.axis, b = m.horiz, g = m.options, l = this.label, c = g.labels, w = c.step,
                    m = t(this.tickmarkOffset, m.tickmarkOffset), z = !0, k = a.x;
                a = a.y;
                l && e(k) && (l.xy = a = this.getLabelPosition(k, a, l, b, c, m, d, w), this.isFirst && !this.isLast && !t(g.showFirstLabel, 1) || this.isLast && !this.isFirst && !t(g.showLastLabel, 1) ? z = !1 : !b || c.step || c.rotation || p || 0 === h || this.handleOverflow(a), w && d % w &&
                (z = !1), z && e(a.y) ? (a.opacity = h, l[this.isNewLabel ? "attr" : "animate"](a), this.isNewLabel = !1) : (l.attr("y", -9999), this.isNewLabel = !0))
            }, render: function (e, p, h) {
                var d = this.axis, m = d.horiz, b = this.pos, g = t(this.tickmarkOffset, d.tickmarkOffset),
                    b = this.getPosition(m, b, g, p), g = b.x, l = b.y,
                    d = m && g === d.pos + d.len || !m && l === d.pos ? -1 : 1;
                h = t(h, 1);
                this.isActive = !0;
                this.renderGridLine(p, h, d);
                this.renderMark(b, h, d);
                this.renderLabel(b, p, h, e);
                this.isNew = !1;
                a.fireEvent(this, "afterRender")
            }, destroy: function () {
                F(this, this.axis)
            }
        }
    });
    K(G, "parts/Axis.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.animObject, F = a.arrayMax, k = a.arrayMin, e = a.color, q = a.correctFloat,
            t = a.defaultOptions, u = a.defined, v = a.deg2rad, p = a.destroyObjectProperties, h = a.extend,
            d = a.fireEvent, m = a.format, b = a.getMagnitude, g = a.isArray, l = a.isNumber, c = a.isString,
            w = a.merge, z = a.normalizeTickInterval, J = a.objectEach, D = a.pick, A = a.removeEvent,
            n = a.seriesTypes, x = a.splat, B = a.syncTimeout, E = a.Tick, H = function () {
                this.init.apply(this, arguments)
            };
        a.extend(H.prototype, {
            defaultOptions: {
                dateTimeLabelFormats: {
                    millisecond: {
                        main: "%H:%M:%S.%L",
                        range: !1
                    },
                    second: {main: "%H:%M:%S", range: !1},
                    minute: {main: "%H:%M", range: !1},
                    hour: {main: "%H:%M", range: !1},
                    day: {main: "%e. %b"},
                    week: {main: "%e. %b"},
                    month: {main: "%b '%y"},
                    year: {main: "%Y"}
                },
                endOnTick: !1,
                labels: {
                    enabled: !0,
                    indentation: 10,
                    x: 0,
                    style: {color: "#666666", cursor: "default", fontSize: "11px"}
                },
                maxPadding: .01,
                minorTickLength: 2,
                minorTickPosition: "outside",
                minPadding: .01,
                showEmpty: !0,
                startOfWeek: 1,
                startOnTick: !1,
                tickLength: 10,
                tickPixelInterval: 100,
                tickmarkPlacement: "between",
                tickPosition: "outside",
                title: {
                    align: "middle",
                    style: {color: "#666666"}
                },
                type: "linear",
                minorGridLineColor: "#f2f2f2",
                minorGridLineWidth: 1,
                minorTickColor: "#999999",
                lineColor: "#ccd6eb",
                lineWidth: 1,
                gridLineColor: "#e6e6e6",
                tickColor: "#ccd6eb"
            },
            defaultYAxisOptions: {
                endOnTick: !0,
                maxPadding: .05,
                minPadding: .05,
                tickPixelInterval: 72,
                showLastLabel: !0,
                labels: {x: -8},
                startOnTick: !0,
                title: {rotation: 270, text: "Values"},
                stackLabels: {
                    allowOverlap: !1, enabled: !1, formatter: function () {
                        return a.numberFormat(this.total, -1)
                    }, style: {
                        color: "#000000", fontSize: "11px", fontWeight: "bold",
                        textOutline: "1px contrast"
                    }
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            defaultLeftAxisOptions: {labels: {x: -15}, title: {rotation: 270}},
            defaultRightAxisOptions: {labels: {x: 15}, title: {rotation: 90}},
            defaultBottomAxisOptions: {labels: {autoRotation: [-45], x: 0}, margin: 15, title: {rotation: 0}},
            defaultTopAxisOptions: {labels: {autoRotation: [-45], x: 0}, margin: 15, title: {rotation: 0}},
            init: function (a, b) {
                var f = b.isX, r = this;
                r.chart = a;
                r.horiz = a.inverted && !r.isZAxis ? !f : f;
                r.isXAxis = f;
                r.coll = r.coll || (f ? "xAxis" : "yAxis");
                d(this, "init", {userOptions: b});
                r.opposite = b.opposite;
                r.side = b.side || (r.horiz ? r.opposite ? 0 : 2 : r.opposite ? 1 : 3);
                r.setOptions(b);
                var c = this.options, l = c.type;
                r.labelFormatter = c.labels.formatter || r.defaultLabelFormatter;
                r.userOptions = b;
                r.minPixelPadding = 0;
                r.reversed = c.reversed;
                r.visible = !1 !== c.visible;
                r.zoomEnabled = !1 !== c.zoomEnabled;
                r.hasNames = "category" === l || !0 === c.categories;
                r.categories = c.categories || r.hasNames;
                r.names || (r.names = [], r.names.keys = {});
                r.plotLinesAndBandsGroups = {};
                r.isLog = "logarithmic" === l;
                r.isDatetimeAxis = "datetime" ===
                    l;
                r.positiveValuesOnly = r.isLog && !r.allowNegativeLog;
                r.isLinked = u(c.linkedTo);
                r.ticks = {};
                r.labelEdge = [];
                r.minorTicks = {};
                r.plotLinesAndBands = [];
                r.alternateBands = {};
                r.len = 0;
                r.minRange = r.userMinRange = c.minRange || c.maxZoom;
                r.range = c.range;
                r.offset = c.offset || 0;
                r.stacks = {};
                r.oldStacks = {};
                r.stacksTouched = 0;
                r.max = null;
                r.min = null;
                r.crosshair = D(c.crosshair, x(a.options.tooltip.crosshairs)[f ? 0 : 1], !1);
                b = r.options.events;
                -1 === a.axes.indexOf(r) && (f ? a.axes.splice(a.xAxis.length, 0, r) : a.axes.push(r), a[r.coll].push(r));
                r.series = r.series || [];
                a.inverted && !r.isZAxis && f && void 0 === r.reversed && (r.reversed = !0);
                J(b, function (a, f) {
                    C(r, f, a)
                });
                r.lin2log = c.linearToLogConverter || r.lin2log;
                r.isLog && (r.val2lin = r.log2lin, r.lin2val = r.lin2log);
                d(this, "afterInit")
            },
            setOptions: function (a) {
                this.options = w(this.defaultOptions, "yAxis" === this.coll && this.defaultYAxisOptions, [this.defaultTopAxisOptions, this.defaultRightAxisOptions, this.defaultBottomAxisOptions, this.defaultLeftAxisOptions][this.side], w(t[this.coll], a));
                d(this, "afterSetOptions",
                    {userOptions: a})
            },
            defaultLabelFormatter: function () {
                var f = this.axis, b = this.value, c = f.chart.time, d = f.categories,
                    l = this.dateTimeLabelFormat, g = t.lang, n = g.numericSymbols,
                    g = g.numericSymbolMagnitude || 1E3, e = n && n.length, h, x = f.options.labels.format,
                    f = f.isLog ? Math.abs(b) : f.tickInterval;
                if (x) h = m(x, this, c); else if (d) h = b; else if (l) h = c.dateFormat(l, b); else if (e && 1E3 <= f) for (; e-- && void 0 === h;) c = Math.pow(g, e + 1), f >= c && 0 === 10 * b % c && null !== n[e] && 0 !== b && (h = a.numberFormat(b / c, -1) + n[e]);
                void 0 === h && (h = 1E4 <= Math.abs(b) ? a.numberFormat(b,
                    -1) : a.numberFormat(b, -1, void 0, ""));
                return h
            },
            getSeriesExtremes: function () {
                var a = this, b = a.chart, c;
                d(this, "getSeriesExtremes", null, function () {
                    a.hasVisibleSeries = !1;
                    a.dataMin = a.dataMax = a.threshold = null;
                    a.softThreshold = !a.isXAxis;
                    a.buildStacks && a.buildStacks();
                    a.series.forEach(function (f) {
                        if (f.visible || !b.options.chart.ignoreHiddenSeries) {
                            var r = f.options, d = r.threshold, g, n;
                            a.hasVisibleSeries = !0;
                            a.positiveValuesOnly && 0 >= d && (d = null);
                            if (a.isXAxis) r = f.xData, r.length && (c = f.getXExtremes(r), g = c.min, n = c.max,
                            l(g) || g instanceof Date || (r = r.filter(l), c = f.getXExtremes(r), g = c.min, n = c.max), r.length && (a.dataMin = Math.min(D(a.dataMin, g), g), a.dataMax = Math.max(D(a.dataMax, n), n))); else if (f.getExtremes(), n = f.dataMax, g = f.dataMin, u(g) && u(n) && (a.dataMin = Math.min(D(a.dataMin, g), g), a.dataMax = Math.max(D(a.dataMax, n), n)), u(d) && (a.threshold = d), !r.softThreshold || a.positiveValuesOnly) a.softThreshold = !1
                        }
                    })
                });
                d(this, "afterGetSeriesExtremes")
            },
            translate: function (a, b, c, d, g, n) {
                var f = this.linkedParent || this, r = 1, e = 0, h = d ? f.oldTransA :
                    f.transA;
                d = d ? f.oldMin : f.min;
                var x = f.minPixelPadding;
                g = (f.isOrdinal || f.isBroken || f.isLog && g) && f.lin2val;
                h || (h = f.transA);
                c && (r *= -1, e = f.len);
                f.reversed && (r *= -1, e -= r * (f.sector || f.len));
                b ? (a = (a * r + e - x) / h + d, g && (a = f.lin2val(a))) : (g && (a = f.val2lin(a)), a = l(d) ? r * (a - d) * h + e + r * x + (l(n) ? h * n : 0) : void 0);
                return a
            },
            toPixels: function (a, b) {
                return this.translate(a, !1, !this.horiz, null, !0) + (b ? 0 : this.pos)
            },
            toValue: function (a, b) {
                return this.translate(a - (b ? 0 : this.pos), !0, !this.horiz, null, !0)
            },
            getPlotLinePath: function (a, b, c, g,
                                       n) {
                var f = this, r = f.chart, e = f.left, h = f.top, x, m, B, w,
                    L = c && r.oldChartHeight || r.chartHeight, z = c && r.oldChartWidth || r.chartWidth, p,
                    k = f.transB, A, E = function (a, f, b) {
                        if ("pass" !== g && a < f || a > b) g ? a = Math.min(Math.max(f, a), b) : p = !0;
                        return a
                    };
                A = {value: a, lineWidth: b, old: c, force: g, translatedValue: n};
                d(this, "getPlotLinePath", A, function (d) {
                    n = D(n, f.translate(a, null, null, c));
                    n = Math.min(Math.max(-1E5, n), 1E5);
                    x = B = Math.round(n + k);
                    m = w = Math.round(L - n - k);
                    l(n) ? f.horiz ? (m = h, w = L - f.bottom, x = B = E(x, e, e + f.width)) : (x = e, B = z - f.right, m = w =
                        E(m, h, h + f.height)) : (p = !0, g = !1);
                    d.path = p && !g ? null : r.renderer.crispLine(["M", x, m, "L", B, w], b || 1)
                });
                return A.path
            },
            getLinearTickPositions: function (a, b, c) {
                var f, r = q(Math.floor(b / a) * a);
                c = q(Math.ceil(c / a) * a);
                var d = [], g;
                q(r + a) === r && (g = 20);
                if (this.single) return [b];
                for (b = r; b <= c;) {
                    d.push(b);
                    b = q(b + a, g);
                    if (b === f) break;
                    f = b
                }
                return d
            },
            getMinorTickInterval: function () {
                var a = this.options;
                return !0 === a.minorTicks ? D(a.minorTickInterval, "auto") : !1 === a.minorTicks ? null : a.minorTickInterval
            },
            getMinorTickPositions: function () {
                var a =
                        this, b = a.options, c = a.tickPositions, d = a.minorTickInterval, g = [],
                    l = a.pointRangePadding || 0, n = a.min - l, l = a.max + l, e = l - n;
                if (e && e / d < a.len / 3) if (a.isLog) this.paddedTicks.forEach(function (f, b, r) {
                    b && g.push.apply(g, a.getLogTickPositions(d, r[b - 1], r[b], !0))
                }); else if (a.isDatetimeAxis && "auto" === this.getMinorTickInterval()) g = g.concat(a.getTimeTicks(a.normalizeTimeTickInterval(d), n, l, b.startOfWeek)); else for (b = n + (c[0] - n) % d; b <= l && b !== g[0]; b += d) g.push(b);
                0 !== g.length && a.trimTicks(g);
                return g
            },
            adjustForMinRange: function () {
                var a =
                    this.options, b = this.min, c = this.max, d, g, l, n, e, h, x, m;
                this.isXAxis && void 0 === this.minRange && !this.isLog && (u(a.min) || u(a.max) ? this.minRange = null : (this.series.forEach(function (a) {
                    h = a.xData;
                    for (n = x = a.xIncrement ? 1 : h.length - 1; 0 < n; n--) if (e = h[n] - h[n - 1], void 0 === l || e < l) l = e
                }), this.minRange = Math.min(5 * l, this.dataMax - this.dataMin)));
                c - b < this.minRange && (g = this.dataMax - this.dataMin >= this.minRange, m = this.minRange, d = (m - c + b) / 2, d = [b - d, D(a.min, b - d)], g && (d[2] = this.isLog ? this.log2lin(this.dataMin) : this.dataMin), b = F(d),
                    c = [b + m, D(a.max, b + m)], g && (c[2] = this.isLog ? this.log2lin(this.dataMax) : this.dataMax), c = k(c), c - b < m && (d[0] = c - m, d[1] = D(a.min, c - m), b = F(d)));
                this.min = b;
                this.max = c
            },
            getClosest: function () {
                var a;
                this.categories ? a = 1 : this.series.forEach(function (f) {
                    var b = f.closestPointRange, r = f.visible || !f.chart.options.chart.ignoreHiddenSeries;
                    !f.noSharedTooltip && u(b) && r && (a = u(a) ? Math.min(a, b) : b)
                });
                return a
            },
            nameToX: function (a) {
                var f = g(this.categories), b = f ? this.categories : this.names, c = a.options.x, d;
                a.series.requireSorting = !1;
                u(c) || (c = !1 === this.options.uniqueNames ? a.series.autoIncrement() : f ? b.indexOf(a.name) : D(b.keys[a.name], -1));
                -1 === c ? f || (d = b.length) : d = c;
                void 0 !== d && (this.names[d] = a.name, this.names.keys[a.name] = d);
                return d
            },
            updateNames: function () {
                var a = this, b = this.names;
                0 < b.length && (Object.keys(b.keys).forEach(function (a) {
                    delete b.keys[a]
                }), b.length = 0, this.minRange = this.userMinRange, (this.series || []).forEach(function (f) {
                    f.xIncrement = null;
                    if (!f.points || f.isDirtyData) a.max = Math.max(a.max, f.xData.length - 1), f.processData(),
                        f.generatePoints();
                    f.data.forEach(function (b, c) {
                        var r;
                        b && b.options && void 0 !== b.name && (r = a.nameToX(b), void 0 !== r && r !== b.x && (b.x = r, f.xData[c] = r))
                    })
                }))
            },
            setAxisTranslation: function (a) {
                var f = this, b = f.max - f.min, g = f.axisPointRange || 0, l, e = 0, h = 0, x = f.linkedParent,
                    m = !!f.categories, B = f.transA, w = f.isXAxis;
                if (w || m || g) l = f.getClosest(), x ? (e = x.minPointOffset, h = x.pointRangePadding) : f.series.forEach(function (a) {
                    var b = m ? 1 : w ? D(a.options.pointRange, l, 0) : f.axisPointRange || 0,
                        r = a.options.pointPlacement;
                    g = Math.max(g, b);
                    if (!f.single ||
                        m) a = n.xrange && a instanceof n.xrange ? !w : w, e = Math.max(e, a && c(r) ? 0 : b / 2), h = Math.max(h, a && "on" === r ? 0 : b)
                }), x = f.ordinalSlope && l ? f.ordinalSlope / l : 1, f.minPointOffset = e *= x, f.pointRangePadding = h *= x, f.pointRange = Math.min(g, b), w && (f.closestPointRange = l);
                a && (f.oldTransA = B);
                f.translationSlope = f.transA = B = f.staticScale || f.len / (b + h || 1);
                f.transB = f.horiz ? f.left : f.bottom;
                f.minPixelPadding = B * e;
                d(this, "afterSetAxisTranslation")
            },
            minFromRange: function () {
                return this.max - this.range
            },
            setTickInterval: function (f) {
                var c = this,
                    g = c.chart, n = c.options, e = c.isLog, h = c.isDatetimeAxis, x = c.isXAxis,
                    m = c.isLinked, B = n.maxPadding, w = n.minPadding, p, k = n.tickInterval,
                    A = n.tickPixelInterval, E = c.categories, H = l(c.threshold) ? c.threshold : null,
                    J = c.softThreshold, t, v, C;
                h || E || m || this.getTickAmount();
                v = D(c.userMin, n.min);
                C = D(c.userMax, n.max);
                m ? (c.linkedParent = g[c.coll][n.linkedTo], p = c.linkedParent.getExtremes(), c.min = D(p.min, p.dataMin), c.max = D(p.max, p.dataMax), n.type !== c.linkedParent.options.type && a.error(11, 1, g)) : (!J && u(H) && (c.dataMin >= H ? (p = H, w = 0) :
                    c.dataMax <= H && (t = H, B = 0)), c.min = D(v, p, c.dataMin), c.max = D(C, t, c.dataMax));
                e && (c.positiveValuesOnly && !f && 0 >= Math.min(c.min, D(c.dataMin, c.min)) && a.error(10, 1, g), c.min = q(c.log2lin(c.min), 15), c.max = q(c.log2lin(c.max), 15));
                c.range && u(c.max) && (c.userMin = c.min = v = Math.max(c.dataMin, c.minFromRange()), c.userMax = C = c.max, c.range = null);
                d(c, "foundExtremes");
                c.beforePadding && c.beforePadding();
                c.adjustForMinRange();
                !(E || c.axisPointRange || c.usePercentage || m) && u(c.min) && u(c.max) && (g = c.max - c.min) && (!u(v) && w && (c.min -=
                    g * w), !u(C) && B && (c.max += g * B));
                l(n.softMin) && !l(c.userMin) && n.softMin < c.min && (c.min = v = n.softMin);
                l(n.softMax) && !l(c.userMax) && n.softMax > c.max && (c.max = C = n.softMax);
                l(n.floor) && (c.min = Math.min(Math.max(c.min, n.floor), Number.MAX_VALUE));
                l(n.ceiling) && (c.max = Math.max(Math.min(c.max, n.ceiling), D(c.userMax, -Number.MAX_VALUE)));
                J && u(c.dataMin) && (H = H || 0, !u(v) && c.min < H && c.dataMin >= H ? c.min = c.options.minRange ? Math.min(H, c.max - c.minRange) : H : !u(C) && c.max > H && c.dataMax <= H && (c.max = c.options.minRange ? Math.max(H, c.min +
                    c.minRange) : H));
                c.tickInterval = c.min === c.max || void 0 === c.min || void 0 === c.max ? 1 : m && !k && A === c.linkedParent.options.tickPixelInterval ? k = c.linkedParent.tickInterval : D(k, this.tickAmount ? (c.max - c.min) / Math.max(this.tickAmount - 1, 1) : void 0, E ? 1 : (c.max - c.min) * A / Math.max(c.len, A));
                x && !f && c.series.forEach(function (a) {
                    a.processData(c.min !== c.oldMin || c.max !== c.oldMax)
                });
                c.setAxisTranslation(!0);
                c.beforeSetTickPositions && c.beforeSetTickPositions();
                c.postProcessTickInterval && (c.tickInterval = c.postProcessTickInterval(c.tickInterval));
                c.pointRange && !k && (c.tickInterval = Math.max(c.pointRange, c.tickInterval));
                f = D(n.minTickInterval, c.isDatetimeAxis && c.closestPointRange);
                !k && c.tickInterval < f && (c.tickInterval = f);
                h || e || k || (c.tickInterval = z(c.tickInterval, null, b(c.tickInterval), D(n.allowDecimals, !(.5 < c.tickInterval && 5 > c.tickInterval && 1E3 < c.max && 9999 > c.max)), !!this.tickAmount));
                this.tickAmount || (c.tickInterval = c.unsquish());
                this.setTickPositions()
            },
            setTickPositions: function () {
                var f = this.options, c, b = f.tickPositions;
                c = this.getMinorTickInterval();
                var g = f.tickPositioner, l = f.startOnTick, n = f.endOnTick;
                this.tickmarkOffset = this.categories && "between" === f.tickmarkPlacement && 1 === this.tickInterval ? .5 : 0;
                this.minorTickInterval = "auto" === c && this.tickInterval ? this.tickInterval / 5 : c;
                this.single = this.min === this.max && u(this.min) && !this.tickAmount && (parseInt(this.min, 10) === this.min || !1 !== f.allowDecimals);
                this.tickPositions = c = b && b.slice();
                !c && (!this.ordinalPositions && (this.max - this.min) / this.tickInterval > Math.max(2 * this.len, 200) ? (c = [this.min, this.max], a.error(19,
                    !1, this.chart)) : c = this.isDatetimeAxis ? this.getTimeTicks(this.normalizeTimeTickInterval(this.tickInterval, f.units), this.min, this.max, f.startOfWeek, this.ordinalPositions, this.closestPointRange, !0) : this.isLog ? this.getLogTickPositions(this.tickInterval, this.min, this.max) : this.getLinearTickPositions(this.tickInterval, this.min, this.max), c.length > this.len && (c = [c[0], c.pop()], c[0] === c[1] && (c.length = 1)), this.tickPositions = c, g && (g = g.apply(this, [this.min, this.max]))) && (this.tickPositions = c = g);
                this.paddedTicks =
                    c.slice(0);
                this.trimTicks(c, l, n);
                this.isLinked || (this.single && 2 > c.length && !this.categories && (this.min -= .5, this.max += .5), b || g || this.adjustTickAmount());
                d(this, "afterSetTickPositions")
            },
            trimTicks: function (a, c, b) {
                var f = a[0], g = a[a.length - 1], l = this.minPointOffset || 0;
                d(this, "trimTicks");
                if (!this.isLinked) {
                    if (c && -Infinity !== f) this.min = f; else for (; this.min - l > a[0];) a.shift();
                    if (b) this.max = g; else for (; this.max + l < a[a.length - 1];) a.pop();
                    0 === a.length && u(f) && !this.options.tickPositions && a.push((g + f) / 2)
                }
            },
            alignToOthers: function () {
                var a =
                    {}, c, b = this.options;
                !1 === this.chart.options.chart.alignTicks || !1 === b.alignTicks || !1 === b.startOnTick || !1 === b.endOnTick || this.isLog || this.chart[this.coll].forEach(function (f) {
                    var b = f.options, b = [f.horiz ? b.left : b.top, b.width, b.height, b.pane].join();
                    f.series.length && (a[b] ? c = !0 : a[b] = 1)
                });
                return c
            },
            getTickAmount: function () {
                var a = this.options, c = a.tickAmount, b = a.tickPixelInterval;
                !u(a.tickInterval) && this.len < b && !this.isRadial && !this.isLog && a.startOnTick && a.endOnTick && (c = 2);
                !c && this.alignToOthers() && (c = Math.ceil(this.len /
                    b) + 1);
                4 > c && (this.finalTickAmt = c, c = 5);
                this.tickAmount = c
            },
            adjustTickAmount: function () {
                var a = this.options, c = this.tickInterval, b = this.tickPositions, d = this.tickAmount,
                    g = this.finalTickAmt, l = b && b.length,
                    n = D(this.threshold, this.softThreshold ? 0 : null), e;
                if (this.hasData()) {
                    if (l < d) {
                        for (e = this.min; b.length < d;) b.length % 2 || e === n ? b.push(q(b[b.length - 1] + c)) : b.unshift(q(b[0] - c));
                        this.transA *= (l - 1) / (d - 1);
                        this.min = a.startOnTick ? b[0] : Math.min(this.min, b[0]);
                        this.max = a.endOnTick ? b[b.length - 1] : Math.max(this.max, b[b.length -
                        1])
                    } else l > d && (this.tickInterval *= 2, this.setTickPositions());
                    if (u(g)) {
                        for (c = a = b.length; c--;) (3 === g && 1 === c % 2 || 2 >= g && 0 < c && c < a - 1) && b.splice(c, 1);
                        this.finalTickAmt = void 0
                    }
                }
            },
            setScale: function () {
                var a = this.series.some(function (a) {
                    return a.isDirtyData || a.isDirty || a.xAxis.isDirty
                }), c;
                this.oldMin = this.min;
                this.oldMax = this.max;
                this.oldAxisLength = this.len;
                this.setAxisSize();
                (c = this.len !== this.oldAxisLength) || a || this.isLinked || this.forceRedraw || this.userMin !== this.oldUserMin || this.userMax !== this.oldUserMax ||
                this.alignToOthers() ? (this.resetStacks && this.resetStacks(), this.forceRedraw = !1, this.getSeriesExtremes(), this.setTickInterval(), this.oldUserMin = this.userMin, this.oldUserMax = this.userMax, this.isDirty || (this.isDirty = c || this.min !== this.oldMin || this.max !== this.oldMax)) : this.cleanStacks && this.cleanStacks();
                d(this, "afterSetScale")
            },
            setExtremes: function (a, c, b, g, l) {
                var f = this, n = f.chart;
                b = D(b, !0);
                f.series.forEach(function (a) {
                    delete a.kdTree
                });
                l = h(l, {min: a, max: c});
                d(f, "setExtremes", l, function () {
                    f.userMin = a;
                    f.userMax = c;
                    f.eventArgs = l;
                    b && n.redraw(g)
                })
            },
            zoom: function (a, c) {
                var f = this.dataMin, b = this.dataMax, g = this.options, l = Math.min(f, D(g.min, f)),
                    n = Math.max(b, D(g.max, b));
                a = {newMin: a, newMax: c};
                d(this, "zoom", a, function (a) {
                    var c = a.newMin, d = a.newMax;
                    if (c !== this.min || d !== this.max) this.allowZoomOutside || (u(f) && (c < l && (c = l), c > n && (c = n)), u(b) && (d < l && (d = l), d > n && (d = n))), this.displayBtn = void 0 !== c || void 0 !== d, this.setExtremes(c, d, !1, void 0, {trigger: "zoom"});
                    a.zoomed = !0
                });
                return a.zoomed
            },
            setAxisSize: function () {
                var f =
                        this.chart, c = this.options, b = c.offsets || [0, 0, 0, 0], d = this.horiz,
                    g = this.width = Math.round(a.relativeLength(D(c.width, f.plotWidth - b[3] + b[1]), f.plotWidth)),
                    l = this.height = Math.round(a.relativeLength(D(c.height, f.plotHeight - b[0] + b[2]), f.plotHeight)),
                    n = this.top = Math.round(a.relativeLength(D(c.top, f.plotTop + b[0]), f.plotHeight, f.plotTop)),
                    c = this.left = Math.round(a.relativeLength(D(c.left, f.plotLeft + b[3]), f.plotWidth, f.plotLeft));
                this.bottom = f.chartHeight - l - n;
                this.right = f.chartWidth - g - c;
                this.len = Math.max(d ? g :
                    l, 0);
                this.pos = d ? c : n
            },
            getExtremes: function () {
                var a = this.isLog;
                return {
                    min: a ? q(this.lin2log(this.min)) : this.min,
                    max: a ? q(this.lin2log(this.max)) : this.max,
                    dataMin: this.dataMin,
                    dataMax: this.dataMax,
                    userMin: this.userMin,
                    userMax: this.userMax
                }
            },
            getThreshold: function (a) {
                var f = this.isLog, c = f ? this.lin2log(this.min) : this.min,
                    f = f ? this.lin2log(this.max) : this.max;
                null === a || -Infinity === a ? a = c : Infinity === a ? a = f : c > a ? a = c : f < a && (a = f);
                return this.translate(a, 0, 1, 0, 1)
            },
            autoLabelAlign: function (a) {
                var f = (D(a, 0) - 90 * this.side +
                    720) % 360;
                a = {align: "center"};
                d(this, "autoLabelAlign", a, function (a) {
                    15 < f && 165 > f ? a.align = "right" : 195 < f && 345 > f && (a.align = "left")
                });
                return a.align
            },
            tickSize: function (a) {
                var f = this.options, c = f[a + "Length"],
                    b = D(f[a + "Width"], "tick" === a && this.isXAxis && !this.categories ? 1 : 0), g;
                b && c && ("inside" === f[a + "Position"] && (c = -c), g = [c, b]);
                a = {tickSize: g};
                d(this, "afterTickSize", a);
                return a.tickSize
            },
            labelMetrics: function () {
                var a = this.tickPositions && this.tickPositions[0] || 0;
                return this.chart.renderer.fontMetrics(this.options.labels.style &&
                    this.options.labels.style.fontSize, this.ticks[a] && this.ticks[a].label)
            },
            unsquish: function () {
                var a = this.options.labels, c = this.horiz, b = this.tickInterval, d = b,
                    g = this.len / (((this.categories ? 1 : 0) + this.max - this.min) / b), l, n = a.rotation,
                    e = this.labelMetrics(), h, x = Number.MAX_VALUE, m, B = this.max - this.min,
                    w = function (a) {
                        var f = a / (g || 1), f = 1 < f ? Math.ceil(f) : 1;
                        f * b > B && Infinity !== a && Infinity !== g && (f = Math.ceil(B / b));
                        return q(f * b)
                    };
                c ? (m = !a.staggerLines && !a.step && (u(n) ? [n] : g < D(a.autoRotationLimit, 80) && a.autoRotation)) && m.forEach(function (a) {
                    var f;
                    if (a === n || a && -90 <= a && 90 >= a) h = w(Math.abs(e.h / Math.sin(v * a))), f = h + Math.abs(a / 360), f < x && (x = f, l = a, d = h)
                }) : a.step || (d = w(e.h));
                this.autoRotation = m;
                this.labelRotation = D(l, n);
                return d
            },
            getSlotWidth: function (a) {
                var f = this.chart, c = this.horiz, b = this.options.labels,
                    d = Math.max(this.tickPositions.length - (this.categories ? 0 : 1), 1), g = f.margin[3];
                return a && a.slotWidth || c && 2 > (b.step || 0) && !b.rotation && (this.staggerLines || 1) * this.len / d || !c && (b.style && parseInt(b.style.width, 10) || g && g - f.spacing[3] || .33 * f.chartWidth)
            },
            renderUnsquish: function () {
                var a =
                        this.chart, b = a.renderer, d = this.tickPositions, g = this.ticks, l = this.options.labels,
                    n = l && l.style || {}, e = this.horiz, h = this.getSlotWidth(),
                    x = Math.max(1, Math.round(h - 2 * (l.padding || 5))), m = {}, B = this.labelMetrics(),
                    w = l.style && l.style.textOverflow, z, p, k = 0, A;
                c(l.rotation) || (m.rotation = l.rotation || 0);
                d.forEach(function (a) {
                    (a = g[a]) && a.label && a.label.textPxLength > k && (k = a.label.textPxLength)
                });
                this.maxLabelLength = k;
                if (this.autoRotation) k > x && k > B.h ? m.rotation = this.labelRotation : this.labelRotation = 0; else if (h && (z = x,
                    !w)) for (p = "clip", x = d.length; !e && x--;) if (A = d[x], A = g[A].label) A.styles && "ellipsis" === A.styles.textOverflow ? A.css({textOverflow: "clip"}) : A.textPxLength > h && A.css({width: h + "px"}), A.getBBox().height > this.len / d.length - (B.h - B.f) && (A.specificTextOverflow = "ellipsis");
                m.rotation && (z = k > .5 * a.chartHeight ? .33 * a.chartHeight : k, w || (p = "ellipsis"));
                if (this.labelAlign = l.align || this.autoLabelAlign(this.labelRotation)) m.align = this.labelAlign;
                d.forEach(function (a) {
                    var f = (a = g[a]) && a.label, c = n.width, b = {};
                    f && (f.attr(m), a.shortenLabel ?
                        a.shortenLabel() : z && !c && "nowrap" !== n.whiteSpace && (z < f.textPxLength || "SPAN" === f.element.tagName) ? (b.width = z, w || (b.textOverflow = f.specificTextOverflow || p), f.css(b)) : f.styles && f.styles.width && !b.width && !c && f.css({width: null}), delete f.specificTextOverflow, a.rotation = m.rotation)
                }, this);
                this.tickRotCorr = b.rotCorr(B.b, this.labelRotation || 0, 0 !== this.side)
            },
            hasData: function () {
                return this.series.some(function (a) {
                    return a.hasData()
                }) || this.options.showEmpty && u(this.min) && u(this.max)
            },
            addTitle: function (a) {
                var f =
                        this.chart.renderer, c = this.horiz, b = this.opposite, d = this.options.title, g,
                    l = this.chart.styledMode;
                this.axisTitle || ((g = d.textAlign) || (g = (c ? {
                    low: "left",
                    middle: "center",
                    high: "right"
                } : {
                    low: b ? "right" : "left",
                    middle: "center",
                    high: b ? "left" : "right"
                })[d.align]), this.axisTitle = f.text(d.text, 0, 0, d.useHTML).attr({
                    zIndex: 7,
                    rotation: d.rotation || 0,
                    align: g
                }).addClass("highcharts-axis-title"), l || this.axisTitle.css(w(d.style)), this.axisTitle.add(this.axisGroup), this.axisTitle.isNew = !0);
                l || d.style.width || this.isRadial ||
                this.axisTitle.css({width: this.len});
                this.axisTitle[a ? "show" : "hide"](!0)
            },
            generateTick: function (a) {
                var f = this.ticks;
                f[a] ? f[a].addLabel() : f[a] = new E(this, a)
            },
            getOffset: function () {
                var a = this, c = a.chart, b = c.renderer, g = a.options, l = a.tickPositions, n = a.ticks,
                    e = a.horiz, h = a.side, x = c.inverted && !a.isZAxis ? [1, 0, 3, 2][h] : h, m, B, w = 0, z,
                    p = 0, k = g.title, A = g.labels, E = 0, H = c.axisOffset, c = c.clipOffset,
                    q = [-1, 1, 1, -1][h], t = g.className, v = a.axisParent;
                m = a.hasData();
                a.showAxis = B = m || D(g.showEmpty, !0);
                a.staggerLines = a.horiz && A.staggerLines;
                a.axisGroup || (a.gridGroup = b.g("grid").attr({zIndex: g.gridZIndex || 1}).addClass("highcharts-" + this.coll.toLowerCase() + "-grid " + (t || "")).add(v), a.axisGroup = b.g("axis").attr({zIndex: g.zIndex || 2}).addClass("highcharts-" + this.coll.toLowerCase() + " " + (t || "")).add(v), a.labelGroup = b.g("axis-labels").attr({zIndex: A.zIndex || 7}).addClass("highcharts-" + a.coll.toLowerCase() + "-labels " + (t || "")).add(v));
                m || a.isLinked ? (l.forEach(function (c, b) {
                    a.generateTick(c, b)
                }), a.renderUnsquish(), a.reserveSpaceDefault = 0 === h || 2 ===
                    h || {
                        1: "left",
                        3: "right"
                    }[h] === a.labelAlign, D(A.reserveSpace, "center" === a.labelAlign ? !0 : null, a.reserveSpaceDefault) && l.forEach(function (a) {
                    E = Math.max(n[a].getLabelSize(), E)
                }), a.staggerLines && (E *= a.staggerLines), a.labelOffset = E * (a.opposite ? -1 : 1)) : J(n, function (a, c) {
                    a.destroy();
                    delete n[c]
                });
                k && k.text && !1 !== k.enabled && (a.addTitle(B), B && !1 !== k.reserveSpace && (a.titleOffset = w = a.axisTitle.getBBox()[e ? "height" : "width"], z = k.offset, p = u(z) ? 0 : D(k.margin, e ? 5 : 10)));
                a.renderLine();
                a.offset = q * D(g.offset, H[h] ? H[h] +
                    (g.margin || 0) : 0);
                a.tickRotCorr = a.tickRotCorr || {x: 0, y: 0};
                b = 0 === h ? -a.labelMetrics().h : 2 === h ? a.tickRotCorr.y : 0;
                p = Math.abs(E) + p;
                E && (p = p - b + q * (e ? D(A.y, a.tickRotCorr.y + 8 * q) : A.x));
                a.axisTitleMargin = D(z, p);
                a.getMaxLabelDimensions && (a.maxLabelDimensions = a.getMaxLabelDimensions(n, l));
                e = this.tickSize("tick");
                H[h] = Math.max(H[h], a.axisTitleMargin + w + q * a.offset, p, l && l.length && e ? e[0] + q * a.offset : 0);
                g = g.offset ? 0 : 2 * Math.floor(a.axisLine.strokeWidth() / 2);
                c[x] = Math.max(c[x], g);
                d(this, "afterGetOffset")
            },
            getLinePath: function (a) {
                var c =
                        this.chart, b = this.opposite, f = this.offset, d = this.horiz,
                    g = this.left + (b ? this.width : 0) + f,
                    f = c.chartHeight - this.bottom - (b ? this.height : 0) + f;
                b && (a *= -1);
                return c.renderer.crispLine(["M", d ? this.left : g, d ? f : this.top, "L", d ? c.chartWidth - this.right : g, d ? f : c.chartHeight - this.bottom], a)
            },
            renderLine: function () {
                this.axisLine || (this.axisLine = this.chart.renderer.path().addClass("highcharts-axis-line").add(this.axisGroup), this.chart.styledMode || this.axisLine.attr({
                    stroke: this.options.lineColor, "stroke-width": this.options.lineWidth,
                    zIndex: 7
                }))
            },
            getTitlePosition: function () {
                var a = this.horiz, c = this.left, b = this.top, g = this.len, l = this.options.title,
                    n = a ? c : b, e = this.opposite, h = this.offset, x = l.x || 0, m = l.y || 0,
                    B = this.axisTitle, w = this.chart.renderer.fontMetrics(l.style && l.style.fontSize, B),
                    B = Math.max(B.getBBox(null, 0).height - w.h - 1, 0),
                    g = {low: n + (a ? 0 : g), middle: n + g / 2, high: n + (a ? g : 0)}[l.align],
                    c = (a ? b + this.height : c) + (a ? 1 : -1) * (e ? -1 : 1) * this.axisTitleMargin + [-B, B, w.f, -B][this.side],
                    a = {
                        x: a ? g + x : c + (e ? this.width : 0) + h + x,
                        y: a ? c + m - (e ? this.height : 0) + h : g + m
                    };
                d(this, "afterGetTitlePosition", {titlePosition: a});
                return a
            },
            renderMinorTick: function (a) {
                var c = this.chart.hasRendered && l(this.oldMin), b = this.minorTicks;
                b[a] || (b[a] = new E(this, a, "minor"));
                c && b[a].isNew && b[a].render(null, !0);
                b[a].render(null, !1, 1)
            },
            renderTick: function (a, c) {
                var b = this.isLinked, f = this.ticks, d = this.chart.hasRendered && l(this.oldMin);
                if (!b || a >= this.min && a <= this.max) f[a] || (f[a] = new E(this, a)), d && f[a].isNew && f[a].render(c, !0, -1), f[a].render(c)
            },
            render: function () {
                var c = this, b = c.chart, g = c.options,
                    n = c.isLog, e = c.isLinked, h = c.tickPositions, x = c.axisTitle, m = c.ticks,
                    w = c.minorTicks, z = c.alternateBands, p = g.stackLabels, k = g.alternateGridColor,
                    A = c.tickmarkOffset, H = c.axisLine, D = c.showAxis, q = I(b.renderer.globalAnimation), t,
                    v;
                c.labelEdge.length = 0;
                c.overlap = !1;
                [m, w, z].forEach(function (a) {
                    J(a, function (a) {
                        a.isActive = !1
                    })
                });
                if (c.hasData() || e) c.minorTickInterval && !c.categories && c.getMinorTickPositions().forEach(function (a) {
                    c.renderMinorTick(a)
                }), h.length && (h.forEach(function (a, b) {
                    c.renderTick(a, b)
                }), A && (0 ===
                    c.min || c.single) && (m[-1] || (m[-1] = new E(c, -1, null, !0)), m[-1].render(-1))), k && h.forEach(function (f, d) {
                    v = void 0 !== h[d + 1] ? h[d + 1] + A : c.max - A;
                    0 === d % 2 && f < c.max && v <= c.max + (b.polar ? -A : A) && (z[f] || (z[f] = new a.PlotLineOrBand(c)), t = f + A, z[f].options = {
                        from: n ? c.lin2log(t) : t,
                        to: n ? c.lin2log(v) : v,
                        color: k
                    }, z[f].render(), z[f].isActive = !0)
                }), c._addedPlotLB || ((g.plotLines || []).concat(g.plotBands || []).forEach(function (a) {
                    c.addPlotBandOrLine(a)
                }), c._addedPlotLB = !0);
                [m, w, z].forEach(function (a) {
                    var c, f = [], d = q.duration;
                    J(a, function (a,
                                   c) {
                        a.isActive || (a.render(c, !1, 0), a.isActive = !1, f.push(c))
                    });
                    B(function () {
                        for (c = f.length; c--;) a[f[c]] && !a[f[c]].isActive && (a[f[c]].destroy(), delete a[f[c]])
                    }, a !== z && b.hasRendered && d ? d : 0)
                });
                H && (H[H.isPlaced ? "animate" : "attr"]({d: this.getLinePath(H.strokeWidth())}), H.isPlaced = !0, H[D ? "show" : "hide"](!0));
                x && D && (g = c.getTitlePosition(), l(g.y) ? (x[x.isNew ? "attr" : "animate"](g), x.isNew = !1) : (x.attr("y", -9999), x.isNew = !0));
                p && p.enabled && c.renderStackTotals();
                c.isDirty = !1;
                d(this, "afterRender")
            },
            redraw: function () {
                this.visible &&
                (this.render(), this.plotLinesAndBands.forEach(function (a) {
                    a.render()
                }));
                this.series.forEach(function (a) {
                    a.isDirty = !0
                })
            },
            keepProps: "extKey hcEvents names series userMax userMin".split(" "),
            destroy: function (a) {
                var c = this, b = c.stacks, f = c.plotLinesAndBands, g;
                d(this, "destroy", {keepEvents: a});
                a || A(c);
                J(b, function (a, c) {
                    p(a);
                    b[c] = null
                });
                [c.ticks, c.minorTicks, c.alternateBands].forEach(function (a) {
                    p(a)
                });
                if (f) for (a = f.length; a--;) f[a].destroy();
                "stackTotalGroup axisLine axisTitle axisGroup gridGroup labelGroup cross scrollbar".split(" ").forEach(function (a) {
                    c[a] &&
                    (c[a] = c[a].destroy())
                });
                for (g in c.plotLinesAndBandsGroups) c.plotLinesAndBandsGroups[g] = c.plotLinesAndBandsGroups[g].destroy();
                J(c, function (a, b) {
                    -1 === c.keepProps.indexOf(b) && delete c[b]
                })
            },
            drawCrosshair: function (a, c) {
                var b, f = this.crosshair, g = D(f.snap, !0), l, n = this.cross;
                d(this, "drawCrosshair", {e: a, point: c});
                a || (a = this.cross && this.cross.e);
                if (this.crosshair && !1 !== (u(c) || !g)) {
                    g ? u(c) && (l = D(c.crosshairPos, this.isXAxis ? c.plotX : this.len - c.plotY)) : l = a && (this.horiz ? a.chartX - this.pos : this.len - a.chartY + this.pos);
                    u(l) && (b = this.getPlotLinePath(c && (this.isXAxis ? c.x : D(c.stackY, c.y)), null, null, null, l) || null);
                    if (!u(b)) {
                        this.hideCrosshair();
                        return
                    }
                    g = this.categories && !this.isRadial;
                    n || (this.cross = n = this.chart.renderer.path().addClass("highcharts-crosshair highcharts-crosshair-" + (g ? "category " : "thin ") + f.className).attr({zIndex: D(f.zIndex, 2)}).add(), this.chart.styledMode || (n.attr({
                        stroke: f.color || (g ? e("#ccd6eb").setOpacity(.25).get() : "#cccccc"),
                        "stroke-width": D(f.width, 1)
                    }).css({"pointer-events": "none"}), f.dashStyle &&
                    n.attr({dashstyle: f.dashStyle})));
                    n.show().attr({d: b});
                    g && !f.width && n.attr({"stroke-width": this.transA});
                    this.cross.e = a
                } else this.hideCrosshair();
                d(this, "afterDrawCrosshair", {e: a, point: c})
            },
            hideCrosshair: function () {
                this.cross && this.cross.hide();
                d(this, "afterHideCrosshair")
            }
        });
        return a.Axis = H
    });
    K(G, "parts/DateTimeAxis.js", [G["parts/Globals.js"]], function (a) {
        var C = a.Axis, I = a.getMagnitude, F = a.normalizeTickInterval, k = a.timeUnits;
        C.prototype.getTimeTicks = function () {
            return this.chart.time.getTimeTicks.apply(this.chart.time,
                arguments)
        };
        C.prototype.normalizeTimeTickInterval = function (a, q) {
            var e = q || [["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]], ["second", [1, 2, 5, 10, 15, 30]], ["minute", [1, 2, 5, 10, 15, 30]], ["hour", [1, 2, 3, 4, 6, 8, 12]], ["day", [1, 2]], ["week", [1, 2]], ["month", [1, 2, 3, 4, 6]], ["year", null]];
            q = e[e.length - 1];
            var u = k[q[0]], v = q[1], p;
            for (p = 0; p < e.length && !(q = e[p], u = k[q[0]], v = q[1], e[p + 1] && a <= (u * v[v.length - 1] + k[e[p + 1][0]]) / 2); p++) ;
            u === k.year && a < 5 * u && (v = [1, 2, 5]);
            a = F(a / u, v, "year" === q[0] ? Math.max(I(a / u), 1) : 1);
            return {
                unitRange: u,
                count: a, unitName: q[0]
            }
        }
    });
    K(G, "parts/LogarithmicAxis.js", [G["parts/Globals.js"]], function (a) {
        var C = a.Axis, I = a.getMagnitude, F = a.normalizeTickInterval, k = a.pick;
        C.prototype.getLogTickPositions = function (a, q, t, u) {
            var e = this.options, p = this.len, h = [];
            u || (this._minorAutoInterval = null);
            if (.5 <= a) a = Math.round(a), h = this.getLinearTickPositions(a, q, t); else if (.08 <= a) for (var p = Math.floor(q), d, m, b, g, l, e = .3 < a ? [1, 2, 4] : .15 < a ? [1, 2, 4, 6, 8] : [1, 2, 3, 4, 5, 6, 7, 8, 9]; p < t + 1 && !l; p++) for (m = e.length, d = 0; d < m && !l; d++) b = this.log2lin(this.lin2log(p) *
                e[d]), b > q && (!u || g <= t) && void 0 !== g && h.push(g), g > t && (l = !0), g = b; else q = this.lin2log(q), t = this.lin2log(t), a = u ? this.getMinorTickInterval() : e.tickInterval, a = k("auto" === a ? null : a, this._minorAutoInterval, e.tickPixelInterval / (u ? 5 : 1) * (t - q) / ((u ? p / this.tickPositions.length : p) || 1)), a = F(a, null, I(a)), h = this.getLinearTickPositions(a, q, t).map(this.log2lin), u || (this._minorAutoInterval = a / 5);
            u || (this.tickInterval = a);
            return h
        };
        C.prototype.log2lin = function (a) {
            return Math.log(a) / Math.LN10
        };
        C.prototype.lin2log = function (a) {
            return Math.pow(10,
                a)
        }
    });
    K(G, "parts/PlotLineOrBand.js", [G["parts/Globals.js"], G["parts/Axis.js"]], function (a, C) {
        var I = a.arrayMax, F = a.arrayMin, k = a.defined, e = a.destroyObjectProperties, q = a.erase,
            t = a.merge, u = a.pick;
        a.PlotLineOrBand = function (a, e) {
            this.axis = a;
            e && (this.options = e, this.id = e.id)
        };
        a.PlotLineOrBand.prototype = {
            render: function () {
                a.fireEvent(this, "render");
                var e = this, p = e.axis, h = p.horiz, d = e.options, m = d.label, b = e.label, g = d.to,
                    l = d.from, c = d.value, w = k(l) && k(g), z = k(c), q = e.svgElem, D = !q, A = [],
                    n = d.color, x = u(d.zIndex, 0), B = d.events,
                    A = {"class": "highcharts-plot-" + (w ? "band " : "line ") + (d.className || "")}, E = {},
                    H = p.chart.renderer, f = w ? "bands" : "lines";
                p.isLog && (l = p.log2lin(l), g = p.log2lin(g), c = p.log2lin(c));
                p.chart.styledMode || (z ? (A.stroke = n, A["stroke-width"] = d.width, d.dashStyle && (A.dashstyle = d.dashStyle)) : w && (n && (A.fill = n), d.borderWidth && (A.stroke = d.borderColor, A["stroke-width"] = d.borderWidth)));
                E.zIndex = x;
                f += "-" + x;
                (n = p.plotLinesAndBandsGroups[f]) || (p.plotLinesAndBandsGroups[f] = n = H.g("plot-" + f).attr(E).add());
                D && (e.svgElem = q = H.path().attr(A).add(n));
                if (z) A = p.getPlotLinePath(c, q.strokeWidth()); else if (w) A = p.getPlotBandPath(l, g, d); else return;
                (D || !q.d) && A && A.length ? (q.attr({d: A}), B && a.objectEach(B, function (a, c) {
                    q.on(c, function (a) {
                        B[c].apply(e, [a])
                    })
                })) : q && (A ? (q.show(!0), q.animate({d: A})) : q.d && (q.hide(), b && (e.label = b = b.destroy())));
                m && k(m.text) && A && A.length && 0 < p.width && 0 < p.height && !A.isFlat ? (m = t({
                    align: h && w && "center",
                    x: h ? !w && 4 : 10,
                    verticalAlign: !h && w && "middle",
                    y: h ? w ? 16 : 10 : w ? 6 : -4,
                    rotation: h && !w && 90
                }, m), this.renderLabel(m, A, w, x)) : b && b.hide();
                return e
            },
            renderLabel: function (a, e, h, d) {
                var m = this.label, b = this.axis.chart.renderer;
                m || (m = {
                    align: a.textAlign || a.align,
                    rotation: a.rotation,
                    "class": "highcharts-plot-" + (h ? "band" : "line") + "-label " + (a.className || "")
                }, m.zIndex = d, this.label = m = b.text(a.text, 0, 0, a.useHTML).attr(m).add(), this.axis.chart.styledMode || m.css(a.style));
                d = e.xBounds || [e[1], e[4], h ? e[6] : e[1]];
                e = e.yBounds || [e[2], e[5], h ? e[7] : e[2]];
                h = F(d);
                b = F(e);
                m.align(a, !1, {x: h, y: b, width: I(d) - h, height: I(e) - b});
                m.show(!0)
            }, destroy: function () {
                q(this.axis.plotLinesAndBands,
                    this);
                delete this.axis;
                e(this)
            }
        };
        a.extend(C.prototype, {
            getPlotBandPath: function (a, e) {
                var h = this.getPlotLinePath(e, null, null, !0), d = this.getPlotLinePath(a, null, null, !0),
                    m = [], b = this.horiz, g = 1, l;
                a = a < this.min && e < this.min || a > this.max && e > this.max;
                if (d && h) for (a && (l = d.toString() === h.toString(), g = 0), a = 0; a < d.length; a += 6) b && h[a + 1] === d[a + 1] ? (h[a + 1] += g, h[a + 4] += g) : b || h[a + 2] !== d[a + 2] || (h[a + 2] += g, h[a + 5] += g), m.push("M", d[a + 1], d[a + 2], "L", d[a + 4], d[a + 5], h[a + 4], h[a + 5], h[a + 1], h[a + 2], "z"), m.isFlat = l;
                return m
            }, addPlotBand: function (a) {
                return this.addPlotBandOrLine(a,
                    "plotBands")
            }, addPlotLine: function (a) {
                return this.addPlotBandOrLine(a, "plotLines")
            }, addPlotBandOrLine: function (e, p) {
                var h = (new a.PlotLineOrBand(this, e)).render(), d = this.userOptions;
                h && (p && (d[p] = d[p] || [], d[p].push(e)), this.plotLinesAndBands.push(h));
                return h
            }, removePlotBandOrLine: function (a) {
                for (var e = this.plotLinesAndBands, h = this.options, d = this.userOptions, m = e.length; m--;) e[m].id === a && e[m].destroy();
                [h.plotLines || [], d.plotLines || [], h.plotBands || [], d.plotBands || []].forEach(function (b) {
                    for (m = b.length; m--;) b[m].id ===
                    a && q(b, b[m])
                })
            }, removePlotBand: function (a) {
                this.removePlotBandOrLine(a)
            }, removePlotLine: function (a) {
                this.removePlotBandOrLine(a)
            }
        })
    });
    K(G, "parts/Tooltip.js", [G["parts/Globals.js"]], function (a) {
        var C = a.doc, I = a.extend, F = a.format, k = a.isNumber, e = a.merge, q = a.pick, t = a.splat,
            u = a.syncTimeout, v = a.timeUnits;
        a.Tooltip = function () {
            this.init.apply(this, arguments)
        };
        a.Tooltip.prototype = {
            init: function (a, e) {
                this.chart = a;
                this.options = e;
                this.crosshairs = [];
                this.now = {x: 0, y: 0};
                this.isHidden = !0;
                this.split = e.split && !a.inverted;
                this.shared = e.shared || this.split;
                this.outside = e.outside && !this.split
            }, cleanSplit: function (a) {
                this.chart.series.forEach(function (e) {
                    var d = e && e.tt;
                    d && (!d.isActive || a ? e.tt = d.destroy() : d.isActive = !1)
                })
            }, applyFilter: function () {
                var a = this.chart;
                a.renderer.definition({
                    tagName: "filter",
                    id: "drop-shadow-" + a.index,
                    opacity: .5,
                    children: [{
                        tagName: "feGaussianBlur",
                        "in": "SourceAlpha",
                        stdDeviation: 1
                    }, {tagName: "feOffset", dx: 1, dy: 1}, {
                        tagName: "feComponentTransfer",
                        children: [{tagName: "feFuncA", type: "linear", slope: .3}]
                    },
                        {
                            tagName: "feMerge",
                            children: [{tagName: "feMergeNode"}, {
                                tagName: "feMergeNode",
                                "in": "SourceGraphic"
                            }]
                        }]
                });
                a.renderer.definition({
                    tagName: "style",
                    textContent: ".highcharts-tooltip-" + a.index + "{filter:url(#drop-shadow-" + a.index + ")}"
                })
            }, getLabel: function () {
                var e = this, h = this.chart.renderer, d = this.chart.styledMode, m = this.options, b, g;
                this.label || (this.outside && (this.container = b = a.doc.createElement("div"), b.className = "highcharts-tooltip-container", a.css(b, {
                    position: "absolute", top: "1px", pointerEvents: m.style &&
                        m.style.pointerEvents
                }), a.doc.body.appendChild(b), this.renderer = h = new a.Renderer(b, 0, 0)), this.split ? this.label = h.g("tooltip") : (this.label = h.label("", 0, 0, m.shape || "callout", null, null, m.useHTML, null, "tooltip").attr({
                    padding: m.padding,
                    r: m.borderRadius
                }), d || this.label.attr({
                    fill: m.backgroundColor,
                    "stroke-width": m.borderWidth
                }).css(m.style).shadow(m.shadow)), d && (this.applyFilter(), this.label.addClass("highcharts-tooltip-" + this.chart.index)), this.outside && (g = {
                    x: this.label.xSetter,
                    y: this.label.ySetter
                },
                    this.label.xSetter = function (a, c) {
                        g[c].call(this.label, e.distance);
                        b.style.left = a + "px"
                    }, this.label.ySetter = function (a, c) {
                    g[c].call(this.label, e.distance);
                    b.style.top = a + "px"
                }), this.label.attr({zIndex: 8}).add());
                return this.label
            }, update: function (a) {
                this.destroy();
                e(!0, this.chart.options.tooltip.userOptions, a);
                this.init(this.chart, e(!0, this.options, a))
            }, destroy: function () {
                this.label && (this.label = this.label.destroy());
                this.split && this.tt && (this.cleanSplit(this.chart, !0), this.tt = this.tt.destroy());
                this.renderer &&
                (this.renderer = this.renderer.destroy(), a.discardElement(this.container));
                a.clearTimeout(this.hideTimer);
                a.clearTimeout(this.tooltipTimeout)
            }, move: function (e, h, d, m) {
                var b = this, g = b.now,
                    l = !1 !== b.options.animation && !b.isHidden && (1 < Math.abs(e - g.x) || 1 < Math.abs(h - g.y)),
                    c = b.followPointer || 1 < b.len;
                I(g, {
                    x: l ? (2 * g.x + e) / 3 : e,
                    y: l ? (g.y + h) / 2 : h,
                    anchorX: c ? void 0 : l ? (2 * g.anchorX + d) / 3 : d,
                    anchorY: c ? void 0 : l ? (g.anchorY + m) / 2 : m
                });
                b.getLabel().attr(g);
                l && (a.clearTimeout(this.tooltipTimeout), this.tooltipTimeout = setTimeout(function () {
                    b &&
                    b.move(e, h, d, m)
                }, 32))
            }, hide: function (e) {
                var h = this;
                a.clearTimeout(this.hideTimer);
                e = q(e, this.options.hideDelay, 500);
                this.isHidden || (this.hideTimer = u(function () {
                    h.getLabel()[e ? "fadeOut" : "hide"]();
                    h.isHidden = !0
                }, e))
            }, getAnchor: function (a, e) {
                var d = this.chart, h = d.pointer, b = d.inverted, g = d.plotTop, l = d.plotLeft, c = 0, w = 0,
                    z, k;
                a = t(a);
                this.followPointer && e ? (void 0 === e.chartX && (e = h.normalize(e)), a = [e.chartX - d.plotLeft, e.chartY - g]) : a[0].tooltipPos ? a = a[0].tooltipPos : (a.forEach(function (a) {
                    z = a.series.yAxis;
                    k = a.series.xAxis;
                    c += a.plotX + (!b && k ? k.left - l : 0);
                    w += (a.plotLow ? (a.plotLow + a.plotHigh) / 2 : a.plotY) + (!b && z ? z.top - g : 0)
                }), c /= a.length, w /= a.length, a = [b ? d.plotWidth - w : c, this.shared && !b && 1 < a.length && e ? e.chartY - g : b ? d.plotHeight - c : w]);
                return a.map(Math.round)
            }, getPosition: function (a, e, d) {
                var h = this.chart, b = this.distance, g = {}, l = h.inverted && d.h || 0, c, w = this.outside,
                    z = w ? C.documentElement.clientWidth - 2 * b : h.chartWidth,
                    k = w ? Math.max(C.body.scrollHeight, C.documentElement.scrollHeight, C.body.offsetHeight, C.documentElement.offsetHeight,
                        C.documentElement.clientHeight) : h.chartHeight, p = h.pointer.chartPosition,
                    A = ["y", k, e, (w ? p.top - b : 0) + d.plotY + h.plotTop, w ? 0 : h.plotTop, w ? k : h.plotTop + h.plotHeight],
                    n = ["x", z, a, (w ? p.left - b : 0) + d.plotX + h.plotLeft, w ? 0 : h.plotLeft, w ? z : h.plotLeft + h.plotWidth],
                    x = !this.followPointer && q(d.ttBelow, !h.inverted === !!d.negative),
                    B = function (a, c, f, d, n, e) {
                        var h = f < d - b, m = d + b + f < c, B = d - b - f;
                        d += b;
                        if (x && m) g[a] = d; else if (!x && h) g[a] = B; else if (h) g[a] = Math.min(e - f, 0 > B - l ? B : B - l); else if (m) g[a] = Math.max(n, d + l + f > c ? d : d + l); else return !1
                    }, E =
                        function (a, c, f, d) {
                            var l;
                            d < b || d > c - b ? l = !1 : g[a] = d < f / 2 ? 1 : d > c - f / 2 ? c - f - 2 : d - f / 2;
                            return l
                        }, H = function (a) {
                        var b = A;
                        A = n;
                        n = b;
                        c = a
                    }, f = function () {
                        !1 !== B.apply(0, A) ? !1 !== E.apply(0, n) || c || (H(!0), f()) : c ? g.x = g.y = 0 : (H(!0), f())
                    };
                (h.inverted || 1 < this.len) && H();
                f();
                return g
            }, defaultFormatter: function (a) {
                var e = this.points || t(this), d;
                d = [a.tooltipFooterHeaderFormatter(e[0])];
                d = d.concat(a.bodyFormatter(e));
                d.push(a.tooltipFooterHeaderFormatter(e[0], !0));
                return d
            }, refresh: function (e, h) {
                var d = this.chart, m = this.options, b, g = e, l,
                    c = {}, w, z = [];
                w = m.formatter || this.defaultFormatter;
                var c = this.shared, k = d.styledMode, p = [];
                m.enabled && (a.clearTimeout(this.hideTimer), this.followPointer = t(g)[0].series.tooltipOptions.followPointer, l = this.getAnchor(g, h), h = l[0], b = l[1], !c || g.series && g.series.noSharedTooltip ? c = g.getLabelConfig() : (p = d.pointer.getActiveSeries(g), d.series.forEach(function (a) {
                    (a.options.inactiveOtherPoints || -1 === p.indexOf(a)) && a.setState("inactive", !0)
                }), g.forEach(function (a) {
                    a.setState("hover");
                    z.push(a.getLabelConfig())
                }),
                    c = {
                        x: g[0].category,
                        y: g[0].y
                    }, c.points = z, g = g[0]), this.len = z.length, w = w.call(c, this), c = g.series, this.distance = q(c.tooltipOptions.distance, 16), !1 === w ? this.hide() : (d = this.getLabel(), this.isHidden && d.attr({opacity: 1}).show(), this.split ? this.renderSplit(w, t(e)) : (m.style.width && !k || d.css({width: this.chart.spacingBox.width}), d.attr({text: w && w.join ? w.join("") : w}), d.removeClass(/highcharts-color-[\d]+/g).addClass("highcharts-color-" + q(g.colorIndex, c.colorIndex)), k || d.attr({
                    stroke: m.borderColor || g.color || c.color ||
                        "#666666"
                }), this.updatePosition({
                    plotX: h,
                    plotY: b,
                    negative: g.negative,
                    ttBelow: g.ttBelow,
                    h: l[2] || 0
                })), this.isHidden = !1), a.fireEvent(this, "refresh"))
            }, renderSplit: function (e, h) {
                var d = this, m = [], b = this.chart, g = b.renderer, l = !0, c = this.options, w = 0, z,
                    k = this.getLabel(), p = b.plotTop;
                a.isString(e) && (e = [!1, e]);
                e.slice(0, h.length + 1).forEach(function (a, n) {
                    if (!1 !== a && "" !== a) {
                        n = h[n - 1] || {isHeader: !0, plotX: h[0].plotX, plotY: b.plotHeight};
                        var e = n.series || d, B = e.tt, A = n.series || {},
                            H = "highcharts-color-" + q(n.colorIndex, A.colorIndex,
                                "none");
                        B || (B = {
                            padding: c.padding,
                            r: c.borderRadius
                        }, b.styledMode || (B.fill = c.backgroundColor, B.stroke = c.borderColor || n.color || A.color || "#333333", B["stroke-width"] = c.borderWidth), e.tt = B = g.label(null, null, null, (n.isHeader ? c.headerShape : c.shape) || "callout", null, null, c.useHTML).addClass("highcharts-tooltip-box " + H).attr(B).add(k));
                        B.isActive = !0;
                        B.attr({text: a});
                        b.styledMode || B.css(c.style).shadow(c.shadow);
                        a = B.getBBox();
                        A = a.width + B.strokeWidth();
                        n.isHeader ? (w = a.height, b.xAxis[0].opposite && (z = !0, p -= w), A =
                            Math.max(0, Math.min(n.plotX + b.plotLeft - A / 2, b.chartWidth + (b.scrollablePixels ? b.scrollablePixels - b.marginRight : 0) - A))) : A = n.plotX + b.plotLeft - q(c.distance, 16) - A;
                        0 > A && (l = !1);
                        a = (n.series && n.series.yAxis && n.series.yAxis.pos) + (n.plotY || 0);
                        a -= p;
                        n.isHeader && (a = z ? -w : b.plotHeight + w);
                        m.push({
                            target: a,
                            rank: n.isHeader ? 1 : 0,
                            size: e.tt.getBBox().height + 1,
                            point: n,
                            x: A,
                            tt: B
                        })
                    }
                });
                this.cleanSplit();
                c.positioner && m.forEach(function (a) {
                    var b = c.positioner.call(d, a.tt.getBBox().width, a.size, a.point);
                    a.x = b.x;
                    a.align = 0;
                    a.target =
                        b.y;
                    a.rank = q(b.rank, a.rank)
                });
                a.distribute(m, b.plotHeight + w);
                m.forEach(function (a) {
                    var g = a.point, e = g.series;
                    a.tt.attr({
                        visibility: void 0 === a.pos ? "hidden" : "inherit",
                        x: l || g.isHeader || c.positioner ? a.x : g.plotX + b.plotLeft + d.distance,
                        y: a.pos + p,
                        anchorX: g.isHeader ? g.plotX + b.plotLeft : g.plotX + e.xAxis.pos,
                        anchorY: g.isHeader ? b.plotTop + b.plotHeight / 2 : g.plotY + e.yAxis.pos
                    })
                })
            }, updatePosition: function (a) {
                var e = this.chart, d = this.getLabel(),
                    m = (this.options.positioner || this.getPosition).call(this, d.width, d.height, a),
                    b = a.plotX + e.plotLeft;
                a = a.plotY + e.plotTop;
                var g;
                this.outside && (g = (this.options.borderWidth || 0) + 2 * this.distance, this.renderer.setSize(d.width + g, d.height + g, !1), b += e.pointer.chartPosition.left - m.x, a += e.pointer.chartPosition.top - m.y);
                this.move(Math.round(m.x), Math.round(m.y || 0), b, a)
            }, getDateFormat: function (a, e, d, m) {
                var b = this.chart.time, g = b.dateFormat("%m-%d %H:%M:%S.%L", e), l, c,
                    h = {millisecond: 15, second: 12, minute: 9, hour: 6, day: 3}, z = "millisecond";
                for (c in v) {
                    if (a === v.week && +b.dateFormat("%w", e) === d && "00:00:00.000" ===
                        g.substr(6)) {
                        c = "week";
                        break
                    }
                    if (v[c] > a) {
                        c = z;
                        break
                    }
                    if (h[c] && g.substr(h[c]) !== "01-01 00:00:00.000".substr(h[c])) break;
                    "week" !== c && (z = c)
                }
                c && (l = b.resolveDTLFormat(m[c]).main);
                return l
            }, getXDateFormat: function (a, e, d) {
                e = e.dateTimeLabelFormats;
                var h = d && d.closestPointRange;
                return (h ? this.getDateFormat(h, a.x, d.options.startOfWeek, e) : e.day) || e.year
            }, tooltipFooterHeaderFormatter: function (e, h) {
                var d = h ? "footer" : "header", m = e.series, b = m.tooltipOptions, g = b.xDateFormat,
                    l = m.xAxis, c = l && "datetime" === l.options.type && k(e.key),
                    w = b[d + "Format"];
                h = {isFooter: h, labelConfig: e};
                a.fireEvent(this, "headerFormatter", h, function (a) {
                    c && !g && (g = this.getXDateFormat(e, b, l));
                    c && g && (e.point && e.point.tooltipDateKeys || ["key"]).forEach(function (a) {
                        w = w.replace("{point." + a + "}", "{point." + a + ":" + g + "}")
                    });
                    m.chart.styledMode && (w = this.styledModeFormat(w));
                    a.text = F(w, {point: e, series: m}, this.chart.time)
                });
                return h.text
            }, bodyFormatter: function (a) {
                return a.map(function (a) {
                    var d = a.series.tooltipOptions;
                    return (d[(a.point.formatPrefix || "point") + "Formatter"] ||
                        a.point.tooltipFormatter).call(a.point, d[(a.point.formatPrefix || "point") + "Format"] || "")
                })
            }, styledModeFormat: function (a) {
                return a.replace('style\x3d"font-size: 10px"', 'class\x3d"highcharts-header"').replace(/style="color:{(point|series)\.color}"/g, 'class\x3d"highcharts-color-{$1.colorIndex}"')
            }
        }
    });
    K(G, "parts/Pointer.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.attr, F = a.charts, k = a.color, e = a.css, q = a.defined, t = a.extend,
            u = a.find, v = a.fireEvent, p = a.isNumber, h = a.isObject, d = a.offset, m = a.pick,
            b = a.splat, g = a.Tooltip;
        a.Pointer = function (a, c) {
            this.init(a, c)
        };
        a.Pointer.prototype = {
            init: function (a, c) {
                this.options = c;
                this.chart = a;
                this.runChartClick = c.chart.events && !!c.chart.events.click;
                this.pinchDown = [];
                this.lastValidTouch = {};
                g && (a.tooltip = new g(a, c.tooltip), this.followTouchMove = m(c.tooltip.followTouchMove, !0));
                this.setDOMEvents()
            }, zoomOption: function (a) {
                var c = this.chart, b = c.options.chart, d = b.zoomType || "", c = c.inverted;
                /touch/.test(a.type) && (d = m(b.pinchType, d));
                this.zoomX = a = /x/.test(d);
                this.zoomY =
                    d = /y/.test(d);
                this.zoomHor = a && !c || d && c;
                this.zoomVert = d && !c || a && c;
                this.hasZoom = a || d
            }, normalize: function (a, c) {
                var b;
                b = a.touches ? a.touches.length ? a.touches.item(0) : a.changedTouches[0] : a;
                c || (this.chartPosition = c = d(this.chart.container));
                return t(a, {chartX: Math.round(b.pageX - c.left), chartY: Math.round(b.pageY - c.top)})
            }, getCoordinates: function (a) {
                var c = {xAxis: [], yAxis: []};
                this.chart.axes.forEach(function (b) {
                    c[b.isXAxis ? "xAxis" : "yAxis"].push({
                        axis: b,
                        value: b.toValue(a[b.horiz ? "chartX" : "chartY"])
                    })
                });
                return c
            },
            findNearestKDPoint: function (a, c, b) {
                var d;
                a.forEach(function (a) {
                    var g = !(a.noSharedTooltip && c) && 0 > a.options.findNearestPointBy.indexOf("y");
                    a = a.searchPoint(b, g);
                    if ((g = h(a, !0)) && !(g = !h(d, !0))) var g = d.distX - a.distX, l = d.dist - a.dist,
                        e = (a.series.group && a.series.group.zIndex) - (d.series.group && d.series.group.zIndex),
                        g = 0 < (0 !== g && c ? g : 0 !== l ? l : 0 !== e ? e : d.series.index > a.series.index ? -1 : 1);
                    g && (d = a)
                });
                return d
            }, getPointFromEvent: function (a) {
                a = a.target;
                for (var c; a && !c;) c = a.point, a = a.parentNode;
                return c
            }, getChartCoordinatesFromPoint: function (a,
                                                       c) {
                var b = a.series, d = b.xAxis, b = b.yAxis, g = m(a.clientX, a.plotX), e = a.shapeArgs;
                if (d && b) return c ? {
                    chartX: d.len + d.pos - g,
                    chartY: b.len + b.pos - a.plotY
                } : {chartX: g + d.pos, chartY: a.plotY + b.pos};
                if (e && e.x && e.y) return {chartX: e.x, chartY: e.y}
            }, getHoverData: function (a, c, b, d, g, e) {
                var l, n = [];
                d = !(!d || !a);
                var x = c && !c.stickyTracking ? [c] : b.filter(function (a) {
                    return a.visible && !(!g && a.directTouch) && m(a.options.enableMouseTracking, !0) && a.stickyTracking
                });
                c = (l = d ? a : this.findNearestKDPoint(x, g, e)) && l.series;
                l && (g && !c.noSharedTooltip ?
                    (x = b.filter(function (a) {
                        return a.visible && !(!g && a.directTouch) && m(a.options.enableMouseTracking, !0) && !a.noSharedTooltip
                    }), x.forEach(function (a) {
                        var c = u(a.points, function (a) {
                            return a.x === l.x && !a.isNull
                        });
                        h(c) && (a.chart.isBoosting && (c = a.getPoint(c)), n.push(c))
                    })) : n.push(l));
                return {hoverPoint: l, hoverSeries: c, hoverPoints: n}
            }, runPointActions: function (b, c) {
                var d = this.chart, g = d.tooltip && d.tooltip.options.enabled ? d.tooltip : void 0,
                    e = g ? g.shared : !1, l = c || d.hoverPoint, h = l && l.series || d.hoverSeries,
                    h = this.getHoverData(l,
                        h, d.series, "touchmove" !== b.type && (!!c || h && h.directTouch && this.isDirectTouch), e, b),
                    n = [], x, l = h.hoverPoint;
                x = h.hoverPoints;
                c = (h = h.hoverSeries) && h.tooltipOptions.followPointer;
                e = e && h && !h.noSharedTooltip;
                if (l && (l !== d.hoverPoint || g && g.isHidden)) {
                    (d.hoverPoints || []).forEach(function (a) {
                        -1 === x.indexOf(a) && a.setState()
                    });
                    if (d.hoverSeries !== h) h.onMouseOver();
                    n = this.getActiveSeries(x);
                    d.series.forEach(function (a) {
                        (a.options.inactiveOtherPoints || -1 === n.indexOf(a)) && a.setState("inactive", !0)
                    });
                    (x || []).forEach(function (a) {
                        a.setState("hover")
                    });
                    d.hoverPoint && d.hoverPoint.firePointEvent("mouseOut");
                    if (!l.series) return;
                    l.firePointEvent("mouseOver");
                    d.hoverPoints = x;
                    d.hoverPoint = l;
                    g && g.refresh(e ? x : l, b)
                } else c && g && !g.isHidden && (l = g.getAnchor([{}], b), g.updatePosition({
                    plotX: l[0],
                    plotY: l[1]
                }));
                this.unDocMouseMove || (this.unDocMouseMove = C(d.container.ownerDocument, "mousemove", function (c) {
                    var b = F[a.hoverChartIndex];
                    if (b) b.pointer.onDocumentMouseMove(c)
                }));
                d.axes.forEach(function (c) {
                    var d = m(c.crosshair.snap, !0), g = d ? a.find(x, function (a) {
                        return a.series[c.coll] ===
                            c
                    }) : void 0;
                    g || !d ? c.drawCrosshair(b, g) : c.hideCrosshair()
                })
            }, getActiveSeries: function (a) {
                var c = [], b;
                (a || []).forEach(function (a) {
                    b = a.series;
                    c.push(b);
                    b.linkedParent && c.push(b.linkedParent);
                    b.linkedSeries && (c = c.concat(b.linkedSeries));
                    b.navigatorSeries && c.push(b.navigatorSeries)
                });
                return c
            }, reset: function (a, c) {
                var d = this.chart, g = d.hoverSeries, e = d.hoverPoint, l = d.hoverPoints, h = d.tooltip,
                    n = h && h.shared ? l : e;
                a && n && b(n).forEach(function (c) {
                    c.series.isCartesian && void 0 === c.plotX && (a = !1)
                });
                if (a) h && n && b(n).length &&
                (h.refresh(n), h.shared && l ? l.forEach(function (a) {
                    a.setState(a.state, !0);
                    a.series.isCartesian && (a.series.xAxis.crosshair && a.series.xAxis.drawCrosshair(null, a), a.series.yAxis.crosshair && a.series.yAxis.drawCrosshair(null, a))
                }) : e && (e.setState(e.state, !0), d.axes.forEach(function (a) {
                    a.crosshair && a.drawCrosshair(null, e)
                }))); else {
                    if (e) e.onMouseOut();
                    l && l.forEach(function (a) {
                        a.setState()
                    });
                    if (g) g.onMouseOut();
                    h && h.hide(c);
                    this.unDocMouseMove && (this.unDocMouseMove = this.unDocMouseMove());
                    d.axes.forEach(function (a) {
                        a.hideCrosshair()
                    });
                    this.hoverX = d.hoverPoints = d.hoverPoint = null
                }
            }, scaleGroups: function (a, c) {
                var b = this.chart, d;
                b.series.forEach(function (g) {
                    d = a || g.getPlotBox();
                    g.xAxis && g.xAxis.zoomEnabled && g.group && (g.group.attr(d), g.markerGroup && (g.markerGroup.attr(d), g.markerGroup.clip(c ? b.clipRect : null)), g.dataLabelsGroup && g.dataLabelsGroup.attr(d))
                });
                b.clipRect.attr(c || b.clipBox)
            }, dragStart: function (a) {
                var c = this.chart;
                c.mouseIsDown = a.type;
                c.cancelClick = !1;
                c.mouseDownX = this.mouseDownX = a.chartX;
                c.mouseDownY = this.mouseDownY = a.chartY
            },
            drag: function (a) {
                var c = this.chart, b = c.options.chart, d = a.chartX, g = a.chartY, e = this.zoomHor,
                    l = this.zoomVert, n = c.plotLeft, h = c.plotTop, m = c.plotWidth, E = c.plotHeight, p,
                    f = this.selectionMarker, r = this.mouseDownX, q = this.mouseDownY,
                    t = b.panKey && a[b.panKey + "Key"];
                f && f.touch || (d < n ? d = n : d > n + m && (d = n + m), g < h ? g = h : g > h + E && (g = h + E), this.hasDragged = Math.sqrt(Math.pow(r - d, 2) + Math.pow(q - g, 2)), 10 < this.hasDragged && (p = c.isInsidePlot(r - n, q - h), c.hasCartesianSeries && (this.zoomX || this.zoomY) && p && !t && !f && (this.selectionMarker = f = c.renderer.rect(n,
                    h, e ? 1 : m, l ? 1 : E, 0).attr({
                    "class": "highcharts-selection-marker",
                    zIndex: 7
                }).add(), c.styledMode || f.attr({fill: b.selectionMarkerFill || k("#335cad").setOpacity(.25).get()})), f && e && (d -= r, f.attr({
                    width: Math.abs(d),
                    x: (0 < d ? 0 : d) + r
                })), f && l && (d = g - q, f.attr({
                    height: Math.abs(d),
                    y: (0 < d ? 0 : d) + q
                })), p && !f && b.panning && c.pan(a, b.panning)))
            }, drop: function (a) {
                var c = this, b = this.chart, d = this.hasPinched;
                if (this.selectionMarker) {
                    var g = {originalEvent: a, xAxis: [], yAxis: []}, l = this.selectionMarker,
                        h = l.attr ? l.attr("x") : l.x, n = l.attr ?
                            l.attr("y") : l.y, m = l.attr ? l.attr("width") : l.width,
                        B = l.attr ? l.attr("height") : l.height, k;
                    if (this.hasDragged || d) b.axes.forEach(function (b) {
                        if (b.zoomEnabled && q(b.min) && (d || c[{xAxis: "zoomX", yAxis: "zoomY"}[b.coll]])) {
                            var f = b.horiz, e = "touchend" === a.type ? b.minPixelPadding : 0,
                                l = b.toValue((f ? h : n) + e), f = b.toValue((f ? h + m : n + B) - e);
                            g[b.coll].push({axis: b, min: Math.min(l, f), max: Math.max(l, f)});
                            k = !0
                        }
                    }), k && v(b, "selection", g, function (a) {
                        b.zoom(t(a, d ? {animation: !1} : null))
                    });
                    p(b.index) && (this.selectionMarker = this.selectionMarker.destroy());
                    d && this.scaleGroups()
                }
                b && p(b.index) && (e(b.container, {cursor: b._cursor}), b.cancelClick = 10 < this.hasDragged, b.mouseIsDown = this.hasDragged = this.hasPinched = !1, this.pinchDown = [])
            }, onContainerMouseDown: function (a) {
                a = this.normalize(a);
                2 !== a.button && (this.zoomOption(a), a.preventDefault && a.preventDefault(), this.dragStart(a))
            }, onDocumentMouseUp: function (b) {
                F[a.hoverChartIndex] && F[a.hoverChartIndex].pointer.drop(b)
            }, onDocumentMouseMove: function (a) {
                var c = this.chart, b = this.chartPosition;
                a = this.normalize(a, b);
                !b ||
                this.inClass(a.target, "highcharts-tracker") || c.isInsidePlot(a.chartX - c.plotLeft, a.chartY - c.plotTop) || this.reset()
            }, onContainerMouseLeave: function (b) {
                var c = F[a.hoverChartIndex];
                c && (b.relatedTarget || b.toElement) && (c.pointer.reset(), c.pointer.chartPosition = null)
            }, onContainerMouseMove: function (b) {
                var c = this.chart;
                q(a.hoverChartIndex) && F[a.hoverChartIndex] && F[a.hoverChartIndex].mouseIsDown || (a.hoverChartIndex = c.index);
                b = this.normalize(b);
                b.preventDefault || (b.returnValue = !1);
                "mousedown" === c.mouseIsDown &&
                this.drag(b);
                !this.inClass(b.target, "highcharts-tracker") && !c.isInsidePlot(b.chartX - c.plotLeft, b.chartY - c.plotTop) || c.openMenu || this.runPointActions(b)
            }, inClass: function (a, c) {
                for (var b; a;) {
                    if (b = I(a, "class")) {
                        if (-1 !== b.indexOf(c)) return !0;
                        if (-1 !== b.indexOf("highcharts-container")) return !1
                    }
                    a = a.parentNode
                }
            }, onTrackerMouseOut: function (a) {
                var c = this.chart.hoverSeries;
                a = a.relatedTarget || a.toElement;
                this.isDirectTouch = !1;
                if (!(!c || !a || c.stickyTracking || this.inClass(a, "highcharts-tooltip") || this.inClass(a,
                    "highcharts-series-" + c.index) && this.inClass(a, "highcharts-tracker"))) c.onMouseOut()
            }, onContainerClick: function (a) {
                var c = this.chart, b = c.hoverPoint, d = c.plotLeft, g = c.plotTop;
                a = this.normalize(a);
                c.cancelClick || (b && this.inClass(a.target, "highcharts-tracker") ? (v(b.series, "click", t(a, {point: b})), c.hoverPoint && b.firePointEvent("click", a)) : (t(a, this.getCoordinates(a)), c.isInsidePlot(a.chartX - d, a.chartY - g) && v(c, "click", a)))
            }, setDOMEvents: function () {
                var b = this, c = b.chart.container, d = c.ownerDocument;
                c.onmousedown =
                    function (a) {
                        b.onContainerMouseDown(a)
                    };
                c.onmousemove = function (a) {
                    b.onContainerMouseMove(a)
                };
                c.onclick = function (a) {
                    b.onContainerClick(a)
                };
                this.unbindContainerMouseLeave = C(c, "mouseleave", b.onContainerMouseLeave);
                a.unbindDocumentMouseUp || (a.unbindDocumentMouseUp = C(d, "mouseup", b.onDocumentMouseUp));
                a.hasTouch && (c.ontouchstart = function (a) {
                    b.onContainerTouchStart(a)
                }, c.ontouchmove = function (a) {
                    b.onContainerTouchMove(a)
                }, a.unbindDocumentTouchEnd || (a.unbindDocumentTouchEnd = C(d, "touchend", b.onDocumentTouchEnd)))
            },
            destroy: function () {
                var b = this;
                b.unDocMouseMove && b.unDocMouseMove();
                this.unbindContainerMouseLeave();
                a.chartCount || (a.unbindDocumentMouseUp && (a.unbindDocumentMouseUp = a.unbindDocumentMouseUp()), a.unbindDocumentTouchEnd && (a.unbindDocumentTouchEnd = a.unbindDocumentTouchEnd()));
                clearInterval(b.tooltipTimeout);
                a.objectEach(b, function (a, d) {
                    b[d] = null
                })
            }
        }
    });
    K(G, "parts/TouchPointer.js", [G["parts/Globals.js"]], function (a) {
        var C = a.charts, I = a.extend, F = a.noop, k = a.pick;
        I(a.Pointer.prototype, {
            pinchTranslate: function (a,
                                      k, t, u, v, p) {
                this.zoomHor && this.pinchTranslateDirection(!0, a, k, t, u, v, p);
                this.zoomVert && this.pinchTranslateDirection(!1, a, k, t, u, v, p)
            }, pinchTranslateDirection: function (a, k, t, u, v, p, h, d) {
                var e = this.chart, b = a ? "x" : "y", g = a ? "X" : "Y", l = "chart" + g,
                    c = a ? "width" : "height", w = e["plot" + (a ? "Left" : "Top")], z, q, D = d || 1,
                    A = e.inverted, n = e.bounds[a ? "h" : "v"], x = 1 === k.length, B = k[0][l], E = t[0][l],
                    H = !x && k[1][l], f = !x && t[1][l], r;
                t = function () {
                    !x && 20 < Math.abs(B - H) && (D = d || Math.abs(E - f) / Math.abs(B - H));
                    q = (w - E) / D + B;
                    z = e["plot" + (a ? "Width" : "Height")] /
                        D
                };
                t();
                k = q;
                k < n.min ? (k = n.min, r = !0) : k + z > n.max && (k = n.max - z, r = !0);
                r ? (E -= .8 * (E - h[b][0]), x || (f -= .8 * (f - h[b][1])), t()) : h[b] = [E, f];
                A || (p[b] = q - w, p[c] = z);
                p = A ? 1 / D : D;
                v[c] = z;
                v[b] = k;
                u[A ? a ? "scaleY" : "scaleX" : "scale" + g] = D;
                u["translate" + g] = p * w + (E - p * B)
            }, pinch: function (a) {
                var e = this, t = e.chart, u = e.pinchDown, v = a.touches, p = v.length, h = e.lastValidTouch,
                    d = e.hasZoom, m = e.selectionMarker, b = {},
                    g = 1 === p && (e.inClass(a.target, "highcharts-tracker") && t.runTrackerClick || e.runChartClick),
                    l = {};
                1 < p && (e.initiated = !0);
                d && e.initiated && !g &&
                a.preventDefault();
                [].map.call(v, function (a) {
                    return e.normalize(a)
                });
                "touchstart" === a.type ? ([].forEach.call(v, function (a, b) {
                    u[b] = {chartX: a.chartX, chartY: a.chartY}
                }), h.x = [u[0].chartX, u[1] && u[1].chartX], h.y = [u[0].chartY, u[1] && u[1].chartY], t.axes.forEach(function (a) {
                    if (a.zoomEnabled) {
                        var b = t.bounds[a.horiz ? "h" : "v"], c = a.minPixelPadding,
                            d = a.toPixels(k(a.options.min, a.dataMin)),
                            g = a.toPixels(k(a.options.max, a.dataMax)), e = Math.max(d, g);
                        b.min = Math.min(a.pos, Math.min(d, g) - c);
                        b.max = Math.max(a.pos + a.len, e + c)
                    }
                }),
                    e.res = !0) : e.followTouchMove && 1 === p ? this.runPointActions(e.normalize(a)) : u.length && (m || (e.selectionMarker = m = I({
                    destroy: F,
                    touch: !0
                }, t.plotBox)), e.pinchTranslate(u, v, b, m, l, h), e.hasPinched = d, e.scaleGroups(b, l), e.res && (e.res = !1, this.reset(!1, 0)))
            }, touch: function (e, q) {
                var t = this.chart, u, v;
                if (t.index !== a.hoverChartIndex) this.onContainerMouseLeave({relatedTarget: !0});
                a.hoverChartIndex = t.index;
                1 === e.touches.length ? (e = this.normalize(e), (v = t.isInsidePlot(e.chartX - t.plotLeft, e.chartY - t.plotTop)) && !t.openMenu ?
                    (q && this.runPointActions(e), "touchmove" === e.type && (q = this.pinchDown, u = q[0] ? 4 <= Math.sqrt(Math.pow(q[0].chartX - e.chartX, 2) + Math.pow(q[0].chartY - e.chartY, 2)) : !1), k(u, !0) && this.pinch(e)) : q && this.reset()) : 2 === e.touches.length && this.pinch(e)
            }, onContainerTouchStart: function (a) {
                this.zoomOption(a);
                this.touch(a, !0)
            }, onContainerTouchMove: function (a) {
                this.touch(a)
            }, onDocumentTouchEnd: function (e) {
                C[a.hoverChartIndex] && C[a.hoverChartIndex].pointer.drop(e)
            }
        })
    });
    K(G, "parts/MSPointer.js", [G["parts/Globals.js"]], function (a) {
        var C =
                a.addEvent, I = a.charts, F = a.css, k = a.doc, e = a.extend, q = a.noop, t = a.Pointer,
            u = a.removeEvent, v = a.win, p = a.wrap;
        if (!a.hasTouch && (v.PointerEvent || v.MSPointerEvent)) {
            var h = {}, d = !!v.PointerEvent, m = function () {
                var b = [];
                b.item = function (a) {
                    return this[a]
                };
                a.objectEach(h, function (a) {
                    b.push({pageX: a.pageX, pageY: a.pageY, target: a.target})
                });
                return b
            }, b = function (b, d, c, e) {
                "touch" !== b.pointerType && b.pointerType !== b.MSPOINTER_TYPE_TOUCH || !I[a.hoverChartIndex] || (e(b), e = I[a.hoverChartIndex].pointer, e[d]({
                    type: c, target: b.currentTarget,
                    preventDefault: q, touches: m()
                }))
            };
            e(t.prototype, {
                onContainerPointerDown: function (a) {
                    b(a, "onContainerTouchStart", "touchstart", function (a) {
                        h[a.pointerId] = {pageX: a.pageX, pageY: a.pageY, target: a.currentTarget}
                    })
                }, onContainerPointerMove: function (a) {
                    b(a, "onContainerTouchMove", "touchmove", function (a) {
                        h[a.pointerId] = {pageX: a.pageX, pageY: a.pageY};
                        h[a.pointerId].target || (h[a.pointerId].target = a.currentTarget)
                    })
                }, onDocumentPointerUp: function (a) {
                    b(a, "onDocumentTouchEnd", "touchend", function (a) {
                        delete h[a.pointerId]
                    })
                },
                batchMSEvents: function (a) {
                    a(this.chart.container, d ? "pointerdown" : "MSPointerDown", this.onContainerPointerDown);
                    a(this.chart.container, d ? "pointermove" : "MSPointerMove", this.onContainerPointerMove);
                    a(k, d ? "pointerup" : "MSPointerUp", this.onDocumentPointerUp)
                }
            });
            p(t.prototype, "init", function (a, b, c) {
                a.call(this, b, c);
                this.hasZoom && F(b.container, {"-ms-touch-action": "none", "touch-action": "none"})
            });
            p(t.prototype, "setDOMEvents", function (a) {
                a.apply(this);
                (this.hasZoom || this.followTouchMove) && this.batchMSEvents(C)
            });
            p(t.prototype, "destroy", function (a) {
                this.batchMSEvents(u);
                a.call(this)
            })
        }
    });
    K(G, "parts/Legend.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.css, F = a.discardElement, k = a.defined, e = a.fireEvent, q = a.isFirefox,
            t = a.marginNames, u = a.merge, v = a.pick, p = a.setAnimation, h = a.stableSort, d = a.win,
            m = a.wrap;
        a.Legend = function (a, d) {
            this.init(a, d)
        };
        a.Legend.prototype = {
            init: function (a, d) {
                this.chart = a;
                this.setOptions(d);
                d.enabled && (this.render(), C(this.chart, "endResize", function () {
                    this.legend.positionCheckboxes()
                }),
                    this.proximate ? this.unchartrender = C(this.chart, "render", function () {
                        this.legend.proximatePositions();
                        this.legend.positionItems()
                    }) : this.unchartrender && this.unchartrender())
            }, setOptions: function (a) {
                var b = v(a.padding, 8);
                this.options = a;
                this.chart.styledMode || (this.itemStyle = a.itemStyle, this.itemHiddenStyle = u(this.itemStyle, a.itemHiddenStyle));
                this.itemMarginTop = a.itemMarginTop || 0;
                this.padding = b;
                this.initialItemY = b - 5;
                this.symbolWidth = v(a.symbolWidth, 16);
                this.pages = [];
                this.proximate = "proximate" === a.layout &&
                    !this.chart.inverted
            }, update: function (a, d) {
                var b = this.chart;
                this.setOptions(u(!0, this.options, a));
                this.destroy();
                b.isDirtyLegend = b.isDirtyBox = !0;
                v(d, !0) && b.redraw();
                e(this, "afterUpdate")
            }, colorizeItem: function (a, d) {
                a.legendGroup[d ? "removeClass" : "addClass"]("highcharts-legend-item-hidden");
                if (!this.chart.styledMode) {
                    var b = this.options, c = a.legendItem, g = a.legendLine, h = a.legendSymbol,
                        m = this.itemHiddenStyle.color, b = d ? b.itemStyle.color : m, k = d ? a.color || m : m,
                        p = a.options && a.options.marker, n = {fill: k};
                    c && c.css({
                        fill: b,
                        color: b
                    });
                    g && g.attr({stroke: k});
                    h && (p && h.isMarker && (n = a.pointAttribs(), d || (n.stroke = n.fill = m)), h.attr(n))
                }
                e(this, "afterColorizeItem", {item: a, visible: d})
            }, positionItems: function () {
                this.allItems.forEach(this.positionItem, this);
                this.chart.isResizing || this.positionCheckboxes()
            }, positionItem: function (a) {
                var b = this.options, d = b.symbolPadding, b = !b.rtl, c = a._legendItemPos, e = c[0], c = c[1],
                    h = a.checkbox;
                if ((a = a.legendGroup) && a.element) a[k(a.translateY) ? "animate" : "attr"]({
                    translateX: b ? e : this.legendWidth - e - 2 * d - 4,
                    translateY: c
                });
                h && (h.x = e, h.y = c)
            }, destroyItem: function (a) {
                var b = a.checkbox;
                ["legendItem", "legendLine", "legendSymbol", "legendGroup"].forEach(function (b) {
                    a[b] && (a[b] = a[b].destroy())
                });
                b && F(a.checkbox)
            }, destroy: function () {
                function a(a) {
                    this[a] && (this[a] = this[a].destroy())
                }

                this.getAllItems().forEach(function (b) {
                    ["legendItem", "legendGroup"].forEach(a, b)
                });
                "clipRect up down pager nav box title group".split(" ").forEach(a, this);
                this.display = null
            }, positionCheckboxes: function () {
                var a = this.group && this.group.alignAttr,
                    d, e = this.clipHeight || this.legendHeight, c = this.titleHeight;
                a && (d = a.translateY, this.allItems.forEach(function (b) {
                    var g = b.checkbox, h;
                    g && (h = d + c + g.y + (this.scrollOffset || 0) + 3, I(g, {
                        left: a.translateX + b.checkboxOffset + g.x - 20 + "px",
                        top: h + "px",
                        display: this.proximate || h > d - 6 && h < d + e - 6 ? "" : "none"
                    }))
                }, this))
            }, renderTitle: function () {
                var a = this.options, d = this.padding, e = a.title, c = 0;
                e.text && (this.title || (this.title = this.chart.renderer.label(e.text, d - 3, d - 4, null, null, null, a.useHTML, null, "legend-title").attr({zIndex: 1}),
                this.chart.styledMode || this.title.css(e.style), this.title.add(this.group)), e.width || this.title.css({width: this.maxLegendWidth + "px"}), a = this.title.getBBox(), c = a.height, this.offsetWidth = a.width, this.contentGroup.attr({translateY: c}));
                this.titleHeight = c
            }, setText: function (b) {
                var d = this.options;
                b.legendItem.attr({text: d.labelFormat ? a.format(d.labelFormat, b, this.chart.time) : d.labelFormatter.call(b)})
            }, renderItem: function (a) {
                var b = this.chart, d = b.renderer, c = this.options, e = this.symbolWidth, h = c.symbolPadding,
                    m = this.itemStyle, k = this.itemHiddenStyle,
                    p = "horizontal" === c.layout ? v(c.itemDistance, 20) : 0, n = !c.rtl, x = a.legendItem,
                    B = !a.series, E = !B && a.series.drawLegendSymbol ? a.series : a, H = E.options,
                    H = this.createCheckboxForItem && H && H.showCheckbox, p = e + h + p + (H ? 20 : 0),
                    f = c.useHTML, r = a.options.className;
                x || (a.legendGroup = d.g("legend-item").addClass("highcharts-" + E.type + "-series highcharts-color-" + a.colorIndex + (r ? " " + r : "") + (B ? " highcharts-series-" + a.index : "")).attr({zIndex: 1}).add(this.scrollGroup), a.legendItem = x = d.text("",
                    n ? e + h : -h, this.baseline || 0, f), b.styledMode || x.css(u(a.visible ? m : k)), x.attr({
                    align: n ? "left" : "right",
                    zIndex: 2
                }).add(a.legendGroup), this.baseline || (this.fontMetrics = d.fontMetrics(b.styledMode ? 12 : m.fontSize, x), this.baseline = this.fontMetrics.f + 3 + this.itemMarginTop, x.attr("y", this.baseline)), this.symbolHeight = c.symbolHeight || this.fontMetrics.f, E.drawLegendSymbol(this, a), this.setItemEvents && this.setItemEvents(a, x, f));
                H && !a.checkbox && this.createCheckboxForItem(a);
                this.colorizeItem(a, a.visible);
                !b.styledMode &&
                m.width || x.css({width: (c.itemWidth || this.widthOption || b.spacingBox.width) - p});
                this.setText(a);
                b = x.getBBox();
                a.itemWidth = a.checkboxOffset = c.itemWidth || a.legendItemWidth || b.width + p;
                this.maxItemWidth = Math.max(this.maxItemWidth, a.itemWidth);
                this.totalItemWidth += a.itemWidth;
                this.itemHeight = a.itemHeight = Math.round(a.legendItemHeight || b.height || this.symbolHeight)
            }, layoutItem: function (a) {
                var b = this.options, d = this.padding, c = "horizontal" === b.layout, e = a.itemHeight,
                    h = b.itemMarginBottom || 0, m = this.itemMarginTop,
                    k = c ? v(b.itemDistance, 20) : 0, p = this.maxLegendWidth,
                    b = b.alignColumns && this.totalItemWidth > p ? this.maxItemWidth : a.itemWidth;
                c && this.itemX - d + b > p && (this.itemX = d, this.lastLineHeight && (this.itemY += m + this.lastLineHeight + h), this.lastLineHeight = 0);
                this.lastItemY = m + this.itemY + h;
                this.lastLineHeight = Math.max(e, this.lastLineHeight);
                a._legendItemPos = [this.itemX, this.itemY];
                c ? this.itemX += b : (this.itemY += m + e + h, this.lastLineHeight = e);
                this.offsetWidth = this.widthOption || Math.max((c ? this.itemX - d - (a.checkbox ? 0 : k) : b) + d, this.offsetWidth)
            },
            getAllItems: function () {
                var a = [];
                this.chart.series.forEach(function (b) {
                    var d = b && b.options;
                    b && v(d.showInLegend, k(d.linkedTo) ? !1 : void 0, !0) && (a = a.concat(b.legendItems || ("point" === d.legendType ? b.data : b)))
                });
                e(this, "afterGetAllItems", {allItems: a});
                return a
            }, getAlignment: function () {
                var a = this.options;
                return this.proximate ? a.align.charAt(0) + "tv" : a.floating ? "" : a.align.charAt(0) + a.verticalAlign.charAt(0) + a.layout.charAt(0)
            }, adjustMargins: function (a, d) {
                var b = this.chart, c = this.options, g = this.getAlignment(),
                    e = void 0 !== b.options.title.margin ? b.titleOffset + b.options.title.margin : 0;
                g && [/(lth|ct|rth)/, /(rtv|rm|rbv)/, /(rbh|cb|lbh)/, /(lbv|lm|ltv)/].forEach(function (h, l) {
                    h.test(g) && !k(a[l]) && (b[t[l]] = Math.max(b[t[l]], b.legend[(l + 1) % 2 ? "legendHeight" : "legendWidth"] + [1, -1, -1, 1][l] * c[l % 2 ? "x" : "y"] + v(c.margin, 12) + d[l] + (0 === l && (0 === b.titleOffset ? 0 : e))))
                })
            }, proximatePositions: function () {
                var b = this.chart, d = [], e = "left" === this.options.align;
                this.allItems.forEach(function (c) {
                    var g, h;
                    h = e;
                    var l;
                    c.yAxis && c.points && (c.xAxis.options.reversed &&
                    (h = !h), g = a.find(h ? c.points : c.points.slice(0).reverse(), function (b) {
                        return a.isNumber(b.plotY)
                    }), h = c.legendGroup.getBBox().height, l = c.yAxis.top - b.plotTop, c.visible ? (g = g ? g.plotY : c.yAxis.height, g += l - .3 * h) : g = l + c.yAxis.height, d.push({
                        target: g,
                        size: h,
                        item: c
                    }))
                }, this);
                a.distribute(d, b.plotHeight);
                d.forEach(function (a) {
                    a.item._legendItemPos[1] = b.plotTop - b.spacing[0] + a.pos
                })
            }, render: function () {
                var b = this.chart, d = b.renderer, l = this.group, c, m, k, p = this.box, q = this.options,
                    A = this.padding;
                this.itemX = A;
                this.itemY =
                    this.initialItemY;
                this.lastItemY = this.offsetWidth = 0;
                this.widthOption = a.relativeLength(q.width, b.spacingBox.width - A);
                c = b.spacingBox.width - 2 * A - q.x;
                -1 < ["rm", "lm"].indexOf(this.getAlignment().substring(0, 2)) && (c /= 2);
                this.maxLegendWidth = this.widthOption || c;
                l || (this.group = l = d.g("legend").attr({zIndex: 7}).add(), this.contentGroup = d.g().attr({zIndex: 1}).add(l), this.scrollGroup = d.g().add(this.contentGroup));
                this.renderTitle();
                c = this.getAllItems();
                h(c, function (a, b) {
                    return (a.options && a.options.legendIndex || 0) -
                        (b.options && b.options.legendIndex || 0)
                });
                q.reversed && c.reverse();
                this.allItems = c;
                this.display = m = !!c.length;
                this.itemHeight = this.totalItemWidth = this.maxItemWidth = this.lastLineHeight = 0;
                c.forEach(this.renderItem, this);
                c.forEach(this.layoutItem, this);
                c = (this.widthOption || this.offsetWidth) + A;
                k = this.lastItemY + this.lastLineHeight + this.titleHeight;
                k = this.handleOverflow(k);
                k += A;
                p || (this.box = p = d.rect().addClass("highcharts-legend-box").attr({r: q.borderRadius}).add(l), p.isNew = !0);
                b.styledMode || p.attr({
                    stroke: q.borderColor,
                    "stroke-width": q.borderWidth || 0, fill: q.backgroundColor || "none"
                }).shadow(q.shadow);
                0 < c && 0 < k && (p[p.isNew ? "attr" : "animate"](p.crisp.call({}, {
                    x: 0,
                    y: 0,
                    width: c,
                    height: k
                }, p.strokeWidth())), p.isNew = !1);
                p[m ? "show" : "hide"]();
                b.styledMode && "none" === l.getStyle("display") && (c = k = 0);
                this.legendWidth = c;
                this.legendHeight = k;
                m && (d = b.spacingBox, /(lth|ct|rth)/.test(this.getAlignment()) && (p = d.y + b.titleOffset, d = u(d, {y: 0 < b.titleOffset ? p += b.options.title.margin : p})), l.align(u(q, {
                    width: c, height: k, verticalAlign: this.proximate ?
                        "top" : q.verticalAlign
                }), !0, d));
                this.proximate || this.positionItems();
                e(this, "afterRender")
            }, handleOverflow: function (a) {
                var b = this, d = this.chart, c = d.renderer, e = this.options, h = e.y, m = this.padding,
                    h = d.spacingBox.height + ("top" === e.verticalAlign ? -h : h) - m, k = e.maxHeight, p,
                    n = this.clipRect, x = e.navigation, B = v(x.animation, !0), E = x.arrowSize || 12,
                    H = this.nav, f = this.pages, r, q = this.allItems, t = function (a) {
                        "number" === typeof a ? n.attr({height: a}) : n && (b.clipRect = n.destroy(), b.contentGroup.clip());
                        b.contentGroup.div && (b.contentGroup.div.style.clip =
                            a ? "rect(" + m + "px,9999px," + (m + a) + "px,0)" : "auto")
                    }, L = function (a) {
                        b[a] = c.circle(0, 0, 1.3 * E).translate(E / 2, E / 2).add(H);
                        d.styledMode || b[a].attr("fill", "rgba(0,0,0,0.0001)");
                        return b[a]
                    };
                "horizontal" !== e.layout || "middle" === e.verticalAlign || e.floating || (h /= 2);
                k && (h = Math.min(h, k));
                f.length = 0;
                a > h && !1 !== x.enabled ? (this.clipHeight = p = Math.max(h - 20 - this.titleHeight - m, 0), this.currentPage = v(this.currentPage, 1), this.fullHeight = a, q.forEach(function (a, b) {
                    var c = a._legendItemPos[1], d = Math.round(a.legendItem.getBBox().height),
                        e = f.length;
                    if (!e || c - f[e - 1] > p && (r || c) !== f[e - 1]) f.push(r || c), e++;
                    a.pageIx = e - 1;
                    r && (q[b - 1].pageIx = e - 1);
                    b === q.length - 1 && c + d - f[e - 1] > p && c !== r && (f.push(c), a.pageIx = e);
                    c !== r && (r = c)
                }), n || (n = b.clipRect = c.clipRect(0, m, 9999, 0), b.contentGroup.clip(n)), t(p), H || (this.nav = H = c.g().attr({zIndex: 1}).add(this.group), this.up = c.symbol("triangle", 0, 0, E, E).add(H), L("upTracker").on("click", function () {
                    b.scroll(-1, B)
                }), this.pager = c.text("", 15, 10).addClass("highcharts-legend-navigation"), d.styledMode || this.pager.css(x.style),
                    this.pager.add(H), this.down = c.symbol("triangle-down", 0, 0, E, E).add(H), L("downTracker").on("click", function () {
                    b.scroll(1, B)
                })), b.scroll(0), a = h) : H && (t(), this.nav = H.destroy(), this.scrollGroup.attr({translateY: 1}), this.clipHeight = 0);
                return a
            }, scroll: function (a, d) {
                var b = this.pages, c = b.length, e = this.currentPage + a;
                a = this.clipHeight;
                var g = this.options.navigation, h = this.pager, m = this.padding;
                e > c && (e = c);
                0 < e && (void 0 !== d && p(d, this.chart), this.nav.attr({
                    translateX: m, translateY: a + this.padding + 7 + this.titleHeight,
                    visibility: "visible"
                }), [this.up, this.upTracker].forEach(function (a) {
                    a.attr({"class": 1 === e ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"})
                }), h.attr({text: e + "/" + c}), [this.down, this.downTracker].forEach(function (a) {
                    a.attr({
                        x: 18 + this.pager.getBBox().width,
                        "class": e === c ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
                    })
                }, this), this.chart.styledMode || (this.up.attr({fill: 1 === e ? g.inactiveColor : g.activeColor}), this.upTracker.css({cursor: 1 === e ? "default" : "pointer"}), this.down.attr({
                    fill: e ===
                    c ? g.inactiveColor : g.activeColor
                }), this.downTracker.css({cursor: e === c ? "default" : "pointer"})), this.scrollOffset = -b[e - 1] + this.initialItemY, this.scrollGroup.animate({translateY: this.scrollOffset}), this.currentPage = e, this.positionCheckboxes())
            }
        };
        a.LegendSymbolMixin = {
            drawRectangle: function (a, d) {
                var b = a.symbolHeight, c = a.options.squareSymbol;
                d.legendSymbol = this.chart.renderer.rect(c ? (a.symbolWidth - b) / 2 : 0, a.baseline - b + 1, c ? b : a.symbolWidth, b, v(a.options.symbolRadius, b / 2)).addClass("highcharts-point").attr({zIndex: 3}).add(d.legendGroup)
            },
            drawLineMarker: function (a) {
                var b = this.options, d = b.marker, c = a.symbolWidth, e = a.symbolHeight, h = e / 2,
                    m = this.chart.renderer, k = this.legendGroup;
                a = a.baseline - Math.round(.3 * a.fontMetrics.b);
                var p = {};
                this.chart.styledMode || (p = {"stroke-width": b.lineWidth || 0}, b.dashStyle && (p.dashstyle = b.dashStyle));
                this.legendLine = m.path(["M", 0, a, "L", c, a]).addClass("highcharts-graph").attr(p).add(k);
                d && !1 !== d.enabled && c && (b = Math.min(v(d.radius, h), h), 0 === this.symbol.indexOf("url") && (d = u(d, {
                    width: e,
                    height: e
                }), b = 0), this.legendSymbol =
                    d = m.symbol(this.symbol, c / 2 - b, a - b, 2 * b, 2 * b, d).addClass("highcharts-point").add(k), d.isMarker = !0)
            }
        };
        (/Trident\/7\.0/.test(d.navigator && d.navigator.userAgent) || q) && m(a.Legend.prototype, "positionItem", function (a, d) {
            var b = this, c = function () {
                d._legendItemPos && a.call(b, d)
            };
            c();
            b.bubbleLegend || setTimeout(c)
        })
    });
    K(G, "parts/Chart.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.animate, F = a.animObject, k = a.attr, e = a.doc, q = a.Axis,
            t = a.createElement, u = a.defaultOptions, v = a.discardElement, p = a.charts, h = a.css,
            d = a.defined, m = a.extend, b = a.find, g = a.fireEvent, l = a.isNumber, c = a.isObject,
            w = a.isString, z = a.Legend, J = a.marginNames, D = a.merge, A = a.objectEach, n = a.Pointer,
            x = a.pick, B = a.pInt, E = a.removeEvent, H = a.seriesTypes, f = a.splat, r = a.syncTimeout,
            N = a.win, M = a.Chart = function () {
                this.getArgs.apply(this, arguments)
            };
        a.chart = function (a, b, c) {
            return new M(a, b, c)
        };
        m(M.prototype, {
            callbacks: [], getArgs: function () {
                var a = [].slice.call(arguments);
                if (w(a[0]) || a[0].nodeName) this.renderTo = a.shift();
                this.init(a[0], a[1])
            }, init: function (b,
                               d) {
                var f, e = b.series, n = b.plotOptions || {};
                g(this, "init", {args: arguments}, function () {
                    b.series = null;
                    f = D(u, b);
                    A(f.plotOptions, function (a, b) {
                        c(a) && (a.tooltip = n[b] && D(n[b].tooltip) || void 0)
                    });
                    f.tooltip.userOptions = b.chart && b.chart.forExport && b.tooltip.userOptions || b.tooltip;
                    f.series = b.series = e;
                    this.userOptions = b;
                    var h = f.chart, m = h.events;
                    this.margin = [];
                    this.spacing = [];
                    this.bounds = {h: {}, v: {}};
                    this.labelCollectors = [];
                    this.callback = d;
                    this.isResizing = 0;
                    this.options = f;
                    this.axes = [];
                    this.series = [];
                    this.time = b.time &&
                    Object.keys(b.time).length ? new a.Time(b.time) : a.time;
                    this.styledMode = h.styledMode;
                    this.hasCartesianSeries = h.showAxes;
                    var l = this;
                    l.index = p.length;
                    p.push(l);
                    a.chartCount++;
                    m && A(m, function (a, b) {
                        C(l, b, a)
                    });
                    l.xAxis = [];
                    l.yAxis = [];
                    l.pointCount = l.colorCounter = l.symbolCounter = 0;
                    g(l, "afterInit");
                    l.firstRender()
                })
            }, initSeries: function (b) {
                var c = this.options.chart;
                (c = H[b.type || c.type || c.defaultSeriesType]) || a.error(17, !0, this);
                c = new c;
                c.init(this, b);
                return c
            }, orderSeries: function (a) {
                var b = this.series;
                for (a = a ||
                    0; a < b.length; a++) b[a] && (b[a].index = a, b[a].name = b[a].getName())
            }, isInsidePlot: function (a, b, c) {
                var d = c ? b : a;
                a = c ? a : b;
                return 0 <= d && d <= this.plotWidth && 0 <= a && a <= this.plotHeight
            }, redraw: function (b) {
                g(this, "beforeRedraw");
                var c = this.axes, d = this.series, f = this.pointer, e = this.legend,
                    n = this.userOptions.legend, h = this.isDirtyLegend, l, x, r = this.hasCartesianSeries,
                    B = this.isDirtyBox, k, p = this.renderer, E = p.isHidden(), w = [];
                this.setResponsive && this.setResponsive(!1);
                a.setAnimation(b, this);
                E && this.temporaryDisplay();
                this.layOutTitles();
                for (b = d.length; b--;) if (k = d[b], k.options.stacking && (l = !0, k.isDirty)) {
                    x = !0;
                    break
                }
                if (x) for (b = d.length; b--;) k = d[b], k.options.stacking && (k.isDirty = !0);
                d.forEach(function (a) {
                    a.isDirty && ("point" === a.options.legendType ? (a.updateTotals && a.updateTotals(), h = !0) : n && (n.labelFormatter || n.labelFormat) && (h = !0));
                    a.isDirtyData && g(a, "updatedData")
                });
                h && e && e.options.enabled && (e.render(), this.isDirtyLegend = !1);
                l && this.getStacks();
                r && c.forEach(function (a) {
                    a.updateNames();
                    a.setScale()
                });
                this.getMargins();
                r && (c.forEach(function (a) {
                    a.isDirty &&
                    (B = !0)
                }), c.forEach(function (a) {
                    var b = a.min + "," + a.max;
                    a.extKey !== b && (a.extKey = b, w.push(function () {
                        g(a, "afterSetExtremes", m(a.eventArgs, a.getExtremes()));
                        delete a.eventArgs
                    }));
                    (B || l) && a.redraw()
                }));
                B && this.drawChartBox();
                g(this, "predraw");
                d.forEach(function (a) {
                    (B || a.isDirty) && a.visible && a.redraw();
                    a.isDirtyData = !1
                });
                f && f.reset(!0);
                p.draw();
                g(this, "redraw");
                g(this, "render");
                E && this.temporaryDisplay(!0);
                w.forEach(function (a) {
                    a.call()
                })
            }, get: function (a) {
                function c(b) {
                    return b.id === a || b.options && b.options.id ===
                        a
                }

                var d, f = this.series, e;
                d = b(this.axes, c) || b(this.series, c);
                for (e = 0; !d && e < f.length; e++) d = b(f[e].points || [], c);
                return d
            }, getAxes: function () {
                var a = this, b = this.options, c = b.xAxis = f(b.xAxis || {}), b = b.yAxis = f(b.yAxis || {});
                g(this, "getAxes");
                c.forEach(function (a, b) {
                    a.index = b;
                    a.isX = !0
                });
                b.forEach(function (a, b) {
                    a.index = b
                });
                c.concat(b).forEach(function (b) {
                    new q(a, b)
                });
                g(this, "afterGetAxes")
            }, getSelectedPoints: function () {
                var a = [];
                this.series.forEach(function (b) {
                    a = a.concat((b[b.hasGroupedData ? "points" : "data"] ||
                        []).filter(function (a) {
                        return a.selected
                    }))
                });
                return a
            }, getSelectedSeries: function () {
                return this.series.filter(function (a) {
                    return a.selected
                })
            }, setTitle: function (a, b, c) {
                var d = this, f = d.options, e = d.styledMode, g;
                g = f.title = D(!e && {
                    style: {
                        color: "#333333",
                        fontSize: f.isStock ? "16px" : "18px"
                    }
                }, f.title, a);
                f = f.subtitle = D(!e && {style: {color: "#666666"}}, f.subtitle, b);
                [["title", a, g], ["subtitle", b, f]].forEach(function (a, b) {
                    var c = a[0], f = d[c], g = a[1];
                    a = a[2];
                    f && g && (d[c] = f = f.destroy());
                    a && !f && (d[c] = d.renderer.text(a.text,
                        0, 0, a.useHTML).attr({
                        align: a.align,
                        "class": "highcharts-" + c,
                        zIndex: a.zIndex || 4
                    }).add(), d[c].update = function (a) {
                        d.setTitle(!b && a, b && a)
                    }, e || d[c].css(a.style))
                });
                d.layOutTitles(c)
            }, layOutTitles: function (a) {
                var b = 0, c, d = this.renderer, f = this.spacingBox;
                ["title", "subtitle"].forEach(function (a) {
                    var c = this[a], e = this.options[a];
                    a = "title" === a ? -3 : e.verticalAlign ? 0 : b + 2;
                    var g;
                    c && (this.styledMode || (g = e.style.fontSize), g = d.fontMetrics(g, c).b, c.css({width: (e.width || f.width + e.widthAdjust) + "px"}).align(m({y: a + g}, e),
                        !1, "spacingBox"), e.floating || e.verticalAlign || (b = Math.ceil(b + c.getBBox(e.useHTML).height)))
                }, this);
                c = this.titleOffset !== b;
                this.titleOffset = b;
                !this.isDirtyBox && c && (this.isDirtyBox = this.isDirtyLegend = c, this.hasRendered && x(a, !0) && this.isDirtyBox && this.redraw())
            }, getChartSize: function () {
                var b = this.options.chart, c = b.width, b = b.height, f = this.renderTo;
                d(c) || (this.containerWidth = a.getStyle(f, "width"));
                d(b) || (this.containerHeight = a.getStyle(f, "height"));
                this.chartWidth = Math.max(0, c || this.containerWidth || 600);
                this.chartHeight = Math.max(0, a.relativeLength(b, this.chartWidth) || (1 < this.containerHeight ? this.containerHeight : 400))
            }, temporaryDisplay: function (b) {
                var c = this.renderTo;
                if (b) for (; c && c.style;) c.hcOrigStyle && (a.css(c, c.hcOrigStyle), delete c.hcOrigStyle), c.hcOrigDetached && (e.body.removeChild(c), c.hcOrigDetached = !1), c = c.parentNode; else for (; c && c.style;) {
                    e.body.contains(c) || c.parentNode || (c.hcOrigDetached = !0, e.body.appendChild(c));
                    if ("none" === a.getStyle(c, "display", !1) || c.hcOricDetached) c.hcOrigStyle = {
                        display: c.style.display,
                        height: c.style.height, overflow: c.style.overflow
                    }, b = {
                        display: "block",
                        overflow: "hidden"
                    }, c !== this.renderTo && (b.height = 0), a.css(c, b), c.offsetWidth || c.style.setProperty("display", "block", "important");
                    c = c.parentNode;
                    if (c === e.body) break
                }
            }, setClassName: function (a) {
                this.container.className = "highcharts-container " + (a || "")
            }, getContainer: function () {
                var b, c = this.options, d = c.chart, f, n;
                b = this.renderTo;
                var x = a.uniqueKey(), r, E;
                b || (this.renderTo = b = d.renderTo);
                w(b) && (this.renderTo = b = e.getElementById(b));
                b || a.error(13,
                    !0, this);
                f = B(k(b, "data-highcharts-chart"));
                l(f) && p[f] && p[f].hasRendered && p[f].destroy();
                k(b, "data-highcharts-chart", this.index);
                b.innerHTML = "";
                d.skipClone || b.offsetWidth || this.temporaryDisplay();
                this.getChartSize();
                f = this.chartWidth;
                n = this.chartHeight;
                h(b, {overflow: "hidden"});
                this.styledMode || (r = m({
                    position: "relative",
                    overflow: "hidden",
                    width: f + "px",
                    height: n + "px",
                    textAlign: "left",
                    lineHeight: "normal",
                    zIndex: 0,
                    "-webkit-tap-highlight-color": "rgba(0,0,0,0)"
                }, d.style));
                this.container = b = t("div", {id: x}, r,
                    b);
                this._cursor = b.style.cursor;
                this.renderer = new (a[d.renderer] || a.Renderer)(b, f, n, null, d.forExport, c.exporting && c.exporting.allowHTML, this.styledMode);
                this.setClassName(d.className);
                if (this.styledMode) for (E in c.defs) this.renderer.definition(c.defs[E]); else this.renderer.setStyle(d.style);
                this.renderer.chartIndex = this.index;
                g(this, "afterGetContainer")
            }, getMargins: function (a) {
                var b = this.spacing, c = this.margin, f = this.titleOffset;
                this.resetMargins();
                f && !d(c[0]) && (this.plotTop = Math.max(this.plotTop, f +
                    this.options.title.margin + b[0]));
                this.legend && this.legend.display && this.legend.adjustMargins(c, b);
                g(this, "getMargins");
                a || this.getAxisMargins()
            }, getAxisMargins: function () {
                var a = this, b = a.axisOffset = [0, 0, 0, 0], c = a.margin;
                a.hasCartesianSeries && a.axes.forEach(function (a) {
                    a.visible && a.getOffset()
                });
                J.forEach(function (f, e) {
                    d(c[e]) || (a[f] += b[e])
                });
                a.setChartSize()
            }, reflow: function (b) {
                var c = this, f = c.options.chart, g = c.renderTo, n = d(f.width) && d(f.height),
                    h = f.width || a.getStyle(g, "width"), f = f.height || a.getStyle(g,
                        "height"), g = b ? b.target : N;
                if (!n && !c.isPrinting && h && f && (g === N || g === e)) {
                    if (h !== c.containerWidth || f !== c.containerHeight) a.clearTimeout(c.reflowTimeout), c.reflowTimeout = r(function () {
                        c.container && c.setSize(void 0, void 0, !1)
                    }, b ? 100 : 0);
                    c.containerWidth = h;
                    c.containerHeight = f
                }
            }, setReflow: function (a) {
                var b = this;
                !1 === a || this.unbindReflow ? !1 === a && this.unbindReflow && (this.unbindReflow = this.unbindReflow()) : (this.unbindReflow = C(N, "resize", function (a) {
                    b.reflow(a)
                }), C(this, "destroy", this.unbindReflow))
            }, setSize: function (b,
                                  c, d) {
                var f = this, e = f.renderer, n;
                f.isResizing += 1;
                a.setAnimation(d, f);
                f.oldChartHeight = f.chartHeight;
                f.oldChartWidth = f.chartWidth;
                void 0 !== b && (f.options.chart.width = b);
                void 0 !== c && (f.options.chart.height = c);
                f.getChartSize();
                f.styledMode || (n = e.globalAnimation, (n ? I : h)(f.container, {
                    width: f.chartWidth + "px",
                    height: f.chartHeight + "px"
                }, n));
                f.setChartSize(!0);
                e.setSize(f.chartWidth, f.chartHeight, d);
                f.axes.forEach(function (a) {
                    a.isDirty = !0;
                    a.setScale()
                });
                f.isDirtyLegend = !0;
                f.isDirtyBox = !0;
                f.layOutTitles();
                f.getMargins();
                f.redraw(d);
                f.oldChartHeight = null;
                g(f, "resize");
                r(function () {
                    f && g(f, "endResize", null, function () {
                        --f.isResizing
                    })
                }, F(n).duration)
            }, setChartSize: function (a) {
                var b = this.inverted, c = this.renderer, f = this.chartWidth, d = this.chartHeight,
                    e = this.options.chart, n = this.spacing, h = this.clipOffset, l, m, x, r;
                this.plotLeft = l = Math.round(this.plotLeft);
                this.plotTop = m = Math.round(this.plotTop);
                this.plotWidth = x = Math.max(0, Math.round(f - l - this.marginRight));
                this.plotHeight = r = Math.max(0, Math.round(d - m - this.marginBottom));
                this.plotSizeX =
                    b ? r : x;
                this.plotSizeY = b ? x : r;
                this.plotBorderWidth = e.plotBorderWidth || 0;
                this.spacingBox = c.spacingBox = {
                    x: n[3],
                    y: n[0],
                    width: f - n[3] - n[1],
                    height: d - n[0] - n[2]
                };
                this.plotBox = c.plotBox = {x: l, y: m, width: x, height: r};
                f = 2 * Math.floor(this.plotBorderWidth / 2);
                b = Math.ceil(Math.max(f, h[3]) / 2);
                c = Math.ceil(Math.max(f, h[0]) / 2);
                this.clipBox = {
                    x: b,
                    y: c,
                    width: Math.floor(this.plotSizeX - Math.max(f, h[1]) / 2 - b),
                    height: Math.max(0, Math.floor(this.plotSizeY - Math.max(f, h[2]) / 2 - c))
                };
                a || this.axes.forEach(function (a) {
                    a.setAxisSize();
                    a.setAxisTranslation()
                });
                g(this, "afterSetChartSize", {skipAxes: a})
            }, resetMargins: function () {
                g(this, "resetMargins");
                var a = this, b = a.options.chart;
                ["margin", "spacing"].forEach(function (f) {
                    var d = b[f], e = c(d) ? d : [d, d, d, d];
                    ["Top", "Right", "Bottom", "Left"].forEach(function (c, d) {
                        a[f][d] = x(b[f + c], e[d])
                    })
                });
                J.forEach(function (b, c) {
                    a[b] = x(a.margin[c], a.spacing[c])
                });
                a.axisOffset = [0, 0, 0, 0];
                a.clipOffset = [0, 0, 0, 0]
            }, drawChartBox: function () {
                var a = this.options.chart, b = this.renderer, c = this.chartWidth, f = this.chartHeight,
                    d = this.chartBackground,
                    e = this.plotBackground, n = this.plotBorder, h, l = this.styledMode, m = this.plotBGImage,
                    x = a.backgroundColor, r = a.plotBackgroundColor, B = a.plotBackgroundImage, k,
                    p = this.plotLeft, E = this.plotTop, w = this.plotWidth, H = this.plotHeight,
                    z = this.plotBox, A = this.clipRect, q = this.clipBox, t = "animate";
                d || (this.chartBackground = d = b.rect().addClass("highcharts-background").add(), t = "attr");
                if (l) h = k = d.strokeWidth(); else {
                    h = a.borderWidth || 0;
                    k = h + (a.shadow ? 8 : 0);
                    x = {fill: x || "none"};
                    if (h || d["stroke-width"]) x.stroke = a.borderColor, x["stroke-width"] =
                        h;
                    d.attr(x).shadow(a.shadow)
                }
                d[t]({x: k / 2, y: k / 2, width: c - k - h % 2, height: f - k - h % 2, r: a.borderRadius});
                t = "animate";
                e || (t = "attr", this.plotBackground = e = b.rect().addClass("highcharts-plot-background").add());
                e[t](z);
                l || (e.attr({fill: r || "none"}).shadow(a.plotShadow), B && (m ? m.animate(z) : this.plotBGImage = b.image(B, p, E, w, H).add()));
                A ? A.animate({width: q.width, height: q.height}) : this.clipRect = b.clipRect(q);
                t = "animate";
                n || (t = "attr", this.plotBorder = n = b.rect().addClass("highcharts-plot-border").attr({zIndex: 1}).add());
                l || n.attr({stroke: a.plotBorderColor, "stroke-width": a.plotBorderWidth || 0, fill: "none"});
                n[t](n.crisp({x: p, y: E, width: w, height: H}, -n.strokeWidth()));
                this.isDirtyBox = !1;
                g(this, "afterDrawChartBox")
            }, propFromSeries: function () {
                var a = this, b = a.options.chart, c, f = a.options.series, d, e;
                ["inverted", "angular", "polar"].forEach(function (g) {
                    c = H[b.type || b.defaultSeriesType];
                    e = b[g] || c && c.prototype[g];
                    for (d = f && f.length; !e && d--;) (c = H[f[d].type]) && c.prototype[g] && (e = !0);
                    a[g] = e
                })
            }, linkSeries: function () {
                var a = this, b = a.series;
                b.forEach(function (a) {
                    a.linkedSeries.length = 0
                });
                b.forEach(function (b) {
                    var c = b.options.linkedTo;
                    w(c) && (c = ":previous" === c ? a.series[b.index - 1] : a.get(c)) && c.linkedParent !== b && (c.linkedSeries.push(b), b.linkedParent = c, b.visible = x(b.options.visible, c.options.visible, b.visible))
                });
                g(this, "afterLinkSeries")
            }, renderSeries: function () {
                this.series.forEach(function (a) {
                    a.translate();
                    a.render()
                })
            }, renderLabels: function () {
                var a = this, b = a.options.labels;
                b.items && b.items.forEach(function (c) {
                    var f = m(b.style, c.style),
                        d = B(f.left) + a.plotLeft, e = B(f.top) + a.plotTop + 12;
                    delete f.left;
                    delete f.top;
                    a.renderer.text(c.html, d, e).attr({zIndex: 2}).css(f).add()
                })
            }, render: function () {
                var a = this.axes, b = this.renderer, c = this.options, f = 0, d, e, g;
                this.setTitle();
                this.legend = new z(this, c.legend);
                this.getStacks && this.getStacks();
                this.getMargins(!0);
                this.setChartSize();
                c = this.plotWidth;
                a.some(function (a) {
                    if (a.horiz && a.visible && a.options.labels.enabled && a.series.length) return f = 21, !0
                });
                d = this.plotHeight = Math.max(this.plotHeight - f, 0);
                a.forEach(function (a) {
                    a.setScale()
                });
                this.getAxisMargins();
                e = 1.1 < c / this.plotWidth;
                g = 1.05 < d / this.plotHeight;
                if (e || g) a.forEach(function (a) {
                    (a.horiz && e || !a.horiz && g) && a.setTickInterval(!0)
                }), this.getMargins();
                this.drawChartBox();
                this.hasCartesianSeries && a.forEach(function (a) {
                    a.visible && a.render()
                });
                this.seriesGroup || (this.seriesGroup = b.g("series-group").attr({zIndex: 3}).add());
                this.renderSeries();
                this.renderLabels();
                this.addCredits();
                this.setResponsive && this.setResponsive();
                this.hasRendered = !0
            }, addCredits: function (a) {
                var b = this;
                a = D(!0,
                    this.options.credits, a);
                a.enabled && !this.credits && (this.credits = this.renderer.text(a.text + (this.mapCredits || ""), 0, 0).addClass("highcharts-credits").on("click", function () {
                    a.href && (N.location.href = a.href)
                }).attr({
                    align: a.position.align,
                    zIndex: 8
                }), b.styledMode || this.credits.css(a.style), this.credits.add().align(a.position), this.credits.update = function (a) {
                    b.credits = b.credits.destroy();
                    b.addCredits(a)
                })
            }, destroy: function () {
                var b = this, c = b.axes, f = b.series, d = b.container, e, n = d && d.parentNode;
                g(b, "destroy");
                b.renderer.forExport ? a.erase(p, b) : p[b.index] = void 0;
                a.chartCount--;
                b.renderTo.removeAttribute("data-highcharts-chart");
                E(b);
                for (e = c.length; e--;) c[e] = c[e].destroy();
                this.scroller && this.scroller.destroy && this.scroller.destroy();
                for (e = f.length; e--;) f[e] = f[e].destroy();
                "title subtitle chartBackground plotBackground plotBGImage plotBorder seriesGroup clipRect credits pointer rangeSelector legend resetZoomButton tooltip renderer".split(" ").forEach(function (a) {
                    var c = b[a];
                    c && c.destroy && (b[a] = c.destroy())
                });
                d && (d.innerHTML = "", E(d), n && v(d));
                A(b, function (a, c) {
                    delete b[c]
                })
            }, firstRender: function () {
                var b = this, c = b.options;
                if (!b.isReadyToRender || b.isReadyToRender()) {
                    b.getContainer();
                    b.resetMargins();
                    b.setChartSize();
                    b.propFromSeries();
                    b.getAxes();
                    (a.isArray(c.series) ? c.series : []).forEach(function (a) {
                        b.initSeries(a)
                    });
                    b.linkSeries();
                    g(b, "beforeRender");
                    n && (b.pointer = new n(b, c));
                    b.render();
                    if (!b.renderer.imgCount && b.onload) b.onload();
                    b.temporaryDisplay(!0)
                }
            }, onload: function () {
                [this.callback].concat(this.callbacks).forEach(function (a) {
                    a &&
                    void 0 !== this.index && a.apply(this, [this])
                }, this);
                g(this, "load");
                g(this, "render");
                d(this.index) && this.setReflow(this.options.chart.reflow);
                this.onload = null
            }
        })
    });
    K(G, "parts/ScrollablePlotArea.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.Chart;
        C(I, "afterSetChartSize", function (C) {
            var k = this.options.chart.scrollablePlotArea;
            (k = k && k.minWidth) && !this.renderer.forExport && (this.scrollablePixels = k = Math.max(0, k - this.chartWidth)) && (this.plotWidth += k, this.clipBox.width += k, C.skipAxes || this.axes.forEach(function (e) {
                1 ===
                e.side ? e.getPlotLinePath = function () {
                    var k = this.right, t;
                    this.right = k - e.chart.scrollablePixels;
                    t = a.Axis.prototype.getPlotLinePath.apply(this, arguments);
                    this.right = k;
                    return t
                } : (e.setAxisSize(), e.setAxisTranslation())
            }))
        });
        C(I, "render", function () {
            this.scrollablePixels ? (this.setUpScrolling && this.setUpScrolling(), this.applyFixed()) : this.fixedDiv && this.applyFixed()
        });
        I.prototype.setUpScrolling = function () {
            this.scrollingContainer = a.createElement("div", {className: "highcharts-scrolling"}, {
                    overflowX: "auto",
                    WebkitOverflowScrolling: "touch"
                },
                this.renderTo);
            this.innerContainer = a.createElement("div", {className: "highcharts-inner-container"}, null, this.scrollingContainer);
            this.innerContainer.appendChild(this.container);
            this.setUpScrolling = null
        };
        I.prototype.moveFixedElements = function () {
            var a = this.container, k = this.fixedRenderer;
            [this.inverted ? ".highcharts-xaxis" : ".highcharts-yaxis", this.inverted ? ".highcharts-xaxis-labels" : ".highcharts-yaxis-labels", ".highcharts-contextbutton", ".highcharts-credits", ".highcharts-legend", ".highcharts-reset-zoom",
                ".highcharts-subtitle", ".highcharts-title", ".highcharts-legend-checkbox"].forEach(function (e) {
                [].forEach.call(a.querySelectorAll(e), function (a) {
                    (a.namespaceURI === k.SVG_NS ? k.box : k.box.parentNode).appendChild(a);
                    a.style.pointerEvents = "auto"
                })
            })
        };
        I.prototype.applyFixed = function () {
            var F, k = !this.fixedDiv, e = this.options.chart.scrollablePlotArea;
            k && (this.fixedDiv = a.createElement("div", {className: "highcharts-fixed"}, {
                position: "absolute",
                overflow: "hidden",
                pointerEvents: "none",
                zIndex: 2
            }, null, !0), this.renderTo.insertBefore(this.fixedDiv,
                this.renderTo.firstChild), this.renderTo.style.overflow = "visible", this.fixedRenderer = F = new a.Renderer(this.fixedDiv, 0, 0), this.scrollableMask = F.path().attr({
                fill: a.color(this.options.chart.backgroundColor || "#fff").setOpacity(a.pick(e.opacity, .85)).get(),
                zIndex: -1
            }).addClass("highcharts-scrollable-mask").add(), this.moveFixedElements(), C(this, "afterShowResetZoom", this.moveFixedElements));
            this.fixedRenderer.setSize(this.chartWidth, this.chartHeight);
            F = this.chartWidth + this.scrollablePixels;
            a.stop(this.container);
            this.container.style.width = F + "px";
            this.renderer.boxWrapper.attr({
                width: F,
                height: this.chartHeight,
                viewBox: [0, 0, F, this.chartHeight].join(" ")
            });
            this.chartBackground.attr({width: F});
            k && e.scrollPositionX && (this.scrollingContainer.scrollLeft = this.scrollablePixels * e.scrollPositionX);
            e = this.axisOffset;
            k = this.plotTop - e[0] - 1;
            e = this.plotTop + this.plotHeight + e[2];
            F = this.plotLeft + this.plotWidth - this.scrollablePixels;
            this.scrollableMask.attr({
                d: this.scrollablePixels ? ["M", 0, k, "L", this.plotLeft - 1, k, "L", this.plotLeft -
                1, e, "L", 0, e, "Z", "M", F, k, "L", this.chartWidth, k, "L", this.chartWidth, e, "L", F, e, "Z"] : ["M", 0, 0]
            })
        }
    });
    K(G, "parts/Point.js", [G["parts/Globals.js"]], function (a) {
        var C, I = a.extend, F = a.erase, k = a.fireEvent, e = a.format, q = a.isArray, t = a.isNumber,
            u = a.pick, v = a.uniqueKey, p = a.defined, h = a.removeEvent;
        a.Point = C = function () {
        };
        a.Point.prototype = {
            init: function (a, e, b) {
                this.series = a;
                this.applyOptions(e, b);
                this.id = p(this.id) ? this.id : v();
                this.resolveColor();
                a.chart.pointCount++;
                k(this, "afterInit");
                return this
            }, resolveColor: function () {
                var a =
                    this.series, e;
                e = a.chart.options.chart.colorCount;
                var b = a.chart.styledMode;
                b || this.options.color || (this.color = a.color);
                a.options.colorByPoint ? (b || (e = a.options.colors || a.chart.options.colors, this.color = this.color || e[a.colorCounter], e = e.length), b = a.colorCounter, a.colorCounter++, a.colorCounter === e && (a.colorCounter = 0)) : b = a.colorIndex;
                this.colorIndex = u(this.colorIndex, b)
            }, applyOptions: function (a, e) {
                var b = this.series, d = b.options.pointValKey || b.pointValKey;
                a = C.prototype.optionsToObject.call(this, a);
                I(this,
                    a);
                this.options = this.options ? I(this.options, a) : a;
                a.group && delete this.group;
                a.dataLabels && delete this.dataLabels;
                d && (this.y = this[d]);
                if (this.isNull = u(this.isValid && !this.isValid(), null === this.x || !t(this.y, !0))) this.formatPrefix = "null";
                this.selected && (this.state = "select");
                "name" in this && void 0 === e && b.xAxis && b.xAxis.hasNames && (this.x = b.xAxis.nameToX(this));
                void 0 === this.x && b && (this.x = void 0 === e ? b.autoIncrement(this) : e);
                return this
            }, setNestedProperty: function (d, e, b) {
                b.split(".").reduce(function (b, d,
                                              c, h) {
                    b[d] = h.length - 1 === c ? e : a.isObject(b[d], !0) ? b[d] : {};
                    return b[d]
                }, d);
                return d
            }, optionsToObject: function (d) {
                var e = {}, b = this.series, g = b.options.keys, h = g || b.pointArrayMap || ["y"],
                    c = h.length, k = 0, p = 0;
                if (t(d) || null === d) e[h[0]] = d; else if (q(d)) for (!g && d.length > c && (b = typeof d[0], "string" === b ? e.name = d[0] : "number" === b && (e.x = d[0]), k++); p < c;) g && void 0 === d[k] || (0 < h[p].indexOf(".") ? a.Point.prototype.setNestedProperty(e, d[k], h[p]) : e[h[p]] = d[k]), k++, p++; else "object" === typeof d && (e = d, d.dataLabels && (b._hasPointLabels =
                    !0), d.marker && (b._hasPointMarkers = !0));
                return e
            }, getClassName: function () {
                return "highcharts-point" + (this.selected ? " highcharts-point-select" : "") + (this.negative ? " highcharts-negative" : "") + (this.isNull ? " highcharts-null-point" : "") + (void 0 !== this.colorIndex ? " highcharts-color-" + this.colorIndex : "") + (this.options.className ? " " + this.options.className : "") + (this.zone && this.zone.className ? " " + this.zone.className.replace("highcharts-negative", "") : "")
            }, getZone: function () {
                var a = this.series, e = a.zones, a = a.zoneAxis ||
                    "y", b = 0, g;
                for (g = e[b]; this[a] >= g.value;) g = e[++b];
                this.nonZonedColor || (this.nonZonedColor = this.color);
                this.color = g && g.color && !this.options.color ? g.color : this.nonZonedColor;
                return g
            }, destroy: function () {
                var a = this.series.chart, e = a.hoverPoints, b;
                a.pointCount--;
                e && (this.setState(), F(e, this), e.length || (a.hoverPoints = null));
                if (this === a.hoverPoint) this.onMouseOut();
                if (this.graphic || this.dataLabel || this.dataLabels) h(this), this.destroyElements();
                this.legendItem && a.legend.destroyItem(this);
                for (b in this) this[b] =
                    null
            }, destroyElements: function (a) {
                var d = this, b = [], e, h;
                a = a || {graphic: 1, dataLabel: 1};
                a.graphic && b.push("graphic", "shadowGroup");
                a.dataLabel && b.push("dataLabel", "dataLabelUpper", "connector");
                for (h = b.length; h--;) e = b[h], d[e] && (d[e] = d[e].destroy());
                ["dataLabel", "connector"].forEach(function (b) {
                    var c = b + "s";
                    a[b] && d[c] && (d[c].forEach(function (a) {
                        a.element && a.destroy()
                    }), delete d[c])
                })
            }, getLabelConfig: function () {
                return {
                    x: this.category,
                    y: this.y,
                    color: this.color,
                    colorIndex: this.colorIndex,
                    key: this.name || this.category,
                    series: this.series,
                    point: this,
                    percentage: this.percentage,
                    total: this.total || this.stackTotal
                }
            }, tooltipFormatter: function (a) {
                var d = this.series, b = d.tooltipOptions, g = u(b.valueDecimals, ""), h = b.valuePrefix || "",
                    c = b.valueSuffix || "";
                d.chart.styledMode && (a = d.chart.tooltip.styledModeFormat(a));
                (d.pointArrayMap || ["y"]).forEach(function (b) {
                    b = "{point." + b;
                    if (h || c) a = a.replace(RegExp(b + "}", "g"), h + b + "}" + c);
                    a = a.replace(RegExp(b + "}", "g"), b + ":,." + g + "f}")
                });
                return e(a, {point: this, series: this.series}, d.chart.time)
            }, firePointEvent: function (a,
                                         e, b) {
                var d = this, h = this.series.options;
                (h.point.events[a] || d.options && d.options.events && d.options.events[a]) && this.importEvents();
                "click" === a && h.allowPointSelect && (b = function (a) {
                    d.select && d.select(null, a.ctrlKey || a.metaKey || a.shiftKey)
                });
                k(this, a, e, b)
            }, visible: !0
        }
    });
    K(G, "parts/Series.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.animObject, F = a.arrayMax, k = a.arrayMin, e = a.correctFloat,
            q = a.defaultOptions, t = a.defaultPlotOptions, u = a.defined, v = a.erase, p = a.extend,
            h = a.fireEvent, d = a.isArray, m =
                a.isNumber, b = a.isString, g = a.merge, l = a.objectEach, c = a.pick, w = a.removeEvent,
            z = a.splat, J = a.SVGElement, D = a.syncTimeout, A = a.win;
        a.Series = a.seriesType("line", null, {
                lineWidth: 2,
                allowPointSelect: !1,
                showCheckbox: !1,
                animation: {duration: 1E3},
                events: {},
                marker: {
                    lineWidth: 0,
                    lineColor: "#ffffff",
                    enabledThreshold: 2,
                    radius: 4,
                    states: {
                        normal: {animation: !0},
                        hover: {animation: {duration: 50}, enabled: !0, radiusPlus: 2, lineWidthPlus: 1},
                        select: {fillColor: "#cccccc", lineColor: "#000000", lineWidth: 2}
                    }
                },
                point: {events: {}},
                dataLabels: {
                    align: "center",
                    formatter: function () {
                        return null === this.y ? "" : a.numberFormat(this.y, -1)
                    },
                    padding: 5,
                    style: {fontSize: "11px", fontWeight: "bold", color: "contrast", textOutline: "1px contrast"},
                    verticalAlign: "bottom",
                    x: 0,
                    y: 0
                },
                cropThreshold: 300,
                opacity: 1,
                pointRange: 0,
                softThreshold: !0,
                states: {
                    normal: {animation: !0},
                    hover: {
                        animation: {duration: 50},
                        lineWidthPlus: 1,
                        marker: {},
                        halo: {size: 10, opacity: .25}
                    },
                    select: {animation: {duration: 0}},
                    inactive: {animation: {duration: 50}, opacity: .2}
                },
                stickyTracking: !0,
                turboThreshold: 1E3,
                findNearestPointBy: "x"
            },
            {
                isCartesian: !0,
                pointClass: a.Point,
                sorted: !0,
                requireSorting: !0,
                directTouch: !1,
                axisTypes: ["xAxis", "yAxis"],
                colorCounter: 0,
                parallelArrays: ["x", "y"],
                coll: "series",
                cropShoulder: 1,
                init: function (a, b) {
                    h(this, "init", {options: b});
                    var d = this, e, g = a.series, f;
                    d.chart = a;
                    d.options = b = d.setOptions(b);
                    d.linkedSeries = [];
                    d.bindAxes();
                    p(d, {name: b.name, state: "", visible: !1 !== b.visible, selected: !0 === b.selected});
                    e = b.events;
                    l(e, function (a, b) {
                        d.hcEvents && d.hcEvents[b] && -1 !== d.hcEvents[b].indexOf(a) || C(d, b, a)
                    });
                    if (e && e.click ||
                        b.point && b.point.events && b.point.events.click || b.allowPointSelect) a.runTrackerClick = !0;
                    d.getColor();
                    d.getSymbol();
                    d.parallelArrays.forEach(function (a) {
                        d[a + "Data"] || (d[a + "Data"] = [])
                    });
                    d.points || d.setData(b.data, !1);
                    d.isCartesian && (a.hasCartesianSeries = !0);
                    g.length && (f = g[g.length - 1]);
                    d._i = c(f && f._i, -1) + 1;
                    a.orderSeries(this.insert(g));
                    h(this, "afterInit")
                },
                insert: function (a) {
                    var b = this.options.index, d;
                    if (m(b)) {
                        for (d = a.length; d--;) if (b >= c(a[d].options.index, a[d]._i)) {
                            a.splice(d + 1, 0, this);
                            break
                        }
                        -1 === d &&
                        a.unshift(this);
                        d += 1
                    } else a.push(this);
                    return c(d, a.length - 1)
                },
                bindAxes: function () {
                    var b = this, c = b.options, d = b.chart, e;
                    h(this, "bindAxes", null, function () {
                        (b.axisTypes || []).forEach(function (g) {
                            d[g].forEach(function (a) {
                                e = a.options;
                                if (c[g] === e.index || void 0 !== c[g] && c[g] === e.id || void 0 === c[g] && 0 === e.index) b.insert(a.series), b[g] = a, a.isDirty = !0
                            });
                            b[g] || b.optionalAxis === g || a.error(18, !0, d)
                        })
                    })
                },
                updateParallelArrays: function (a, b) {
                    var c = a.series, d = arguments, e = m(b) ? function (d) {
                        var f = "y" === d && c.toYData ? c.toYData(a) :
                            a[d];
                        c[d + "Data"][b] = f
                    } : function (a) {
                        Array.prototype[b].apply(c[a + "Data"], Array.prototype.slice.call(d, 2))
                    };
                    c.parallelArrays.forEach(e)
                },
                hasData: function () {
                    return this.visible && void 0 !== this.dataMax && void 0 !== this.dataMin || this.visible && this.yData && 0 < this.yData.length
                },
                autoIncrement: function () {
                    var a = this.options, b = this.xIncrement, d, e = a.pointIntervalUnit, g = this.chart.time,
                        b = c(b, a.pointStart, 0);
                    this.pointInterval = d = c(this.pointInterval, a.pointInterval, 1);
                    e && (a = new g.Date(b), "day" === e ? g.set("Date", a, g.get("Date",
                        a) + d) : "month" === e ? g.set("Month", a, g.get("Month", a) + d) : "year" === e && g.set("FullYear", a, g.get("FullYear", a) + d), d = a.getTime() - b);
                    this.xIncrement = b + d;
                    return b
                },
                setOptions: function (a) {
                    var b = this.chart, d = b.options, e = d.plotOptions,
                        n = (b.userOptions || {}).plotOptions || {}, f = e[this.type], l = g(a);
                    a = b.styledMode;
                    h(this, "setOptions", {userOptions: l});
                    this.userOptions = l;
                    b = g(f, e.series, l);
                    this.tooltipOptions = g(q.tooltip, q.plotOptions.series && q.plotOptions.series.tooltip, q.plotOptions[this.type].tooltip, d.tooltip.userOptions,
                        e.series && e.series.tooltip, e[this.type].tooltip, l.tooltip);
                    this.stickyTracking = c(l.stickyTracking, n[this.type] && n[this.type].stickyTracking, n.series && n.series.stickyTracking, this.tooltipOptions.shared && !this.noSharedTooltip ? !0 : b.stickyTracking);
                    null === f.marker && delete b.marker;
                    this.zoneAxis = b.zoneAxis;
                    d = this.zones = (b.zones || []).slice();
                    !b.negativeColor && !b.negativeFillColor || b.zones || (e = {
                        value: b[this.zoneAxis + "Threshold"] || b.threshold || 0,
                        className: "highcharts-negative"
                    }, a || (e.color = b.negativeColor,
                        e.fillColor = b.negativeFillColor), d.push(e));
                    d.length && u(d[d.length - 1].value) && d.push(a ? {} : {
                        color: this.color,
                        fillColor: this.fillColor
                    });
                    h(this, "afterSetOptions", {options: b});
                    return b
                },
                getName: function () {
                    return c(this.options.name, "Series " + (this.index + 1))
                },
                getCyclic: function (a, b, d) {
                    var e, g = this.chart, f = this.userOptions, h = a + "Index", n = a + "Counter",
                        l = d ? d.length : c(g.options.chart[a + "Count"], g[a + "Count"]);
                    b || (e = c(f[h], f["_" + h]), u(e) || (g.series.length || (g[n] = 0), f["_" + h] = e = g[n] % l, g[n] += 1), d && (b = d[e]));
                    void 0 !==
                    e && (this[h] = e);
                    this[a] = b
                },
                getColor: function () {
                    this.chart.styledMode ? this.getCyclic("color") : this.options.colorByPoint ? this.options.color = null : this.getCyclic("color", this.options.color || t[this.type].color, this.chart.options.colors)
                },
                getSymbol: function () {
                    this.getCyclic("symbol", this.options.marker.symbol, this.chart.options.symbols)
                },
                findPointIndex: function (a, b) {
                    var c = a.id;
                    a = a.x;
                    var d = this.points, e, f;
                    c && (f = (c = this.chart.get(c)) && c.index, void 0 !== f && (e = !0));
                    void 0 === f && m(a) && (f = this.xData.indexOf(a, b));
                    -1 !== f && void 0 !== f && this.cropped && (f = f >= this.cropStart ? f - this.cropStart : f);
                    !e && d[f] && d[f].touched && (f = void 0);
                    return f
                },
                drawLegendSymbol: a.LegendSymbolMixin.drawLineMarker,
                updateData: function (b) {
                    var c = this.options, d = this.points, e = [], g, f, h, n = this.requireSorting,
                        l = b.length === d.length, k = !0;
                    this.xIncrement = null;
                    b.forEach(function (b, f) {
                        var r,
                            k = a.defined(b) && this.pointClass.prototype.optionsToObject.call({series: this}, b) || {};
                        r = k.x;
                        if (k.id || m(r)) if (r = this.findPointIndex(k, h), -1 === r || void 0 === r ? e.push(b) :
                            d[r] && b !== c.data[r] ? (d[r].update(b, !1, null, !1), d[r].touched = !0, n && (h = r + 1)) : d[r] && (d[r].touched = !0), !l || f !== r || this.hasDerivedData) g = !0
                    }, this);
                    if (g) for (b = d.length; b--;) (f = d[b]) && !f.touched && f.remove(!1); else l ? b.forEach(function (a, b) {
                        d[b].update && a !== d[b].y && d[b].update(a, !1, null, !1)
                    }) : k = !1;
                    d.forEach(function (a) {
                        a && (a.touched = !1)
                    });
                    if (!k) return !1;
                    e.forEach(function (a) {
                        this.addPoint(a, !1, null, null, !1)
                    }, this);
                    return !0
                },
                setData: function (e, g, h, l) {
                    var n = this, f = n.points, r = f && f.length || 0, k, x = n.options, p =
                            n.chart, B = null, w = n.xAxis, z = x.turboThreshold, E = this.xData, A = this.yData,
                        q = (k = n.pointArrayMap) && k.length, t = x.keys, D = 0, u = 1, v;
                    e = e || [];
                    k = e.length;
                    g = c(g, !0);
                    !1 !== l && k && r && !n.cropped && !n.hasGroupedData && n.visible && !n.isSeriesBoosting && (v = this.updateData(e));
                    if (!v) {
                        n.xIncrement = null;
                        n.colorCounter = 0;
                        this.parallelArrays.forEach(function (a) {
                            n[a + "Data"].length = 0
                        });
                        if (z && k > z) {
                            for (h = 0; null === B && h < k;) B = e[h], h++;
                            if (m(B)) for (h = 0; h < k; h++) E[h] = this.autoIncrement(), A[h] = e[h]; else if (d(B)) if (q) for (h = 0; h < k; h++) B = e[h],
                                E[h] = B[0], A[h] = B.slice(1, q + 1); else for (t && (D = t.indexOf("x"), u = t.indexOf("y"), D = 0 <= D ? D : 0, u = 0 <= u ? u : 1), h = 0; h < k; h++) B = e[h], E[h] = B[D], A[h] = B[u]; else a.error(12, !1, p)
                        } else for (h = 0; h < k; h++) void 0 !== e[h] && (B = {series: n}, n.pointClass.prototype.applyOptions.apply(B, [e[h]]), n.updateParallelArrays(B, h));
                        A && b(A[0]) && a.error(14, !0, p);
                        n.data = [];
                        n.options.data = n.userOptions.data = e;
                        for (h = r; h--;) f[h] && f[h].destroy && f[h].destroy();
                        w && (w.minRange = w.userMinRange);
                        n.isDirty = p.isDirtyBox = !0;
                        n.isDirtyData = !!f;
                        h = !1
                    }
                    "point" ===
                    x.legendType && (this.processData(), this.generatePoints());
                    g && p.redraw(h)
                },
                processData: function (b) {
                    var c = this.xData, d = this.yData, e = c.length, g;
                    g = 0;
                    var f, h, n = this.xAxis, l, m = this.options;
                    l = m.cropThreshold;
                    var k = this.getExtremesFromAll || m.getExtremesFromAll, p = this.isCartesian,
                        m = n && n.val2lin, w = n && n.isLog, z = this.requireSorting, A, q;
                    if (p && !this.isDirty && !n.isDirty && !this.yAxis.isDirty && !b) return !1;
                    n && (b = n.getExtremes(), A = b.min, q = b.max);
                    p && this.sorted && !k && (!l || e > l || this.forceCrop) && (c[e - 1] < A || c[0] > q ? (c = [],
                        d = []) : this.yData && (c[0] < A || c[e - 1] > q) && (g = this.cropData(this.xData, this.yData, A, q), c = g.xData, d = g.yData, g = g.start, f = !0));
                    for (l = c.length || 1; --l;) e = w ? m(c[l]) - m(c[l - 1]) : c[l] - c[l - 1], 0 < e && (void 0 === h || e < h) ? h = e : 0 > e && z && (a.error(15, !1, this.chart), z = !1);
                    this.cropped = f;
                    this.cropStart = g;
                    this.processedXData = c;
                    this.processedYData = d;
                    this.closestPointRange = h
                },
                cropData: function (a, b, d, e, g) {
                    var f = a.length, h = 0, n = f, l;
                    g = c(g, this.cropShoulder);
                    for (l = 0; l < f; l++) if (a[l] >= d) {
                        h = Math.max(0, l - g);
                        break
                    }
                    for (d = l; d < f; d++) if (a[d] >
                        e) {
                        n = d + g;
                        break
                    }
                    return {xData: a.slice(h, n), yData: b.slice(h, n), start: h, end: n}
                },
                generatePoints: function () {
                    var a = this.options, b = a.data, c = this.data, d, e = this.processedXData,
                        f = this.processedYData, g = this.pointClass, l = e.length, m = this.cropStart || 0, k,
                        w = this.hasGroupedData, a = a.keys, A, q = [], t;
                    c || w || (c = [], c.length = b.length, c = this.data = c);
                    a && w && (this.options.keys = !1);
                    for (t = 0; t < l; t++) k = m + t, w ? (A = (new g).init(this, [e[t]].concat(z(f[t]))), A.dataGroup = this.groupMap[t], A.dataGroup.options && (A.options = A.dataGroup.options,
                        p(A, A.dataGroup.options), delete A.dataLabels)) : (A = c[k]) || void 0 === b[k] || (c[k] = A = (new g).init(this, b[k], e[t])), A && (A.index = k, q[t] = A);
                    this.options.keys = a;
                    if (c && (l !== (d = c.length) || w)) for (t = 0; t < d; t++) t !== m || w || (t += l), c[t] && (c[t].destroyElements(), c[t].plotX = void 0);
                    this.data = c;
                    this.points = q;
                    h(this, "afterGeneratePoints")
                },
                getXExtremes: function (a) {
                    return {min: k(a), max: F(a)}
                },
                getExtremes: function (a) {
                    var b = this.yAxis, c = this.processedXData, e, g = [], f = 0;
                    e = this.xAxis.getExtremes();
                    var n = e.min, l = e.max, p, w, A = this.requireSorting ?
                        this.cropShoulder : 0, z, q;
                    a = a || this.stackedYData || this.processedYData || [];
                    e = a.length;
                    for (q = 0; q < e; q++) if (w = c[q], z = a[q], p = (m(z, !0) || d(z)) && (!b.positiveValuesOnly || z.length || 0 < z), w = this.getExtremesFromAll || this.options.getExtremesFromAll || this.cropped || (c[q + A] || w) >= n && (c[q - A] || w) <= l, p && w) if (p = z.length) for (; p--;) "number" === typeof z[p] && (g[f++] = z[p]); else g[f++] = z;
                    this.dataMin = k(g);
                    this.dataMax = F(g);
                    h(this, "afterGetExtremes")
                },
                translate: function () {
                    this.processedXData || this.processData();
                    this.generatePoints();
                    var a = this.options, b = a.stacking, g = this.xAxis, l = g.categories, k = this.yAxis,
                        f = this.points, r = f.length, p = !!this.modifyValue, w,
                        A = this.pointPlacementToXValue(), z = m(A), q = a.threshold,
                        t = a.startFromThreshold ? q : 0, D, v, J, C, F = this.zoneAxis || "y",
                        I = Number.MAX_VALUE;
                    for (w = 0; w < r; w++) {
                        var G = f[w], K = G.x;
                        v = G.y;
                        var V = G.low,
                            Q = b && k.stacks[(this.negStacks && v < (t ? 0 : q) ? "-" : "") + this.stackKey],
                            W, X;
                        k.positiveValuesOnly && null !== v && 0 >= v && (G.isNull = !0);
                        G.plotX = D = e(Math.min(Math.max(-1E5, g.translate(K, 0, 0, 0, 1, A, "flags" === this.type)),
                            1E5));
                        b && this.visible && !G.isNull && Q && Q[K] && (C = this.getStackIndicator(C, K, this.index), W = Q[K], X = W.points[C.key]);
                        d(X) && (V = X[0], v = X[1], V === t && C.key === Q[K].base && (V = c(m(q) && q, k.min)), k.positiveValuesOnly && 0 >= V && (V = null), G.total = G.stackTotal = W.total, G.percentage = W.total && G.y / W.total * 100, G.stackY = v, W.setOffset(this.pointXOffset || 0, this.barW || 0));
                        G.yBottom = u(V) ? Math.min(Math.max(-1E5, k.translate(V, 0, 1, 0, 1)), 1E5) : null;
                        p && (v = this.modifyValue(v, G));
                        G.plotY = v = "number" === typeof v && Infinity !== v ? Math.min(Math.max(-1E5,
                            k.translate(v, 0, 1, 0, 1)), 1E5) : void 0;
                        G.isInside = void 0 !== v && 0 <= v && v <= k.len && 0 <= D && D <= g.len;
                        G.clientX = z ? e(g.translate(K, 0, 0, 0, 1, A)) : D;
                        G.negative = G[F] < (a[F + "Threshold"] || q || 0);
                        G.category = l && void 0 !== l[G.x] ? l[G.x] : G.x;
                        G.isNull || (void 0 !== J && (I = Math.min(I, Math.abs(D - J))), J = D);
                        G.zone = this.zones.length && G.getZone()
                    }
                    this.closestPointRangePx = I;
                    h(this, "afterTranslate")
                },
                getValidPoints: function (a, b, c) {
                    var d = this.chart;
                    return (a || this.points || []).filter(function (a) {
                        return b && !d.isInsidePlot(a.plotX, a.plotY, d.inverted) ?
                            !1 : c || !a.isNull
                    })
                },
                setClip: function (a) {
                    var b = this.chart, c = this.options, d = b.renderer, e = b.inverted, f = this.clipBox,
                        g = f || b.clipBox,
                        h = this.sharedClipKey || ["_sharedClip", a && a.duration, a && a.easing, g.height, c.xAxis, c.yAxis].join(),
                        n = b[h], l = b[h + "m"];
                    n || (a && (g.width = 0, e && (g.x = b.plotSizeX), b[h + "m"] = l = d.clipRect(e ? b.plotSizeX + 99 : -99, e ? -b.plotLeft : -b.plotTop, 99, e ? b.chartWidth : b.chartHeight)), b[h] = n = d.clipRect(g), n.count = {length: 0});
                    a && !n.count[this.index] && (n.count[this.index] = !0, n.count.length += 1);
                    !1 !== c.clip &&
                    (this.group.clip(a || f ? n : b.clipRect), this.markerGroup.clip(l), this.sharedClipKey = h);
                    a || (n.count[this.index] && (delete n.count[this.index], --n.count.length), 0 === n.count.length && h && b[h] && (f || (b[h] = b[h].destroy()), b[h + "m"] && (b[h + "m"] = b[h + "m"].destroy())))
                },
                animate: function (a) {
                    var b = this.chart, c = I(this.options.animation), d;
                    a ? this.setClip(c) : (d = this.sharedClipKey, (a = b[d]) && a.animate({
                        width: b.plotSizeX,
                        x: 0
                    }, c), b[d + "m"] && b[d + "m"].animate({
                        width: b.plotSizeX + 99,
                        x: b.inverted ? 0 : -99
                    }, c), this.animate = null)
                },
                afterAnimate: function () {
                    this.setClip();
                    h(this, "afterAnimate");
                    this.finishedAnimating = !0
                },
                drawPoints: function () {
                    var a = this.points, b = this.chart, d, e, g, f, h, l = this.options.marker, m, k, p,
                        w = this[this.specialGroup] || this.markerGroup;
                    d = this.xAxis;
                    var A,
                        z = c(l.enabled, !d || d.isRadial ? !0 : null, this.closestPointRangePx >= l.enabledThreshold * l.radius);
                    if (!1 !== l.enabled || this._hasPointMarkers) for (d = 0; d < a.length; d++) if (e = a[d], h = (f = e.graphic) ? "animate" : "attr", m = e.marker || {}, k = !!e.marker, g = z && void 0 === m.enabled || m.enabled, p = !1 !== e.isInside, g && !e.isNull) {
                        g = c(m.symbol,
                            this.symbol);
                        A = this.markerAttribs(e, e.selected && "select");
                        f ? f[p ? "show" : "hide"](!0).animate(A) : p && (0 < A.width || e.hasImage) && (e.graphic = f = b.renderer.symbol(g, A.x, A.y, A.width, A.height, k ? m : l).add(w));
                        if (f && !b.styledMode) f[h](this.pointAttribs(e, e.selected && "select"));
                        f && f.addClass(e.getClassName(), !0)
                    } else f && (e.graphic = f.destroy())
                },
                markerAttribs: function (a, b) {
                    var d = this.options.marker, e = a.marker || {}, g = e.symbol || d.symbol,
                        f = c(e.radius, d.radius);
                    b && (d = d.states[b], b = e.states && e.states[b], f = c(b && b.radius,
                        d && d.radius, f + (d && d.radiusPlus || 0)));
                    a.hasImage = g && 0 === g.indexOf("url");
                    a.hasImage && (f = 0);
                    a = {x: Math.floor(a.plotX) - f, y: a.plotY - f};
                    f && (a.width = a.height = 2 * f);
                    return a
                },
                pointAttribs: function (a, b) {
                    var d = this.options.marker, e = a && a.options, g = e && e.marker || {}, f = this.color,
                        h = e && e.color, n = a && a.color, e = c(g.lineWidth, d.lineWidth),
                        l = a && a.zone && a.zone.color;
                    a = 1;
                    f = h || l || n || f;
                    h = g.fillColor || d.fillColor || f;
                    f = g.lineColor || d.lineColor || f;
                    b && (d = d.states[b], b = g.states && g.states[b] || {}, e = c(b.lineWidth, d.lineWidth, e + c(b.lineWidthPlus,
                        d.lineWidthPlus, 0)), h = b.fillColor || d.fillColor || h, f = b.lineColor || d.lineColor || f, a = c(b.opacity, d.opacity, a));
                    return {stroke: f, "stroke-width": e, fill: h, opacity: a}
                },
                destroy: function (b) {
                    var c = this, d = c.chart, e = /AppleWebKit\/533/.test(A.navigator.userAgent), g, f,
                        n = c.data || [], m, k;
                    h(c, "destroy");
                    b || w(c);
                    (c.axisTypes || []).forEach(function (a) {
                        (k = c[a]) && k.series && (v(k.series, c), k.isDirty = k.forceRedraw = !0)
                    });
                    c.legendItem && c.chart.legend.destroyItem(c);
                    for (f = n.length; f--;) (m = n[f]) && m.destroy && m.destroy();
                    c.points =
                        null;
                    a.clearTimeout(c.animationTimeout);
                    l(c, function (a, b) {
                        a instanceof J && !a.survive && (g = e && "group" === b ? "hide" : "destroy", a[g]())
                    });
                    d.hoverSeries === c && (d.hoverSeries = null);
                    v(d.series, c);
                    d.orderSeries();
                    l(c, function (a, d) {
                        b && "hcEvents" === d || delete c[d]
                    })
                },
                getGraphPath: function (a, b, c) {
                    var d = this, e = d.options, f = e.step, g, h = [], n = [], l;
                    a = a || d.points;
                    (g = a.reversed) && a.reverse();
                    (f = {right: 1, center: 2}[f] || f && 3) && g && (f = 4 - f);
                    !e.connectNulls || b || c || (a = this.getValidPoints(a));
                    a.forEach(function (g, m) {
                        var k = g.plotX,
                            r = g.plotY, p = a[m - 1];
                        (g.leftCliff || p && p.rightCliff) && !c && (l = !0);
                        g.isNull && !u(b) && 0 < m ? l = !e.connectNulls : g.isNull && !b ? l = !0 : (0 === m || l ? m = ["M", g.plotX, g.plotY] : d.getPointSpline ? m = d.getPointSpline(a, g, m) : f ? (m = 1 === f ? ["L", p.plotX, r] : 2 === f ? ["L", (p.plotX + k) / 2, p.plotY, "L", (p.plotX + k) / 2, r] : ["L", k, p.plotY], m.push("L", k, r)) : m = ["L", k, r], n.push(g.x), f && (n.push(g.x), 2 === f && n.push(g.x)), h.push.apply(h, m), l = !1)
                    });
                    h.xMap = n;
                    return d.graphPath = h
                },
                drawGraph: function () {
                    var a = this, b = this.options, c = (this.gappedPath || this.getGraphPath).call(this),
                        d = this.chart.styledMode, e = [["graph", "highcharts-graph"]];
                    d || e[0].push(b.lineColor || this.color || "#cccccc", b.dashStyle);
                    e = a.getZonesGraphs(e);
                    e.forEach(function (f, e) {
                        var g = f[0], h = a[g], n = h ? "animate" : "attr";
                        h ? (h.endX = a.preventGraphAnimation ? null : c.xMap, h.animate({d: c})) : c.length && (a[g] = h = a.chart.renderer.path(c).addClass(f[1]).attr({zIndex: 1}).add(a.group));
                        h && !d && (g = {
                            stroke: f[2],
                            "stroke-width": b.lineWidth,
                            fill: a.fillGraph && a.color || "none"
                        }, f[3] ? g.dashstyle = f[3] : "square" !== b.linecap && (g["stroke-linecap"] =
                            g["stroke-linejoin"] = "round"), h[n](g).shadow(2 > e && b.shadow));
                        h && (h.startX = c.xMap, h.isArea = c.isArea)
                    })
                },
                getZonesGraphs: function (a) {
                    this.zones.forEach(function (b, c) {
                        c = ["zone-graph-" + c, "highcharts-graph highcharts-zone-graph-" + c + " " + (b.className || "")];
                        this.chart.styledMode || c.push(b.color || this.color, b.dashStyle || this.options.dashStyle);
                        a.push(c)
                    }, this);
                    return a
                },
                applyZones: function () {
                    var a = this, b = this.chart, d = b.renderer, e = this.zones, g, f, h = this.clips || [], l,
                        m = this.graph, k = this.area, p = Math.max(b.chartWidth,
                            b.chartHeight), w = this[(this.zoneAxis || "y") + "Axis"], A, z, q = b.inverted, t, D,
                        u, v, J = !1;
                    e.length && (m || k) && w && void 0 !== w.min && (z = w.reversed, t = w.horiz, m && !this.showLine && m.hide(), k && k.hide(), A = w.getExtremes(), e.forEach(function (e, n) {
                        g = z ? t ? b.plotWidth : 0 : t ? 0 : w.toPixels(A.min) || 0;
                        g = Math.min(Math.max(c(f, g), 0), p);
                        f = Math.min(Math.max(Math.round(w.toPixels(c(e.value, A.max), !0) || 0), 0), p);
                        J && (g = f = w.toPixels(A.max));
                        D = Math.abs(g - f);
                        u = Math.min(g, f);
                        v = Math.max(g, f);
                        w.isXAxis ? (l = {x: q ? v : u, y: 0, width: D, height: p}, t || (l.x =
                            b.plotHeight - l.x)) : (l = {
                            x: 0,
                            y: q ? v : u,
                            width: p,
                            height: D
                        }, t && (l.y = b.plotWidth - l.y));
                        q && d.isVML && (l = w.isXAxis ? {
                            x: 0,
                            y: z ? u : v,
                            height: l.width,
                            width: b.chartWidth
                        } : {
                            x: l.y - b.plotLeft - b.spacingBox.x,
                            y: 0,
                            width: l.height,
                            height: b.chartHeight
                        });
                        h[n] ? h[n].animate(l) : (h[n] = d.clipRect(l), m && a["zone-graph-" + n].clip(h[n]), k && a["zone-area-" + n].clip(h[n]));
                        J = e.value > A.max;
                        a.resetZones && 0 === f && (f = void 0)
                    }), this.clips = h)
                },
                invertGroups: function (a) {
                    function b() {
                        ["group", "markerGroup"].forEach(function (b) {
                            c[b] && (d.renderer.isVML &&
                            c[b].attr({
                                width: c.yAxis.len,
                                height: c.xAxis.len
                            }), c[b].width = c.yAxis.len, c[b].height = c.xAxis.len, c[b].invert(a))
                        })
                    }

                    var c = this, d = c.chart, e;
                    c.xAxis && (e = C(d, "resize", b), C(c, "destroy", e), b(a), c.invertGroups = b)
                },
                plotGroup: function (a, b, c, d, e) {
                    var f = this[a], g = !f;
                    g && (this[a] = f = this.chart.renderer.g().attr({zIndex: d || .1}).add(e));
                    f.addClass("highcharts-" + b + " highcharts-series-" + this.index + " highcharts-" + this.type + "-series " + (u(this.colorIndex) ? "highcharts-color-" + this.colorIndex + " " : "") + (this.options.className ||
                        "") + (f.hasClass("highcharts-tracker") ? " highcharts-tracker" : ""), !0);
                    f.attr({visibility: c})[g ? "attr" : "animate"](this.getPlotBox());
                    return f
                },
                getPlotBox: function () {
                    var a = this.chart, b = this.xAxis, c = this.yAxis;
                    a.inverted && (b = c, c = this.xAxis);
                    return {
                        translateX: b ? b.left : a.plotLeft,
                        translateY: c ? c.top : a.plotTop,
                        scaleX: 1,
                        scaleY: 1
                    }
                },
                render: function () {
                    var a = this, b = a.chart, c, d = a.options,
                        e = !!a.animate && b.renderer.isSVG && I(d.animation).duration,
                        f = a.visible ? "inherit" : "hidden", g = d.zIndex, l = a.hasRendered,
                        m = b.seriesGroup,
                        k = b.inverted;
                    h(this, "render");
                    c = a.plotGroup("group", "series", f, g, m);
                    a.markerGroup = a.plotGroup("markerGroup", "markers", f, g, m);
                    e && a.animate(!0);
                    c.inverted = a.isCartesian || a.invertable ? k : !1;
                    a.drawGraph && (a.drawGraph(), a.applyZones());
                    a.visible && a.drawPoints();
                    a.drawDataLabels && a.drawDataLabels();
                    a.redrawPoints && a.redrawPoints();
                    a.drawTracker && !1 !== a.options.enableMouseTracking && a.drawTracker();
                    a.invertGroups(k);
                    !1 === d.clip || a.sharedClipKey || l || c.clip(b.clipRect);
                    e && a.animate();
                    l || (a.animationTimeout =
                        D(function () {
                            a.afterAnimate()
                        }, e));
                    a.isDirty = !1;
                    a.hasRendered = !0;
                    h(a, "afterRender")
                },
                redraw: function () {
                    var a = this.chart, b = this.isDirty || this.isDirtyData, d = this.group, e = this.xAxis,
                        g = this.yAxis;
                    d && (a.inverted && d.attr({
                        width: a.plotWidth,
                        height: a.plotHeight
                    }), d.animate({
                        translateX: c(e && e.left, a.plotLeft),
                        translateY: c(g && g.top, a.plotTop)
                    }));
                    this.translate();
                    this.render();
                    b && delete this.kdTree
                },
                kdAxisArray: ["clientX", "plotY"],
                searchPoint: function (a, b) {
                    var c = this.xAxis, d = this.yAxis, e = this.chart.inverted;
                    return this.searchKDTree({
                        clientX: e ? c.len - a.chartY + c.pos : a.chartX - c.pos,
                        plotY: e ? d.len - a.chartX + d.pos : a.chartY - d.pos
                    }, b, a)
                },
                buildKDTree: function (a) {
                    function b(a, d, e) {
                        var f, g;
                        if (g = a && a.length) return f = c.kdAxisArray[d % e], a.sort(function (a, b) {
                            return a[f] - b[f]
                        }), g = Math.floor(g / 2), {
                            point: a[g],
                            left: b(a.slice(0, g), d + 1, e),
                            right: b(a.slice(g + 1), d + 1, e)
                        }
                    }

                    this.buildingKdTree = !0;
                    var c = this, d = -1 < c.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                    delete c.kdTree;
                    D(function () {
                        c.kdTree = b(c.getValidPoints(null, !c.directTouch),
                            d, d);
                        c.buildingKdTree = !1
                    }, c.options.kdNow || a && "touchstart" === a.type ? 0 : 1)
                },
                searchKDTree: function (a, b, c) {
                    function d(a, b, c, l) {
                        var n = b.point, m = e.kdAxisArray[c % l], k, r, p = n;
                        r = u(a[f]) && u(n[f]) ? Math.pow(a[f] - n[f], 2) : null;
                        k = u(a[g]) && u(n[g]) ? Math.pow(a[g] - n[g], 2) : null;
                        k = (r || 0) + (k || 0);
                        n.dist = u(k) ? Math.sqrt(k) : Number.MAX_VALUE;
                        n.distX = u(r) ? Math.sqrt(r) : Number.MAX_VALUE;
                        m = a[m] - n[m];
                        k = 0 > m ? "left" : "right";
                        r = 0 > m ? "right" : "left";
                        b[k] && (k = d(a, b[k], c + 1, l), p = k[h] < p[h] ? k : n);
                        b[r] && Math.sqrt(m * m) < p[h] && (a = d(a, b[r], c + 1, l),
                            p = a[h] < p[h] ? a : p);
                        return p
                    }

                    var e = this, f = this.kdAxisArray[0], g = this.kdAxisArray[1], h = b ? "distX" : "dist";
                    b = -1 < e.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                    this.kdTree || this.buildingKdTree || this.buildKDTree(c);
                    if (this.kdTree) return d(a, this.kdTree, b, b)
                },
                pointPlacementToXValue: function () {
                    var a = this.options.pointPlacement;
                    "between" === a && (a = .5);
                    m(a) && (a *= c(this.options.pointRange || this.xAxis.pointRange));
                    return a
                }
            })
    });
    K(G, "parts/Stacking.js", [G["parts/Globals.js"]], function (a) {
        var C = a.Axis, I = a.Chart, F = a.correctFloat,
            k = a.defined, e = a.destroyObjectProperties, q = a.format, t = a.objectEach, u = a.pick,
            v = a.Series;
        a.StackItem = function (a, e, d, m, b) {
            var g = a.chart.inverted;
            this.axis = a;
            this.isNegative = d;
            this.options = e;
            this.x = m;
            this.total = null;
            this.points = {};
            this.stack = b;
            this.rightCliff = this.leftCliff = 0;
            this.alignOptions = {
                align: e.align || (g ? d ? "left" : "right" : "center"),
                verticalAlign: e.verticalAlign || (g ? "middle" : d ? "bottom" : "top"),
                y: u(e.y, g ? 4 : d ? 14 : -6),
                x: u(e.x, g ? d ? -6 : 6 : 0)
            };
            this.textAlign = e.textAlign || (g ? d ? "right" : "left" : "center")
        };
        a.StackItem.prototype =
            {
                destroy: function () {
                    e(this, this.axis)
                }, render: function (a) {
                    var e = this.axis.chart, d = this.options, m = d.format,
                        m = m ? q(m, this, e.time) : d.formatter.call(this);
                    this.label ? this.label.attr({
                        text: m,
                        visibility: "hidden"
                    }) : this.label = e.renderer.text(m, null, null, d.useHTML).css(d.style).attr({
                        align: this.textAlign,
                        rotation: d.rotation,
                        visibility: "hidden"
                    }).add(a);
                    this.label.labelrank = e.plotHeight
                }, setOffset: function (a, e) {
                    var d = this.axis, h = d.chart,
                        b = d.translate(d.usePercentage ? 100 : this.total, 0, 0, 0, 1), g = d.translate(0),
                        g = k(b) && Math.abs(b - g);
                    a = h.xAxis[0].translate(this.x) + a;
                    d = k(b) && this.getStackBox(h, this, a, b, e, g, d);
                    (e = this.label) && d && (e.align(this.alignOptions, null, d), d = e.alignAttr, e[!1 === this.options.crop || h.isInsidePlot(d.x, d.y) ? "show" : "hide"](!0))
                }, getStackBox: function (a, e, d, m, b, g, l) {
                    var c = e.axis.reversed, h = a.inverted;
                    a = l.height + l.pos - (h ? a.plotLeft : a.plotTop);
                    e = e.isNegative && !c || !e.isNegative && c;
                    return {
                        x: h ? e ? m : m - g : d,
                        y: h ? a - d - b : e ? a - m - g : a - m,
                        width: h ? g : b,
                        height: h ? b : g
                    }
                }
            };
        I.prototype.getStacks = function () {
            var a = this;
            a.yAxis.forEach(function (a) {
                a.stacks && a.hasVisibleSeries && (a.oldStacks = a.stacks)
            });
            a.series.forEach(function (e) {
                !e.options.stacking || !0 !== e.visible && !1 !== a.options.chart.ignoreHiddenSeries || (e.stackKey = e.type + u(e.options.stack, ""))
            })
        };
        C.prototype.buildStacks = function () {
            var a = this.series, e = u(this.options.reversedStacks, !0), d = a.length, m;
            if (!this.isXAxis) {
                this.usePercentage = !1;
                for (m = d; m--;) a[e ? m : d - m - 1].setStackedPoints();
                for (m = 0; m < d; m++) a[m].modifyStacks()
            }
        };
        C.prototype.renderStackTotals = function () {
            var a =
                this.chart, e = a.renderer, d = this.stacks, m = this.stackTotalGroup;
            m || (this.stackTotalGroup = m = e.g("stack-labels").attr({
                visibility: "visible",
                zIndex: 6
            }).add());
            m.translate(a.plotLeft, a.plotTop);
            t(d, function (a) {
                t(a, function (a) {
                    a.render(m)
                })
            })
        };
        C.prototype.resetStacks = function () {
            var a = this, e = a.stacks;
            a.isXAxis || t(e, function (d) {
                t(d, function (e, b) {
                    e.touched < a.stacksTouched ? (e.destroy(), delete d[b]) : (e.total = null, e.cumulative = null)
                })
            })
        };
        C.prototype.cleanStacks = function () {
            var a;
            this.isXAxis || (this.oldStacks && (a =
                this.stacks = this.oldStacks), t(a, function (a) {
                t(a, function (a) {
                    a.cumulative = a.total
                })
            }))
        };
        v.prototype.setStackedPoints = function () {
            if (this.options.stacking && (!0 === this.visible || !1 === this.chart.options.chart.ignoreHiddenSeries)) {
                var e = this.processedXData, h = this.processedYData, d = [], m = h.length, b = this.options,
                    g = b.threshold, l = u(b.startFromThreshold && g, 0), c = b.stack, b = b.stacking,
                    w = this.stackKey, z = "-" + w, q = this.negStacks, t = this.yAxis, A = t.stacks,
                    n = t.oldStacks, x, B, E, v, f, r, C;
                t.stacksTouched += 1;
                for (f = 0; f < m; f++) r =
                    e[f], C = h[f], x = this.getStackIndicator(x, r, this.index), v = x.key, E = (B = q && C < (l ? 0 : g)) ? z : w, A[E] || (A[E] = {}), A[E][r] || (n[E] && n[E][r] ? (A[E][r] = n[E][r], A[E][r].total = null) : A[E][r] = new a.StackItem(t, t.options.stackLabels, B, r, c)), E = A[E][r], null !== C ? (E.points[v] = E.points[this.index] = [u(E.cumulative, l)], k(E.cumulative) || (E.base = v), E.touched = t.stacksTouched, 0 < x.index && !1 === this.singleStacks && (E.points[v][0] = E.points[this.index + "," + r + ",0"][0])) : E.points[v] = E.points[this.index] = null, "percent" === b ? (B = B ? w : z, q && A[B] &&
                A[B][r] ? (B = A[B][r], E.total = B.total = Math.max(B.total, E.total) + Math.abs(C) || 0) : E.total = F(E.total + (Math.abs(C) || 0))) : E.total = F(E.total + (C || 0)), E.cumulative = u(E.cumulative, l) + (C || 0), null !== C && (E.points[v].push(E.cumulative), d[f] = E.cumulative);
                "percent" === b && (t.usePercentage = !0);
                this.stackedYData = d;
                t.oldStacks = {}
            }
        };
        v.prototype.modifyStacks = function () {
            var a = this, e = a.stackKey, d = a.yAxis.stacks, m = a.processedXData, b, g = a.options.stacking;
            a[g + "Stacker"] && [e, "-" + e].forEach(function (e) {
                for (var c = m.length, h, l; c--;) if (h =
                    m[c], b = a.getStackIndicator(b, h, a.index, e), l = (h = d[e] && d[e][h]) && h.points[b.key]) a[g + "Stacker"](l, h, c)
            })
        };
        v.prototype.percentStacker = function (a, e, d) {
            e = e.total ? 100 / e.total : 0;
            a[0] = F(a[0] * e);
            a[1] = F(a[1] * e);
            this.stackedYData[d] = a[1]
        };
        v.prototype.getStackIndicator = function (a, e, d, m) {
            !k(a) || a.x !== e || m && a.key !== m ? a = {x: e, index: 0, key: m} : a.index++;
            a.key = [d, e, a.index].join();
            return a
        }
    });
    K(G, "parts/Dynamics.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.animate, F = a.Axis, k = a.Chart, e = a.createElement,
            q = a.css, t = a.defined, u = a.erase, v = a.extend, p = a.fireEvent, h = a.isNumber,
            d = a.isObject, m = a.isArray, b = a.merge, g = a.objectEach, l = a.pick, c = a.Point, w = a.Series,
            z = a.seriesTypes, J = a.setAnimation, D = a.splat;
        a.cleanRecursively = function (b, c) {
            var e = {};
            g(b, function (g, h) {
                if (d(b[h], !0) && c[h]) g = a.cleanRecursively(b[h], c[h]), Object.keys(g).length && (e[h] = g); else if (d(b[h]) || b[h] !== c[h]) e[h] = b[h]
            });
            return e
        };
        v(k.prototype, {
            addSeries: function (a, b, c) {
                var d, e = this;
                a && (b = l(b, !0), p(e, "addSeries", {options: a}, function () {
                    d = e.initSeries(a);
                    e.isDirtyLegend = !0;
                    e.linkSeries();
                    p(e, "afterAddSeries", {series: d});
                    b && e.redraw(c)
                }));
                return d
            },
            addAxis: function (a, c, d, e) {
                var g = c ? "xAxis" : "yAxis", h = this.options;
                a = b(a, {index: this[g].length, isX: c});
                c = new F(this, a);
                h[g] = D(h[g] || {});
                h[g].push(a);
                l(d, !0) && this.redraw(e);
                return c
            },
            showLoading: function (a) {
                var b = this, c = b.options, d = b.loadingDiv, g = c.loading, h = function () {
                    d && q(d, {
                        left: b.plotLeft + "px",
                        top: b.plotTop + "px",
                        width: b.plotWidth + "px",
                        height: b.plotHeight + "px"
                    })
                };
                d || (b.loadingDiv = d = e("div", {className: "highcharts-loading highcharts-loading-hidden"},
                    null, b.container), b.loadingSpan = e("span", {className: "highcharts-loading-inner"}, null, d), C(b, "redraw", h));
                d.className = "highcharts-loading";
                b.loadingSpan.innerHTML = a || c.lang.loading;
                b.styledMode || (q(d, v(g.style, {zIndex: 10})), q(b.loadingSpan, g.labelStyle), b.loadingShown || (q(d, {
                    opacity: 0,
                    display: ""
                }), I(d, {opacity: g.style.opacity || .5}, {duration: g.showDuration || 0})));
                b.loadingShown = !0;
                h()
            },
            hideLoading: function () {
                var a = this.options, b = this.loadingDiv;
                b && (b.className = "highcharts-loading highcharts-loading-hidden",
                this.styledMode || I(b, {opacity: 0}, {
                    duration: a.loading.hideDuration || 100,
                    complete: function () {
                        q(b, {display: "none"})
                    }
                }));
                this.loadingShown = !1
            },
            propsRequireDirtyBox: "backgroundColor borderColor borderWidth borderRadius plotBackgroundColor plotBackgroundImage plotBorderColor plotBorderWidth plotShadow shadow".split(" "),
            propsRequireReflow: "margin marginTop marginRight marginBottom marginLeft spacing spacingTop spacingRight spacingBottom spacingLeft".split(" "),
            propsRequireUpdateSeries: "chart.inverted chart.polar chart.ignoreHiddenSeries chart.type colors plotOptions time tooltip".split(" "),
            collectionsWithUpdate: "xAxis yAxis zAxis series colorAxis pane".split(" "),
            update: function (c, d, e, m) {
                var k = this, n = {credits: "addCredits", title: "setTitle", subtitle: "setSubtitle"}, f, r, w,
                    z, q = [];
                p(k, "update", {options: c});
                c.isResponsiveOptions || k.setResponsive(!1, !0);
                c = a.cleanRecursively(c, k.options);
                if (f = c.chart) {
                    b(!0, k.options.chart, f);
                    "className" in f && k.setClassName(f.className);
                    "reflow" in f && k.setReflow(f.reflow);
                    if ("inverted" in f || "polar" in f || "type" in f) k.propFromSeries(), r = !0;
                    "alignTicks" in f && (r =
                        !0);
                    g(f, function (a, b) {
                        -1 !== k.propsRequireUpdateSeries.indexOf("chart." + b) && (w = !0);
                        -1 !== k.propsRequireDirtyBox.indexOf(b) && (k.isDirtyBox = !0);
                        -1 !== k.propsRequireReflow.indexOf(b) && (z = !0)
                    });
                    !k.styledMode && "style" in f && k.renderer.setStyle(f.style)
                }
                !k.styledMode && c.colors && (this.options.colors = c.colors);
                c.plotOptions && b(!0, this.options.plotOptions, c.plotOptions);
                g(c, function (a, b) {
                    if (k[b] && "function" === typeof k[b].update) k[b].update(a, !1); else if ("function" === typeof k[n[b]]) k[n[b]](a);
                    "chart" !== b && -1 !==
                    k.propsRequireUpdateSeries.indexOf(b) && (w = !0)
                });
                this.collectionsWithUpdate.forEach(function (a) {
                    var b;
                    c[a] && ("series" === a && (b = [], k[a].forEach(function (a, c) {
                        a.options.isInternal || b.push(l(a.options.index, c))
                    })), D(c[a]).forEach(function (c, d) {
                        (d = t(c.id) && k.get(c.id) || k[a][b ? b[d] : d]) && d.coll === a && (d.update(c, !1), e && (d.touched = !0));
                        if (!d && e) if ("series" === a) k.addSeries(c, !1).touched = !0; else if ("xAxis" === a || "yAxis" === a) k.addAxis(c, "xAxis" === a, !1).touched = !0
                    }), e && k[a].forEach(function (a) {
                        a.touched || a.options.isInternal ?
                            delete a.touched : q.push(a)
                    }))
                });
                q.forEach(function (a) {
                    a.remove && a.remove(!1)
                });
                r && k.axes.forEach(function (a) {
                    a.update({}, !1)
                });
                w && k.series.forEach(function (a) {
                    a.update({}, !1)
                });
                c.loading && b(!0, k.options.loading, c.loading);
                r = f && f.width;
                f = f && f.height;
                a.isString(f) && (f = a.relativeLength(f, r || k.chartWidth));
                z || h(r) && r !== k.chartWidth || h(f) && f !== k.chartHeight ? k.setSize(r, f, m) : l(d, !0) && k.redraw(m);
                p(k, "afterUpdate", {options: c, redraw: d, animation: m})
            },
            setSubtitle: function (a) {
                this.setTitle(void 0, a)
            }
        });
        v(c.prototype,
            {
                update: function (a, b, c, e) {
                    function g() {
                        h.applyOptions(a);
                        null === h.y && k && (h.graphic = k.destroy());
                        d(a, !0) && (k && k.element && a && a.marker && void 0 !== a.marker.symbol && (h.graphic = k.destroy()), a && a.dataLabels && h.dataLabel && (h.dataLabel = h.dataLabel.destroy()), h.connector && (h.connector = h.connector.destroy()));
                        m = h.index;
                        f.updateParallelArrays(h, m);
                        p.data[m] = d(p.data[m], !0) || d(a, !0) ? h.options : l(a, p.data[m]);
                        f.isDirty = f.isDirtyData = !0;
                        !f.fixedBox && f.hasCartesianSeries && (n.isDirtyBox = !0);
                        "point" === p.legendType &&
                        (n.isDirtyLegend = !0);
                        b && n.redraw(c)
                    }

                    var h = this, f = h.series, k = h.graphic, m, n = f.chart, p = f.options;
                    b = l(b, !0);
                    !1 === e ? g() : h.firePointEvent("update", {options: a}, g)
                }, remove: function (a, b) {
                    this.series.removePoint(this.series.data.indexOf(this), a, b)
                }
            });
        v(w.prototype, {
            addPoint: function (a, b, c, d, e) {
                var g = this.options, f = this.data, h = this.chart, k = this.xAxis,
                    k = k && k.hasNames && k.names, m = g.data, n, w, z = this.xData, q, x;
                b = l(b, !0);
                n = {series: this};
                this.pointClass.prototype.applyOptions.apply(n, [a]);
                x = n.x;
                q = z.length;
                if (this.requireSorting &&
                    x < z[q - 1]) for (w = !0; q && z[q - 1] > x;) q--;
                this.updateParallelArrays(n, "splice", q, 0, 0);
                this.updateParallelArrays(n, q);
                k && n.name && (k[x] = n.name);
                m.splice(q, 0, a);
                w && (this.data.splice(q, 0, null), this.processData());
                "point" === g.legendType && this.generatePoints();
                c && (f[0] && f[0].remove ? f[0].remove(!1) : (f.shift(), this.updateParallelArrays(n, "shift"), m.shift()));
                !1 !== e && p(this, "addPoint", {point: n});
                this.isDirtyData = this.isDirty = !0;
                b && h.redraw(d)
            }, removePoint: function (a, b, c) {
                var d = this, e = d.data, g = e[a], f = d.points, h = d.chart,
                    k = function () {
                        f && f.length === e.length && f.splice(a, 1);
                        e.splice(a, 1);
                        d.options.data.splice(a, 1);
                        d.updateParallelArrays(g || {series: d}, "splice", a, 1);
                        g && g.destroy();
                        d.isDirty = !0;
                        d.isDirtyData = !0;
                        b && h.redraw()
                    };
                J(c, h);
                b = l(b, !0);
                g ? g.firePointEvent("remove", null, k) : k()
            }, remove: function (a, b, c, d) {
                function e() {
                    g.destroy(d);
                    g.remove = null;
                    f.isDirtyLegend = f.isDirtyBox = !0;
                    f.linkSeries();
                    l(a, !0) && f.redraw(b)
                }

                var g = this, f = g.chart;
                !1 !== c ? p(g, "remove", null, e) : e()
            }, update: function (c, d) {
                c = a.cleanRecursively(c, this.userOptions);
                p(this, "update", {options: c});
                var e = this, g = e.chart, h = e.userOptions, k, f = e.initialType || e.type,
                    m = c.type || h.type || g.options.chart.type,
                    n = !(this.hasDerivedData || c.dataGrouping || m && m !== this.type || void 0 !== c.pointStart || c.pointInterval || c.pointIntervalUnit || c.keys),
                    w = z[f].prototype, q, t = ["group", "markerGroup", "dataLabelsGroup"],
                    A = ["navigatorSeries", "baseSeries"], D = e.finishedAnimating && {animation: !1}, u = {};
                n && (A.push("data", "isDirtyData", "points", "processedXData", "processedYData", "xIncrement"), !1 !== c.visible &&
                A.push("area", "graph"), e.parallelArrays.forEach(function (a) {
                    A.push(a + "Data")
                }), c.data && this.setData(c.data, !1));
                c = b(h, D, {
                    index: void 0 === h.index ? e.index : h.index,
                    pointStart: l(h.pointStart, e.xData[0])
                }, !n && {data: e.options.data}, c);
                A = t.concat(A);
                A.forEach(function (a) {
                    A[a] = e[a];
                    delete e[a]
                });
                e.remove(!1, null, !1, !0);
                for (q in w) e[q] = void 0;
                z[m || f] ? v(e, z[m || f].prototype) : a.error(17, !0, g);
                A.forEach(function (a) {
                    e[a] = A[a]
                });
                e.init(g, c);
                n && this.points && (k = e.options, !1 === k.visible ? (u.graphic = 1, u.dataLabel = 1) :
                    (k.marker && !1 === k.marker.enabled && (u.graphic = 1), k.dataLabels && !1 === k.dataLabels.enabled && (u.dataLabel = 1)), this.points.forEach(function (a) {
                    a && a.series && (a.resolveColor(), Object.keys(u).length && a.destroyElements(u), !1 === k.showInLegend && a.legendItem && g.legend.destroyItem(a))
                }, this));
                c.zIndex !== h.zIndex && t.forEach(function (a) {
                    e[a] && e[a].attr({zIndex: c.zIndex})
                });
                e.initialType = f;
                g.linkSeries();
                p(this, "afterUpdate");
                l(d, !0) && g.redraw(n ? void 0 : !1)
            }, setName: function (a) {
                this.name = this.options.name = this.userOptions.name =
                    a;
                this.chart.isDirtyLegend = !0
            }
        });
        v(F.prototype, {
            update: function (a, c) {
                var d = this.chart, e = a && a.events || {};
                a = b(this.userOptions, a);
                d.options[this.coll].indexOf && (d.options[this.coll][d.options[this.coll].indexOf(this.userOptions)] = a);
                g(d.options[this.coll].events, function (a, b) {
                    "undefined" === typeof e[b] && (e[b] = void 0)
                });
                this.destroy(!0);
                this.init(d, v(a, {events: e}));
                d.isDirtyBox = !0;
                l(c, !0) && d.redraw()
            }, remove: function (a) {
                for (var b = this.chart, c = this.coll, d = this.series, e = d.length; e--;) d[e] && d[e].remove(!1);
                u(b.axes, this);
                u(b[c], this);
                m(b.options[c]) ? b.options[c].splice(this.options.index, 1) : delete b.options[c];
                b[c].forEach(function (a, b) {
                    a.options.index = a.userOptions.index = b
                });
                this.destroy();
                b.isDirtyBox = !0;
                l(a, !0) && b.redraw()
            }, setTitle: function (a, b) {
                this.update({title: a}, b)
            }, setCategories: function (a, b) {
                this.update({categories: a}, b)
            }
        })
    });
    K(G, "parts/AreaSeries.js", [G["parts/Globals.js"]], function (a) {
        var C = a.color, I = a.pick, F = a.Series, k = a.seriesType;
        k("area", "line", {softThreshold: !1, threshold: 0}, {
            singleStacks: !1,
            getStackPoints: function (e) {
                var k = [], t = [], u = this.xAxis, v = this.yAxis, p = v.stacks[this.stackKey], h = {},
                    d = this.index, m = v.series, b = m.length, g, l = I(v.options.reversedStacks, !0) ? 1 : -1,
                    c;
                e = e || this.points;
                if (this.options.stacking) {
                    for (c = 0; c < e.length; c++) e[c].leftNull = e[c].rightNull = null, h[e[c].x] = e[c];
                    a.objectEach(p, function (a, b) {
                        null !== a.total && t.push(b)
                    });
                    t.sort(function (a, b) {
                        return a - b
                    });
                    g = m.map(function (a) {
                        return a.visible
                    });
                    t.forEach(function (a, e) {
                        var m = 0, w, z;
                        if (h[a] && !h[a].isNull) k.push(h[a]), [-1, 1].forEach(function (k) {
                            var m =
                                1 === k ? "rightNull" : "leftNull", n = 0, q = p[t[e + k]];
                            if (q) for (c = d; 0 <= c && c < b;) w = q.points[c], w || (c === d ? h[a][m] = !0 : g[c] && (z = p[a].points[c]) && (n -= z[1] - z[0])), c += l;
                            h[a][1 === k ? "rightCliff" : "leftCliff"] = n
                        }); else {
                            for (c = d; 0 <= c && c < b;) {
                                if (w = p[a].points[c]) {
                                    m = w[1];
                                    break
                                }
                                c += l
                            }
                            m = v.translate(m, 0, 1, 0, 1);
                            k.push({isNull: !0, plotX: u.translate(a, 0, 0, 0, 1), x: a, plotY: m, yBottom: m})
                        }
                    })
                }
                return k
            }, getGraphPath: function (a) {
                var e = F.prototype.getGraphPath, k = this.options, u = k.stacking, v = this.yAxis, p, h,
                    d = [], m = [], b = this.index, g, l = v.stacks[this.stackKey],
                    c = k.threshold, w = v.getThreshold(k.threshold), z, k = k.connectNulls || "percent" === u,
                    J = function (e, h, k) {
                        var n = a[e];
                        e = u && l[n.x].points[b];
                        var p = n[k + "Null"] || 0;
                        k = n[k + "Cliff"] || 0;
                        var z, q, n = !0;
                        k || p ? (z = (p ? e[0] : e[1]) + k, q = e[0] + k, n = !!p) : !u && a[h] && a[h].isNull && (z = q = c);
                        void 0 !== z && (m.push({
                            plotX: g,
                            plotY: null === z ? w : v.getThreshold(z),
                            isNull: n,
                            isCliff: !0
                        }), d.push({plotX: g, plotY: null === q ? w : v.getThreshold(q), doCurve: !1}))
                    };
                a = a || this.points;
                u && (a = this.getStackPoints(a));
                for (p = 0; p < a.length; p++) if (h = a[p].isNull, g = I(a[p].rectPlotX,
                    a[p].plotX), z = I(a[p].yBottom, w), !h || k) k || J(p, p - 1, "left"), h && !u && k || (m.push(a[p]), d.push({
                    x: p,
                    plotX: g,
                    plotY: z
                })), k || J(p, p + 1, "right");
                p = e.call(this, m, !0, !0);
                d.reversed = !0;
                h = e.call(this, d, !0, !0);
                h.length && (h[0] = "L");
                h = p.concat(h);
                e = e.call(this, m, !1, k);
                h.xMap = p.xMap;
                this.areaPath = h;
                return e
            }, drawGraph: function () {
                this.areaPath = [];
                F.prototype.drawGraph.apply(this);
                var a = this, k = this.areaPath, t = this.options,
                    u = [["area", "highcharts-area", this.color, t.fillColor]];
                this.zones.forEach(function (e, k) {
                    u.push(["zone-area-" +
                    k, "highcharts-area highcharts-zone-area-" + k + " " + e.className, e.color || a.color, e.fillColor || t.fillColor])
                });
                u.forEach(function (e) {
                    var p = e[0], h = a[p], d = h ? "animate" : "attr", m = {};
                    h ? (h.endX = a.preventGraphAnimation ? null : k.xMap, h.animate({d: k})) : (m.zIndex = 0, h = a[p] = a.chart.renderer.path(k).addClass(e[1]).add(a.group), h.isArea = !0);
                    a.chart.styledMode || (m.fill = I(e[3], C(e[2]).setOpacity(I(t.fillOpacity, .75)).get()));
                    h[d](m);
                    h.startX = k.xMap;
                    h.shiftUnit = t.step ? 2 : 1
                })
            }, drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
        })
    });
    K(G, "parts/SplineSeries.js", [G["parts/Globals.js"]], function (a) {
        var C = a.pick;
        a = a.seriesType;
        a("spline", "line", {}, {
            getPointSpline: function (a, F, k) {
                var e = F.plotX, q = F.plotY, t = a[k - 1];
                k = a[k + 1];
                var u, v, p, h;
                if (t && !t.isNull && !1 !== t.doCurve && !F.isCliff && k && !k.isNull && !1 !== k.doCurve && !F.isCliff) {
                    a = t.plotY;
                    p = k.plotX;
                    k = k.plotY;
                    var d = 0;
                    u = (1.5 * e + t.plotX) / 2.5;
                    v = (1.5 * q + a) / 2.5;
                    p = (1.5 * e + p) / 2.5;
                    h = (1.5 * q + k) / 2.5;
                    p !== u && (d = (h - v) * (p - e) / (p - u) + q - h);
                    v += d;
                    h += d;
                    v > a && v > q ? (v = Math.max(a, q), h = 2 * q - v) : v < a && v < q && (v = Math.min(a, q), h =
                        2 * q - v);
                    h > k && h > q ? (h = Math.max(k, q), v = 2 * q - h) : h < k && h < q && (h = Math.min(k, q), v = 2 * q - h);
                    F.rightContX = p;
                    F.rightContY = h
                }
                F = ["C", C(t.rightContX, t.plotX), C(t.rightContY, t.plotY), C(u, e), C(v, q), e, q];
                t.rightContX = t.rightContY = null;
                return F
            }
        })
    });
    K(G, "parts/AreaSplineSeries.js", [G["parts/Globals.js"]], function (a) {
        var C = a.seriesTypes.area.prototype, I = a.seriesType;
        I("areaspline", "spline", a.defaultPlotOptions.area, {
            getStackPoints: C.getStackPoints,
            getGraphPath: C.getGraphPath,
            drawGraph: C.drawGraph,
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
        })
    });
    K(G, "parts/ColumnSeries.js", [G["parts/Globals.js"]], function (a) {
        var C = a.animObject, I = a.color, F = a.extend, k = a.defined, e = a.isNumber, q = a.merge, t = a.pick,
            u = a.Series, v = a.seriesType, p = a.svg;
        v("column", "line", {
            borderRadius: 0,
            crisp: !0,
            groupPadding: .2,
            marker: null,
            pointPadding: .1,
            minPointLength: 0,
            cropThreshold: 50,
            pointRange: null,
            states: {hover: {halo: !1, brightness: .1}, select: {color: "#cccccc", borderColor: "#000000"}},
            dataLabels: {align: null, verticalAlign: null, y: null},
            softThreshold: !1,
            startFromThreshold: !0,
            stickyTracking: !1,
            tooltip: {distance: 6},
            threshold: 0,
            borderColor: "#ffffff"
        }, {
            cropShoulder: 0,
            directTouch: !0,
            trackerGroups: ["group", "dataLabelsGroup"],
            negStacks: !0,
            init: function () {
                u.prototype.init.apply(this, arguments);
                var a = this, d = a.chart;
                d.hasRendered && d.series.forEach(function (d) {
                    d.type === a.type && (d.isDirty = !0)
                })
            },
            getColumnMetrics: function () {
                var a = this, d = a.options, e = a.xAxis, b = a.yAxis, g = e.options.reversedStacks,
                    g = e.reversed && !g || !e.reversed && g, k, c = {}, p = 0;
                !1 === d.grouping ? p = 1 : a.chart.series.forEach(function (d) {
                    var e = d.options,
                        g = d.yAxis, h;
                    d.type !== a.type || !d.visible && a.chart.options.chart.ignoreHiddenSeries || b.len !== g.len || b.pos !== g.pos || (e.stacking ? (k = d.stackKey, void 0 === c[k] && (c[k] = p++), h = c[k]) : !1 !== e.grouping && (h = p++), d.columnIndex = h)
                });
                var z = Math.min(Math.abs(e.transA) * (e.ordinalSlope || d.pointRange || e.closestPointRange || e.tickInterval || 1), e.len),
                    q = z * d.groupPadding, u = (z - 2 * q) / (p || 1),
                    d = Math.min(d.maxPointWidth || e.len, t(d.pointWidth, u * (1 - 2 * d.pointPadding)));
                a.columnMetrics = {
                    width: d, offset: (u - d) / 2 + (q + ((a.columnIndex || 0) +
                        (g ? 1 : 0)) * u - z / 2) * (g ? -1 : 1)
                };
                return a.columnMetrics
            },
            crispCol: function (a, d, e, b) {
                var g = this.chart, h = this.borderWidth, c = -(h % 2 ? .5 : 0), h = h % 2 ? .5 : 1;
                g.inverted && g.renderer.isVML && (h += 1);
                this.options.crisp && (e = Math.round(a + e) + c, a = Math.round(a) + c, e -= a);
                b = Math.round(d + b) + h;
                c = .5 >= Math.abs(d) && .5 < b;
                d = Math.round(d) + h;
                b -= d;
                c && b && (--d, b += 1);
                return {x: a, y: d, width: e, height: b}
            },
            translate: function () {
                var a = this, d = a.chart, e = a.options,
                    b = a.dense = 2 > a.closestPointRange * a.xAxis.transA,
                    b = a.borderWidth = t(e.borderWidth, b ? 0 : 1), g = a.yAxis,
                    l = e.threshold, c = a.translatedThreshold = g.getThreshold(l), p = t(e.minPointLength, 5),
                    z = a.getColumnMetrics(), q = z.width, D = a.barW = Math.max(q, 1 + 2 * b),
                    A = a.pointXOffset = z.offset;
                d.inverted && (c -= .5);
                e.pointPadding && (D = Math.ceil(D));
                u.prototype.translate.apply(a);
                a.points.forEach(function (b) {
                    var e = t(b.yBottom, c), h = 999 + Math.abs(e), m = q,
                        h = Math.min(Math.max(-h, b.plotY), g.len + h), n = b.plotX + A, f = D,
                        r = Math.min(h, e), z, w = Math.max(h, e) - r;
                    p && Math.abs(w) < p && (w = p, z = !g.reversed && !b.negative || g.reversed && b.negative, b.y === l && a.dataMax <=
                    l && g.min < l && (z = !z), r = Math.abs(r - c) > p ? e - p : c - (z ? p : 0));
                    k(b.options.pointWidth) && (m = f = Math.ceil(b.options.pointWidth), n -= Math.round((m - q) / 2));
                    b.barX = n;
                    b.pointWidth = m;
                    b.tooltipPos = d.inverted ? [g.len + g.pos - d.plotLeft - h, a.xAxis.len - n - f / 2, w] : [n + f / 2, h + g.pos - d.plotTop, w];
                    b.shapeType = a.pointClass.prototype.shapeType || "rect";
                    b.shapeArgs = a.crispCol.apply(a, b.isNull ? [n, c, f, 0] : [n, r, f, w])
                })
            },
            getSymbol: a.noop,
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
            drawGraph: function () {
                this.group[this.dense ? "addClass" : "removeClass"]("highcharts-dense-data")
            },
            pointAttribs: function (a, d) {
                var e = this.options, b, g = this.pointAttrToOptions || {};
                b = g.stroke || "borderColor";
                var h = g["stroke-width"] || "borderWidth", c = a && a.color || this.color,
                    k = a && a[b] || e[b] || this.color || c, p = a && a[h] || e[h] || this[h] || 0,
                    g = a && a.dashStyle || e.dashStyle, u = t(e.opacity, 1), D;
                a && this.zones.length && (D = a.getZone(), c = a.options.color || D && D.color || this.color, D && (k = D.borderColor || k, g = D.dashStyle || g, p = D.borderWidth || p));
                d && (a = q(e.states[d], a.options.states && a.options.states[d] || {}), d = a.brightness, c = a.color ||
                    void 0 !== d && I(c).brighten(a.brightness).get() || c, k = a[b] || k, p = a[h] || p, g = a.dashStyle || g, u = t(a.opacity, u));
                b = {fill: c, stroke: k, "stroke-width": p, opacity: u};
                g && (b.dashstyle = g);
                return b
            },
            drawPoints: function () {
                var a = this, d = this.chart, k = a.options, b = d.renderer, g = k.animationLimit || 250, l;
                a.points.forEach(function (c) {
                    var h = c.graphic, m = h && d.pointCount < g ? "animate" : "attr";
                    if (e(c.plotY) && null !== c.y) {
                        l = c.shapeArgs;
                        h && h.element.nodeName !== c.shapeType && (h = h.destroy());
                        if (h) h[m](q(l)); else c.graphic = h = b[c.shapeType](l).add(c.group ||
                            a.group);
                        if (k.borderRadius) h[m]({r: k.borderRadius});
                        d.styledMode || h[m](a.pointAttribs(c, c.selected && "select")).shadow(!1 !== c.allowShadow && k.shadow, null, k.stacking && !k.borderRadius);
                        h.addClass(c.getClassName(), !0)
                    } else h && (c.graphic = h.destroy())
                })
            },
            animate: function (a) {
                var d = this, e = this.yAxis, b = d.options, g = this.chart.inverted, h = {},
                    c = g ? "translateX" : "translateY", k;
                p && (a ? (h.scaleY = .001, a = Math.min(e.pos + e.len, Math.max(e.pos, e.toPixels(b.threshold))), g ? h.translateX = a - e.len : h.translateY = a, d.clipBox && d.setClip(),
                    d.group.attr(h)) : (k = d.group.attr(c), d.group.animate({scaleY: 1}, F(C(d.options.animation), {
                    step: function (a, b) {
                        h[c] = k + b.pos * (e.pos - k);
                        d.group.attr(h)
                    }
                })), d.animate = null))
            },
            remove: function () {
                var a = this, d = a.chart;
                d.hasRendered && d.series.forEach(function (d) {
                    d.type === a.type && (d.isDirty = !0)
                });
                u.prototype.remove.apply(a, arguments)
            }
        })
    });
    K(G, "parts/BarSeries.js", [G["parts/Globals.js"]], function (a) {
        a = a.seriesType;
        a("bar", "column", null, {inverted: !0})
    });
    K(G, "parts/ScatterSeries.js", [G["parts/Globals.js"]], function (a) {
        var C =
            a.Series, I = a.seriesType;
        I("scatter", "line", {
            lineWidth: 0,
            findNearestPointBy: "xy",
            jitter: {x: 0, y: 0},
            marker: {enabled: !0},
            tooltip: {
                headerFormat: '\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e \x3cspan style\x3d"font-size: 10px"\x3e {series.name}\x3c/span\x3e\x3cbr/\x3e',
                pointFormat: "x: \x3cb\x3e{point.x}\x3c/b\x3e\x3cbr/\x3ey: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3e"
            }
        }, {
            sorted: !1,
            requireSorting: !1,
            noSharedTooltip: !0,
            trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
            takeOrdinalPosition: !1,
            drawGraph: function () {
                this.options.lineWidth && C.prototype.drawGraph.call(this)
            },
            applyJitter: function () {
                var a = this, k = this.options.jitter, e = this.points.length;
                k && this.points.forEach(function (q, t) {
                    ["x", "y"].forEach(function (u, v) {
                        var p, h = "plot" + u.toUpperCase(), d, m;
                        k[u] && !q.isNull && (p = a[u + "Axis"], m = k[u] * p.transA, p && !p.isLog && (d = Math.max(0, q[h] - m), p = Math.min(p.len, q[h] + m), v = 1E4 * Math.sin(t + v * e), q[h] = d + (p - d) * (v - Math.floor(v)), "x" === u && (q.clientX = q.plotX)))
                    })
                })
            }
        });
        a.addEvent(C, "afterTranslate", function () {
            this.applyJitter &&
            this.applyJitter()
        })
    });
    K(G, "mixins/centered-series.js", [G["parts/Globals.js"]], function (a) {
        var C = a.deg2rad, I = a.isNumber, F = a.pick, k = a.relativeLength;
        a.CenteredSeriesMixin = {
            getCenter: function () {
                var a = this.options, q = this.chart, t = 2 * (a.slicedOffset || 0), u = q.plotWidth - 2 * t,
                    q = q.plotHeight - 2 * t, v = a.center,
                    v = [F(v[0], "50%"), F(v[1], "50%"), a.size || "100%", a.innerSize || 0],
                    p = Math.min(u, q), h, d;
                for (h = 0; 4 > h; ++h) d = v[h], a = 2 > h || 2 === h && /%$/.test(d), v[h] = k(d, [u, q, p, v[2]][h]) + (a ? t : 0);
                v[3] > v[2] && (v[3] = v[2]);
                return v
            }, getStartAndEndRadians: function (a,
                                                k) {
                a = I(a) ? a : 0;
                k = I(k) && k > a && 360 > k - a ? k : a + 360;
                return {start: C * (a + -90), end: C * (k + -90)}
            }
        }
    });
    K(G, "parts/PieSeries.js", [G["parts/Globals.js"]], function (a) {
        var C = a.addEvent, I = a.CenteredSeriesMixin, F = a.defined, k = I.getStartAndEndRadians, e = a.merge,
            q = a.noop, t = a.pick, u = a.Point, v = a.Series, p = a.seriesType, h = a.setAnimation;
        p("pie", "line", {
            center: [null, null],
            clip: !1,
            colorByPoint: !0,
            dataLabels: {
                allowOverlap: !0, connectorPadding: 5, distance: 30, enabled: !0, formatter: function () {
                    return this.point.isNull ? void 0 : this.point.name
                },
                softConnector: !0, x: 0, connectorShape: "fixedOffset", crookDistance: "70%"
            },
            ignoreHiddenPoint: !0,
            inactiveOtherPoints: !0,
            legendType: "point",
            marker: null,
            size: null,
            showInLegend: !1,
            slicedOffset: 10,
            stickyTracking: !1,
            tooltip: {followPointer: !0},
            borderColor: "#ffffff",
            borderWidth: 1,
            states: {hover: {brightness: .1}}
        }, {
            isCartesian: !1,
            requireSorting: !1,
            directTouch: !0,
            noSharedTooltip: !0,
            trackerGroups: ["group", "dataLabelsGroup"],
            axisTypes: [],
            pointAttribs: a.seriesTypes.column.prototype.pointAttribs,
            animate: function (a) {
                var d =
                    this, b = d.points, e = d.startAngleRad;
                a || (b.forEach(function (a) {
                    var b = a.graphic, g = a.shapeArgs;
                    b && (b.attr({r: a.startR || d.center[3] / 2, start: e, end: e}), b.animate({
                        r: g.r,
                        start: g.start,
                        end: g.end
                    }, d.options.animation))
                }), d.animate = null)
            },
            hasData: function () {
                return !!this.processedXData.length
            },
            updateTotals: function () {
                var a, e = 0, b = this.points, g = b.length, h, c = this.options.ignoreHiddenPoint;
                for (a = 0; a < g; a++) h = b[a], e += c && !h.visible ? 0 : h.isNull ? 0 : h.y;
                this.total = e;
                for (a = 0; a < g; a++) h = b[a], h.percentage = 0 < e && (h.visible || !c) ?
                    h.y / e * 100 : 0, h.total = e
            },
            generatePoints: function () {
                v.prototype.generatePoints.call(this);
                this.updateTotals()
            },
            getX: function (a, e, b) {
                var d = this.center, h = this.radii ? this.radii[b.index] : d[2] / 2;
                return d[0] + (e ? -1 : 1) * Math.cos(Math.asin(Math.max(Math.min((a - d[1]) / (h + b.labelDistance), 1), -1))) * (h + b.labelDistance) + (0 < b.labelDistance ? (e ? -1 : 1) * this.options.dataLabels.padding : 0)
            },
            translate: function (a) {
                this.generatePoints();
                var d = 0, b = this.options, e = b.slicedOffset, h = e + (b.borderWidth || 0), c, p,
                    z = k(b.startAngle, b.endAngle),
                    q = this.startAngleRad = z.start, z = (this.endAngleRad = z.end) - q, u = this.points, A, n,
                    x = b.dataLabels.distance, b = b.ignoreHiddenPoint, v, E = u.length, H;
                a || (this.center = a = this.getCenter());
                for (v = 0; v < E; v++) {
                    H = u[v];
                    H.labelDistance = t(H.options.dataLabels && H.options.dataLabels.distance, x);
                    this.maxLabelDistance = Math.max(this.maxLabelDistance || 0, H.labelDistance);
                    c = q + d * z;
                    if (!b || H.visible) d += H.percentage / 100;
                    p = q + d * z;
                    H.shapeType = "arc";
                    H.shapeArgs = {
                        x: a[0],
                        y: a[1],
                        r: a[2] / 2,
                        innerR: a[3] / 2,
                        start: Math.round(1E3 * c) / 1E3,
                        end: Math.round(1E3 *
                            p) / 1E3
                    };
                    p = (p + c) / 2;
                    p > 1.5 * Math.PI ? p -= 2 * Math.PI : p < -Math.PI / 2 && (p += 2 * Math.PI);
                    H.slicedTranslation = {
                        translateX: Math.round(Math.cos(p) * e),
                        translateY: Math.round(Math.sin(p) * e)
                    };
                    A = Math.cos(p) * a[2] / 2;
                    n = Math.sin(p) * a[2] / 2;
                    H.tooltipPos = [a[0] + .7 * A, a[1] + .7 * n];
                    H.half = p < -Math.PI / 2 || p > Math.PI / 2 ? 1 : 0;
                    H.angle = p;
                    c = Math.min(h, H.labelDistance / 5);
                    H.labelPosition = {
                        natural: {
                            x: a[0] + A + Math.cos(p) * H.labelDistance,
                            y: a[1] + n + Math.sin(p) * H.labelDistance
                        },
                        "final": {},
                        alignment: 0 > H.labelDistance ? "center" : H.half ? "right" : "left",
                        connectorPosition: {
                            breakAt: {
                                x: a[0] +
                                    A + Math.cos(p) * c, y: a[1] + n + Math.sin(p) * c
                            }, touchingSliceAt: {x: a[0] + A, y: a[1] + n}
                        }
                    }
                }
            },
            drawGraph: null,
            redrawPoints: function () {
                var a = this, h = a.chart, b = h.renderer, g, k, c, p, z = a.options.shadow;
                !z || a.shadowGroup || h.styledMode || (a.shadowGroup = b.g("shadow").attr({zIndex: -1}).add(a.group));
                a.points.forEach(function (d) {
                    var l = {};
                    k = d.graphic;
                    if (!d.isNull && k) {
                        p = d.shapeArgs;
                        g = d.getTranslate();
                        if (!h.styledMode) {
                            var m = d.shadowGroup;
                            z && !m && (m = d.shadowGroup = b.g("shadow").add(a.shadowGroup));
                            m && m.attr(g);
                            c = a.pointAttribs(d,
                                d.selected && "select")
                        }
                        d.delayedRendering ? (k.setRadialReference(a.center).attr(p).attr(g), h.styledMode || k.attr(c).attr({"stroke-linejoin": "round"}).shadow(z, m), d.delayRendering = !1) : (k.setRadialReference(a.center), h.styledMode || e(!0, l, c), e(!0, l, p, g), k.animate(l));
                        k.attr({visibility: d.visible ? "inherit" : "hidden"});
                        k.addClass(d.getClassName())
                    } else k && (d.graphic = k.destroy())
                })
            },
            drawPoints: function () {
                var a = this.chart.renderer;
                this.points.forEach(function (d) {
                    d.graphic || (d.graphic = a[d.shapeType](d.shapeArgs).add(d.series.group),
                        d.delayedRendering = !0)
                })
            },
            searchPoint: q,
            sortByAngle: function (a, e) {
                a.sort(function (a, d) {
                    return void 0 !== a.angle && (d.angle - a.angle) * e
                })
            },
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
            getCenter: I.getCenter,
            getSymbol: q
        }, {
            init: function () {
                u.prototype.init.apply(this, arguments);
                var a = this, e;
                a.name = t(a.name, "Slice");
                e = function (b) {
                    a.slice("select" === b.type)
                };
                C(a, "select", e);
                C(a, "unselect", e);
                return a
            }, isValid: function () {
                return a.isNumber(this.y, !0) && 0 <= this.y
            }, setVisible: function (a, e) {
                var b = this, d = b.series,
                    h = d.chart, c = d.options.ignoreHiddenPoint;
                e = t(e, c);
                a !== b.visible && (b.visible = b.options.visible = a = void 0 === a ? !b.visible : a, d.options.data[d.data.indexOf(b)] = b.options, ["graphic", "dataLabel", "connector", "shadowGroup"].forEach(function (c) {
                    if (b[c]) b[c][a ? "show" : "hide"](!0)
                }), b.legendItem && h.legend.colorizeItem(b, a), a || "hover" !== b.state || b.setState(""), c && (d.isDirty = !0), e && h.redraw())
            }, slice: function (a, e, b) {
                var d = this.series;
                h(b, d.chart);
                t(e, !0);
                this.sliced = this.options.sliced = F(a) ? a : !this.sliced;
                d.options.data[d.data.indexOf(this)] =
                    this.options;
                this.graphic.animate(this.getTranslate());
                this.shadowGroup && this.shadowGroup.animate(this.getTranslate())
            }, getTranslate: function () {
                return this.sliced ? this.slicedTranslation : {translateX: 0, translateY: 0}
            }, haloPath: function (a) {
                var d = this.shapeArgs;
                return this.sliced || !this.visible ? [] : this.series.chart.renderer.symbols.arc(d.x, d.y, d.r + a, d.r + a, {
                    innerR: this.shapeArgs.r - 1,
                    start: d.start,
                    end: d.end
                })
            }, connectorShapes: {
                fixedOffset: function (a, e, b) {
                    var d = e.breakAt;
                    e = e.touchingSliceAt;
                    return ["M", a.x,
                        a.y].concat(b.softConnector ? ["C", a.x + ("left" === a.alignment ? -5 : 5), a.y, 2 * d.x - e.x, 2 * d.y - e.y, d.x, d.y] : ["L", d.x, d.y]).concat(["L", e.x, e.y])
                }, straight: function (a, e) {
                    e = e.touchingSliceAt;
                    return ["M", a.x, a.y, "L", e.x, e.y]
                }, crookedLine: function (d, e, b) {
                    e = e.touchingSliceAt;
                    var g = this.series, h = g.center[0], c = g.chart.plotWidth, k = g.chart.plotLeft,
                        g = d.alignment, m = this.shapeArgs.r;
                    b = a.relativeLength(b.crookDistance, 1);
                    b = "left" === g ? h + m + (c + k - h - m) * (1 - b) : k + (h - m) * b;
                    h = ["L", b, d.y];
                    if ("left" === g ? b > d.x || b < e.x : b < d.x || b > e.x) h =
                        [];
                    return ["M", d.x, d.y].concat(h).concat(["L", e.x, e.y])
                }
            }, getConnectorPath: function () {
                var a = this.labelPosition, e = this.series.options.dataLabels, b = e.connectorShape,
                    g = this.connectorShapes;
                g[b] && (b = g[b]);
                return b.call(this, {
                    x: a.final.x,
                    y: a.final.y,
                    alignment: a.alignment
                }, a.connectorPosition, e)
            }
        })
    });
    K(G, "parts/DataLabels.js", [G["parts/Globals.js"]], function (a) {
        var C = a.arrayMax, I = a.defined, F = a.extend, k = a.format, e = a.merge, q = a.noop, t = a.pick,
            u = a.relativeLength, v = a.Series, p = a.seriesTypes, h = a.stableSort, d = a.isArray,
            m = a.splat;
        a.distribute = function (b, d, e) {
            function c(a, b) {
                return a.target - b.target
            }

            var g, k = !0, l = b, m = [], p;
            p = 0;
            var n = l.reducedLen || d;
            for (g = b.length; g--;) p += b[g].size;
            if (p > n) {
                h(b, function (a, b) {
                    return (b.rank || 0) - (a.rank || 0)
                });
                for (p = g = 0; p <= n;) p += b[g].size, g++;
                m = b.splice(g - 1, b.length)
            }
            h(b, c);
            for (b = b.map(function (a) {
                return {size: a.size, targets: [a.target], align: t(a.align, .5)}
            }); k;) {
                for (g = b.length; g--;) k = b[g], p = (Math.min.apply(0, k.targets) + Math.max.apply(0, k.targets)) / 2, k.pos = Math.min(Math.max(0, p - k.size * k.align),
                    d - k.size);
                g = b.length;
                for (k = !1; g--;) 0 < g && b[g - 1].pos + b[g - 1].size > b[g].pos && (b[g - 1].size += b[g].size, b[g - 1].targets = b[g - 1].targets.concat(b[g].targets), b[g - 1].align = .5, b[g - 1].pos + b[g - 1].size > d && (b[g - 1].pos = d - b[g - 1].size), b.splice(g, 1), k = !0)
            }
            l.push.apply(l, m);
            g = 0;
            b.some(function (b) {
                var c = 0;
                if (b.targets.some(function () {
                    l[g].pos = b.pos + c;
                    if (Math.abs(l[g].pos - l[g].target) > e) return l.slice(0, g + 1).forEach(function (a) {
                        delete a.pos
                    }), l.reducedLen = (l.reducedLen || d) - .1 * d, l.reducedLen > .1 * d && a.distribute(l, d, e), !0;
                    c += l[g].size;
                    g++
                })) return !0
            });
            h(l, c)
        };
        v.prototype.drawDataLabels = function () {
            function b(a, b) {
                var c = b.filter;
                return c ? (b = c.operator, a = a[c.property], c = c.value, "\x3e" === b && a > c || "\x3c" === b && a < c || "\x3e\x3d" === b && a >= c || "\x3c\x3d" === b && a <= c || "\x3d\x3d" === b && a == c || "\x3d\x3d\x3d" === b && a === c ? !0 : !1) : !0
            }

            function g(a, b) {
                var c = [], f;
                if (d(a) && !d(b)) c = a.map(function (a) {
                    return e(a, b)
                }); else if (d(b) && !d(a)) c = b.map(function (b) {
                    return e(a, b)
                }); else if (d(a) || d(b)) for (f = Math.max(a.length, b.length); f--;) c[f] = e(a[f], b[f]);
                else c = e(a, b);
                return c
            }

            var h = this, c = h.chart, p = h.options, q = p.dataLabels, u = h.points, D, A = h.hasRendered || 0,
                n, x = a.animObject(p.animation).duration, v = Math.min(x, 200), E = t(q.defer, 0 < v),
                H = c.renderer,
                q = g(g(c.options.plotOptions && c.options.plotOptions.series && c.options.plotOptions.series.dataLabels, c.options.plotOptions && c.options.plotOptions[h.type] && c.options.plotOptions[h.type].dataLabels), q);
            a.fireEvent(this, "drawDataLabels");
            if (d(q) || q.enabled || h._hasPointLabels) n = h.plotGroup("dataLabelsGroup", "data-labels",
                E && !A ? "hidden" : "inherit", q.zIndex || 6), E && (n.attr({opacity: +A}), A || setTimeout(function () {
                var a = h.dataLabelsGroup;
                a && (h.visible && n.show(!0), a[p.animation ? "animate" : "attr"]({opacity: 1}, {duration: v}))
            }, x - v)), u.forEach(function (d) {
                D = m(g(q, d.dlOptions || d.options && d.options.dataLabels));
                D.forEach(function (e, f) {
                    var g = e.enabled && (!d.isNull || d.dataLabelOnNull) && b(d, e), l, m, r, q,
                        z = d.dataLabels ? d.dataLabels[f] : d.dataLabel,
                        x = d.connectors ? d.connectors[f] : d.connector, u = !z;
                    g && (l = d.getLabelConfig(), m = t(e[d.formatPrefix +
                    "Format"], e.format), l = I(m) ? k(m, l, c.time) : (e[d.formatPrefix + "Formatter"] || e.formatter).call(l, e), m = e.style, r = e.rotation, c.styledMode || (m.color = t(e.color, m.color, h.color, "#000000"), "contrast" === m.color && (d.contrastColor = H.getContrast(d.color || h.color), m.color = e.inside || 0 > t(e.distance, d.labelDistance) || p.stacking ? d.contrastColor : "#000000"), p.cursor && (m.cursor = p.cursor)), q = {
                        r: e.borderRadius || 0,
                        rotation: r,
                        padding: e.padding,
                        zIndex: 1
                    }, c.styledMode || (q.fill = e.backgroundColor, q.stroke = e.borderColor, q["stroke-width"] =
                        e.borderWidth), a.objectEach(q, function (a, b) {
                        void 0 === a && delete q[b]
                    }));
                    !z || g && I(l) ? g && I(l) && (z ? q.text = l : (d.dataLabels = d.dataLabels || [], z = d.dataLabels[f] = r ? H.text(l, 0, -9999).addClass("highcharts-data-label") : H.label(l, 0, -9999, e.shape, null, null, e.useHTML, null, "data-label"), f || (d.dataLabel = z), z.addClass(" highcharts-data-label-color-" + d.colorIndex + " " + (e.className || "") + (e.useHTML ? " highcharts-tracker" : ""))), z.options = e, z.attr(q), c.styledMode || z.css(m).shadow(e.shadow), z.added || z.add(n), e.textPath && z.setTextPath(d.getDataLabelPath &&
                        d.getDataLabelPath(z) || d.graphic, e.textPath), h.alignDataLabel(d, z, e, null, u)) : (d.dataLabel = d.dataLabel && d.dataLabel.destroy(), d.dataLabels && (1 === d.dataLabels.length ? delete d.dataLabels : delete d.dataLabels[f]), f || delete d.dataLabel, x && (d.connector = d.connector.destroy(), d.connectors && (1 === d.connectors.length ? delete d.connectors : delete d.connectors[f])))
                })
            });
            a.fireEvent(this, "afterDrawDataLabels")
        };
        v.prototype.alignDataLabel = function (a, d, e, c, h) {
            var b = this.chart, g = this.isCartesian && b.inverted, k = t(a.dlBox &&
                    a.dlBox.centerX, a.plotX, -9999), l = t(a.plotY, -9999), n = d.getBBox(), m, p = e.rotation,
                q = e.align,
                u = this.visible && (a.series.forceDL || b.isInsidePlot(k, Math.round(l), g) || c && b.isInsidePlot(k, g ? c.x + 1 : c.y + c.height - 1, g)),
                f = "justify" === t(e.overflow, "justify");
            if (u && (m = b.renderer.fontMetrics(b.styledMode ? void 0 : e.style.fontSize, d).b, c = F({
                x: g ? this.yAxis.len - l : k,
                y: Math.round(g ? this.xAxis.len - k : l),
                width: 0,
                height: 0
            }, c), F(e, {width: n.width, height: n.height}), p ? (f = !1, k = b.renderer.rotCorr(m, p), k = {
                x: c.x + e.x + c.width / 2 + k.x, y: c.y +
                    e.y + {top: 0, middle: .5, bottom: 1}[e.verticalAlign] * c.height
            }, d[h ? "attr" : "animate"](k).attr({align: q}), l = (p + 720) % 360, l = 180 < l && 360 > l, "left" === q ? k.y -= l ? n.height : 0 : "center" === q ? (k.x -= n.width / 2, k.y -= n.height / 2) : "right" === q && (k.x -= n.width, k.y -= l ? 0 : n.height), d.placed = !0, d.alignAttr = k) : (d.align(e, null, c), k = d.alignAttr), f && 0 <= c.height ? a.isLabelJustified = this.justifyDataLabel(d, e, k, n, c, h) : t(e.crop, !0) && (u = b.isInsidePlot(k.x, k.y) && b.isInsidePlot(k.x + n.width, k.y + n.height)), e.shape && !p)) d[h ? "attr" : "animate"]({
                anchorX: g ?
                    b.plotWidth - a.plotY : a.plotX, anchorY: g ? b.plotHeight - a.plotX : a.plotY
            });
            u || (d.attr({y: -9999}), d.placed = !1)
        };
        v.prototype.justifyDataLabel = function (a, d, e, c, h, k) {
            var b = this.chart, g = d.align, l = d.verticalAlign, n, m, p = a.box ? 0 : a.padding || 0;
            n = e.x + p;
            0 > n && ("right" === g ? d.align = "left" : d.x = -n, m = !0);
            n = e.x + c.width - p;
            n > b.plotWidth && ("left" === g ? d.align = "right" : d.x = b.plotWidth - n, m = !0);
            n = e.y + p;
            0 > n && ("bottom" === l ? d.verticalAlign = "top" : d.y = -n, m = !0);
            n = e.y + c.height - p;
            n > b.plotHeight && ("top" === l ? d.verticalAlign = "bottom" : d.y = b.plotHeight -
                n, m = !0);
            m && (a.placed = !k, a.align(d, null, h));
            return m
        };
        p.pie && (p.pie.prototype.dataLabelPositioners = {
            radialDistributionY: function (a) {
                return a.top + a.distributeBox.pos
            }, radialDistributionX: function (a, d, e, c) {
                return a.getX(e < d.top + 2 || e > d.bottom - 2 ? c : e, d.half, d)
            }, justify: function (a, d, e) {
                return e[0] + (a.half ? -1 : 1) * (d + a.labelDistance)
            }, alignToPlotEdges: function (a, d, e, c) {
                a = a.getBBox().width;
                return d ? a + c : e - a - c
            }, alignToConnectors: function (a, d, e, c) {
                var b = 0, g;
                a.forEach(function (a) {
                    g = a.dataLabel.getBBox().width;
                    g >
                    b && (b = g)
                });
                return d ? b + c : e - b - c
            }
        }, p.pie.prototype.drawDataLabels = function () {
            var b = this, d = b.data, h, c = b.chart, k = b.options.dataLabels, m = k.connectorPadding, p,
                q = c.plotWidth, u = c.plotHeight, n = c.plotLeft, x = Math.round(c.chartWidth / 3), B,
                E = b.center, H = E[2] / 2, f = E[1], r, F, G, L, K = [[], []], O, y, S, Q, R = [0, 0, 0, 0],
                T = b.dataLabelPositioners, Y;
            b.visible && (k.enabled || b._hasPointLabels) && (d.forEach(function (a) {
                a.dataLabel && a.visible && a.dataLabel.shortened && (a.dataLabel.attr({width: "auto"}).css({
                    width: "auto",
                    textOverflow: "clip"
                }),
                    a.dataLabel.shortened = !1)
            }), v.prototype.drawDataLabels.apply(b), d.forEach(function (a) {
                a.dataLabel && (a.visible ? (K[a.half].push(a), a.dataLabel._pos = null, !I(k.style.width) && !I(a.options.dataLabels && a.options.dataLabels.style && a.options.dataLabels.style.width) && a.dataLabel.getBBox().width > x && (a.dataLabel.css({width: .7 * x}), a.dataLabel.shortened = !0)) : (a.dataLabel = a.dataLabel.destroy(), a.dataLabels && 1 === a.dataLabels.length && delete a.dataLabels))
            }), K.forEach(function (d, e) {
                var g, l, p = d.length, z = [], x;
                if (p) for (b.sortByAngle(d,
                    e - .5), 0 < b.maxLabelDistance && (g = Math.max(0, f - H - b.maxLabelDistance), l = Math.min(f + H + b.maxLabelDistance, c.plotHeight), d.forEach(function (a) {
                    0 < a.labelDistance && a.dataLabel && (a.top = Math.max(0, f - H - a.labelDistance), a.bottom = Math.min(f + H + a.labelDistance, c.plotHeight), x = a.dataLabel.getBBox().height || 21, a.distributeBox = {
                        target: a.labelPosition.natural.y - a.top + x / 2,
                        size: x,
                        rank: a.y
                    }, z.push(a.distributeBox))
                }), g = l + x - g, a.distribute(z, g, g / 5)), Q = 0; Q < p; Q++) {
                    h = d[Q];
                    G = h.labelPosition;
                    r = h.dataLabel;
                    S = !1 === h.visible ? "hidden" :
                        "inherit";
                    y = g = G.natural.y;
                    z && I(h.distributeBox) && (void 0 === h.distributeBox.pos ? S = "hidden" : (L = h.distributeBox.size, y = T.radialDistributionY(h)));
                    delete h.positionIndex;
                    if (k.justify) O = T.justify(h, H, E); else switch (k.alignTo) {
                        case "connectors":
                            O = T.alignToConnectors(d, e, q, n);
                            break;
                        case "plotEdges":
                            O = T.alignToPlotEdges(r, e, q, n);
                            break;
                        default:
                            O = T.radialDistributionX(b, h, y, g)
                    }
                    r._attr = {visibility: S, align: G.alignment};
                    r._pos = {x: O + k.x + ({left: m, right: -m}[G.alignment] || 0), y: y + k.y - 10};
                    G.final.x = O;
                    G.final.y = y;
                    t(k.crop,
                        !0) && (F = r.getBBox().width, g = null, O - F < m && 1 === e ? (g = Math.round(F - O + m), R[3] = Math.max(g, R[3])) : O + F > q - m && 0 === e && (g = Math.round(O + F - q + m), R[1] = Math.max(g, R[1])), 0 > y - L / 2 ? R[0] = Math.max(Math.round(-y + L / 2), R[0]) : y + L / 2 > u && (R[2] = Math.max(Math.round(y + L / 2 - u), R[2])), r.sideOverflow = g)
                }
            }), 0 === C(R) || this.verifyDataLabelOverflow(R)) && (this.placeDataLabels(), this.points.forEach(function (a) {
                Y = e(k, a.options.dataLabels);
                if (p = t(Y.connectorWidth, 1)) {
                    var d;
                    B = a.connector;
                    if ((r = a.dataLabel) && r._pos && a.visible && 0 < a.labelDistance) {
                        S =
                            r._attr.visibility;
                        if (d = !B) a.connector = B = c.renderer.path().addClass("highcharts-data-label-connector  highcharts-color-" + a.colorIndex + (a.className ? " " + a.className : "")).add(b.dataLabelsGroup), c.styledMode || B.attr({
                            "stroke-width": p,
                            stroke: Y.connectorColor || a.color || "#666666"
                        });
                        B[d ? "attr" : "animate"]({d: a.getConnectorPath()});
                        B.attr("visibility", S)
                    } else B && (a.connector = B.destroy())
                }
            }))
        }, p.pie.prototype.placeDataLabels = function () {
            this.points.forEach(function (a) {
                var b = a.dataLabel, d;
                b && a.visible && ((d = b._pos) ?
                    (b.sideOverflow && (b._attr.width = Math.max(b.getBBox().width - b.sideOverflow, 0), b.css({
                        width: b._attr.width + "px",
                        textOverflow: (this.options.dataLabels.style || {}).textOverflow || "ellipsis"
                    }), b.shortened = !0), b.attr(b._attr), b[b.moved ? "animate" : "attr"](d), b.moved = !0) : b && b.attr({y: -9999}));
                delete a.distributeBox
            }, this)
        }, p.pie.prototype.alignDataLabel = q, p.pie.prototype.verifyDataLabelOverflow = function (a) {
            var b = this.center, d = this.options, c = d.center, e = d.minSize || 80, h, k = null !== d.size;
            k || (null !== c[0] ? h = Math.max(b[2] -
                Math.max(a[1], a[3]), e) : (h = Math.max(b[2] - a[1] - a[3], e), b[0] += (a[3] - a[1]) / 2), null !== c[1] ? h = Math.max(Math.min(h, b[2] - Math.max(a[0], a[2])), e) : (h = Math.max(Math.min(h, b[2] - a[0] - a[2]), e), b[1] += (a[0] - a[2]) / 2), h < b[2] ? (b[2] = h, b[3] = Math.min(u(d.innerSize || 0, h), h), this.translate(b), this.drawDataLabels && this.drawDataLabels()) : k = !0);
            return k
        });
        p.column && (p.column.prototype.alignDataLabel = function (a, d, h, c, k) {
            var b = this.chart.inverted, g = a.series, l = a.dlBox || a.shapeArgs,
                m = t(a.below, a.plotY > t(this.translatedThreshold,
                    g.yAxis.len)), n = t(h.inside, !!this.options.stacking);
            l && (c = e(l), 0 > c.y && (c.height += c.y, c.y = 0), l = c.y + c.height - g.yAxis.len, 0 < l && (c.height -= l), b && (c = {
                x: g.yAxis.len - c.y - c.height,
                y: g.xAxis.len - c.x - c.width,
                width: c.height,
                height: c.width
            }), n || (b ? (c.x += m ? 0 : c.width, c.width = 0) : (c.y += m ? c.height : 0, c.height = 0)));
            h.align = t(h.align, !b || n ? "center" : m ? "right" : "left");
            h.verticalAlign = t(h.verticalAlign, b || n ? "middle" : m ? "top" : "bottom");
            v.prototype.alignDataLabel.call(this, a, d, h, c, k);
            a.isLabelJustified && a.contrastColor && d.css({color: a.contrastColor})
        })
    });
    K(G, "modules/overlapping-datalabels.src.js", [G["parts/Globals.js"]], function (a) {
        var C = a.Chart, G = a.isArray, F = a.objectEach, k = a.pick, e = a.addEvent, q = a.fireEvent;
        e(C, "render", function () {
            var a = [];
            (this.labelCollectors || []).forEach(function (e) {
                a = a.concat(e())
            });
            (this.yAxis || []).forEach(function (e) {
                e.options.stackLabels && !e.options.stackLabels.allowOverlap && F(e.stacks, function (e) {
                    F(e, function (e) {
                        a.push(e.label)
                    })
                })
            });
            (this.series || []).forEach(function (e) {
                var q = e.options.dataLabels;
                e.visible && (!1 !== q.enabled ||
                    e._hasPointLabels) && e.points.forEach(function (e) {
                    e.visible && (G(e.dataLabels) ? e.dataLabels : e.dataLabel ? [e.dataLabel] : []).forEach(function (h) {
                        var d = h.options;
                        h.labelrank = k(d.labelrank, e.labelrank, e.shapeArgs && e.shapeArgs.height);
                        d.allowOverlap || a.push(h)
                    })
                })
            });
            this.hideOverlappingLabels(a)
        });
        C.prototype.hideOverlappingLabels = function (a) {
            var e = this, k = a.length, p = e.renderer, h, d, m, b, g, l,
                c = function (a, b, c, d, e, g, h, k) {
                    return !(e > a + c || e + h < a || g > b + d || g + k < b)
                };
            m = function (a) {
                var b, c, d, e = a.box ? 0 : a.padding || 0;
                d = 0;
                if (a &&
                    (!a.alignAttr || a.placed)) return b = a.alignAttr || {
                    x: a.attr("x"),
                    y: a.attr("y")
                }, c = a.parentGroup, a.width || (d = a.getBBox(), a.width = d.width, a.height = d.height, d = p.fontMetrics(null, a.element).h), {
                    x: b.x + (c.translateX || 0) + e,
                    y: b.y + (c.translateY || 0) + e - d,
                    width: a.width - 2 * e,
                    height: a.height - 2 * e
                }
            };
            for (d = 0; d < k; d++) if (h = a[d]) h.oldOpacity = h.opacity, h.newOpacity = 1, h.absoluteBox = m(h);
            a.sort(function (a, b) {
                return (b.labelrank || 0) - (a.labelrank || 0)
            });
            for (d = 0; d < k; d++) for (l = (m = a[d]) && m.absoluteBox, h = d + 1; h < k; ++h) if (g = (b = a[h]) &&
                b.absoluteBox, l && g && m !== b && 0 !== m.newOpacity && 0 !== b.newOpacity && (g = c(l.x, l.y, l.width, l.height, g.x, g.y, g.width, g.height))) (m.labelrank < b.labelrank ? m : b).newOpacity = 0;
            a.forEach(function (a) {
                var b, c;
                a && (c = a.newOpacity, a.oldOpacity !== c && (a.alignAttr && a.placed ? (c ? a.show(!0) : b = function () {
                    a.hide()
                }, a.alignAttr.opacity = c, a[a.isOld ? "animate" : "attr"](a.alignAttr, null, b), q(e, "afterHideOverlappingLabels")) : a.attr({opacity: c})), a.isOld = !0)
            })
        }
    });
    K(G, "parts/Interaction.js", [G["parts/Globals.js"]], function (a) {
        var C =
                a.addEvent, G = a.Chart, F = a.createElement, k = a.css, e = a.defaultOptions,
            q = a.defaultPlotOptions, t = a.extend, u = a.fireEvent, v = a.hasTouch, p = a.isObject,
            h = a.Legend, d = a.merge, m = a.pick, b = a.Point, g = a.Series, l = a.seriesTypes, c = a.svg, w;
        w = a.TrackerMixin = {
            drawTrackerPoint: function () {
                var a = this, b = a.chart, c = b.pointer, d = function (a) {
                    var b = c.getPointFromEvent(a);
                    void 0 !== b && (c.isDirectTouch = !0, b.onMouseOver(a))
                };
                a.points.forEach(function (a) {
                    a.graphic && (a.graphic.element.point = a);
                    a.dataLabel && (a.dataLabel.div ? a.dataLabel.div.point =
                        a : a.dataLabel.element.point = a)
                });
                a._hasTracking || (a.trackerGroups.forEach(function (e) {
                    if (a[e]) {
                        a[e].addClass("highcharts-tracker").on("mouseover", d).on("mouseout", function (a) {
                            c.onTrackerMouseOut(a)
                        });
                        if (v) a[e].on("touchstart", d);
                        !b.styledMode && a.options.cursor && a[e].css(k).css({cursor: a.options.cursor})
                    }
                }), a._hasTracking = !0);
                u(this, "afterDrawTracker")
            }, drawTrackerGraph: function () {
                var a = this, b = a.options, d = b.trackByArea, e = [].concat(d ? a.areaPath : a.graphPath),
                    g = e.length, h = a.chart, k = h.pointer, l = h.renderer,
                    m = h.options.tooltip.snap, f = a.tracker, p, q = function () {
                        if (h.hoverSeries !== a) a.onMouseOver()
                    }, t = "rgba(192,192,192," + (c ? .0001 : .002) + ")";
                if (g && !d) for (p = g + 1; p--;) "M" === e[p] && e.splice(p + 1, 0, e[p + 1] - m, e[p + 2], "L"), (p && "M" === e[p] || p === g) && e.splice(p, 0, "L", e[p - 2] + m, e[p - 1]);
                f ? f.attr({d: e}) : a.graph && (a.tracker = l.path(e).attr({
                    visibility: a.visible ? "visible" : "hidden",
                    zIndex: 2
                }).addClass(d ? "highcharts-tracker-area" : "highcharts-tracker-line").add(a.group), h.styledMode || a.tracker.attr({
                    "stroke-linejoin": "round", stroke: t,
                    fill: d ? t : "none", "stroke-width": a.graph.strokeWidth() + (d ? 0 : 2 * m)
                }), [a.tracker, a.markerGroup].forEach(function (a) {
                    a.addClass("highcharts-tracker").on("mouseover", q).on("mouseout", function (a) {
                        k.onTrackerMouseOut(a)
                    });
                    b.cursor && !h.styledMode && a.css({cursor: b.cursor});
                    if (v) a.on("touchstart", q)
                }));
                u(this, "afterDrawTracker")
            }
        };
        l.column && (l.column.prototype.drawTracker = w.drawTrackerPoint);
        l.pie && (l.pie.prototype.drawTracker = w.drawTrackerPoint);
        l.scatter && (l.scatter.prototype.drawTracker = w.drawTrackerPoint);
        t(h.prototype, {
            setItemEvents: function (a, c, e) {
                var h = this, g = h.chart.renderer.boxWrapper, k = a instanceof b,
                    l = "highcharts-legend-" + (k ? "point" : "series") + "-active", m = h.chart.styledMode;
                (e ? c : a.legendGroup).on("mouseover", function () {
                    h.allItems.forEach(function (b) {
                        a !== b && b.setState("inactive", !k)
                    });
                    a.setState("hover");
                    a.visible && g.addClass(l);
                    m || c.css(h.options.itemHoverStyle)
                }).on("mouseout", function () {
                    h.styledMode || c.css(d(a.visible ? h.itemStyle : h.itemHiddenStyle));
                    h.allItems.forEach(function (b) {
                        a !== b && b.setState("",
                            !k)
                    });
                    g.removeClass(l);
                    a.setState()
                }).on("click", function (b) {
                    var c = function () {
                        a.setVisible && a.setVisible()
                    };
                    g.removeClass(l);
                    b = {browserEvent: b};
                    a.firePointEvent ? a.firePointEvent("legendItemClick", b, c) : u(a, "legendItemClick", b, c)
                })
            }, createCheckboxForItem: function (a) {
                a.checkbox = F("input", {
                    type: "checkbox",
                    className: "highcharts-legend-checkbox",
                    checked: a.selected,
                    defaultChecked: a.selected
                }, this.options.itemCheckboxStyle, this.chart.container);
                C(a.checkbox, "click", function (b) {
                    u(a.series || a, "checkboxClick",
                        {checked: b.target.checked, item: a}, function () {
                            a.select()
                        })
                })
            }
        });
        t(G.prototype, {
            showResetZoom: function () {
                function a() {
                    b.zoomOut()
                }

                var b = this, c = e.lang, d = b.options.chart.resetZoomButton, h = d.theme, g = h.states,
                    k = "chart" === d.relativeTo || "spaceBox" === d.relativeTo ? null : "plotBox";
                u(this, "beforeShowResetZoom", null, function () {
                    b.resetZoomButton = b.renderer.button(c.resetZoom, null, null, a, h, g && g.hover).attr({
                        align: d.position.align,
                        title: c.resetZoomTitle
                    }).addClass("highcharts-reset-zoom").add().align(d.position, !1,
                        k)
                });
                u(this, "afterShowResetZoom")
            }, zoomOut: function () {
                u(this, "selection", {resetSelection: !0}, this.zoom)
            }, zoom: function (b) {
                var c = this, d, e = c.pointer, h = !1, g = c.inverted ? e.mouseDownX : e.mouseDownY, k;
                !b || b.resetSelection ? (c.axes.forEach(function (a) {
                    d = a.zoom()
                }), e.initiated = !1) : b.xAxis.concat(b.yAxis).forEach(function (b) {
                    var k = b.axis, f = c.inverted ? k.left : k.top,
                        l = c.inverted ? f + k.width : f + k.height, m = k.isXAxis, n = !1;
                    if (!m && g >= f && g <= l || m || !a.defined(g)) n = !0;
                    e[m ? "zoomX" : "zoomY"] && n && (d = k.zoom(b.min, b.max), k.displayBtn &&
                    (h = !0))
                });
                k = c.resetZoomButton;
                h && !k ? c.showResetZoom() : !h && p(k) && (c.resetZoomButton = k.destroy());
                d && c.redraw(m(c.options.chart.animation, b && b.animation, 100 > c.pointCount))
            }, pan: function (a, b) {
                var c = this, d = c.hoverPoints, e;
                u(this, "pan", {originalEvent: a}, function () {
                    d && d.forEach(function (a) {
                        a.setState()
                    });
                    ("xy" === b ? [1, 0] : [1]).forEach(function (b) {
                        b = c[b ? "xAxis" : "yAxis"][0];
                        var d = b.horiz, h = a[d ? "chartX" : "chartY"], d = d ? "mouseDownX" : "mouseDownY",
                            g = c[d], f = (b.pointRange || 0) / 2,
                            k = b.reversed && !c.inverted || !b.reversed &&
                            c.inverted ? -1 : 1, l = b.getExtremes(), m = b.toValue(g - h, !0) + f * k,
                            k = b.toValue(g + b.len - h, !0) - f * k, n = k < m, g = n ? k : m, m = n ? m : k,
                            k = Math.min(l.dataMin, f ? l.min : b.toValue(b.toPixels(l.min) - b.minPixelPadding)),
                            f = Math.max(l.dataMax, f ? l.max : b.toValue(b.toPixels(l.max) + b.minPixelPadding)),
                            n = k - g;
                        0 < n && (m += n, g = k);
                        n = m - f;
                        0 < n && (m = f, g -= n);
                        b.series.length && g !== l.min && m !== l.max && (b.setExtremes(g, m, !1, !1, {trigger: "pan"}), e = !0);
                        c[d] = h
                    });
                    e && c.redraw(!1);
                    k(c.container, {cursor: "move"})
                })
            }
        });
        t(b.prototype, {
            select: function (a, b) {
                var c = this,
                    d = c.series, e = d.chart;
                a = m(a, !c.selected);
                c.firePointEvent(a ? "select" : "unselect", {accumulate: b}, function () {
                    c.selected = c.options.selected = a;
                    d.options.data[d.data.indexOf(c)] = c.options;
                    c.setState(a && "select");
                    b || e.getSelectedPoints().forEach(function (a) {
                        var b = a.series;
                        a.selected && a !== c && (a.selected = a.options.selected = !1, b.options.data[b.data.indexOf(a)] = a.options, a.setState(e.hoverPoints && b.options.inactiveOtherPoints ? "inactive" : ""), a.firePointEvent("unselect"))
                    })
                })
            }, onMouseOver: function (a) {
                var b = this.series.chart,
                    c = b.pointer;
                a = a ? c.normalize(a) : c.getChartCoordinatesFromPoint(this, b.inverted);
                c.runPointActions(a, this)
            }, onMouseOut: function () {
                var a = this.series.chart;
                this.firePointEvent("mouseOut");
                this.series.options.inactiveOtherPoints || (a.hoverPoints || []).forEach(function (a) {
                    a.setState()
                });
                a.hoverPoints = a.hoverPoint = null
            }, importEvents: function () {
                if (!this.hasImportedEvents) {
                    var b = this, c = d(b.series.options.point, b.options).events;
                    b.events = c;
                    a.objectEach(c, function (a, c) {
                        C(b, c, a)
                    });
                    this.hasImportedEvents = !0
                }
            }, setState: function (a,
                                   b) {
                var c = Math.floor(this.plotX), d = this.plotY, e = this.series, h = this.state,
                    g = e.options.states[a || "normal"] || {}, k = q[e.type].marker && e.options.marker,
                    l = k && !1 === k.enabled, f = k && k.states && k.states[a || "normal"] || {},
                    p = !1 === f.enabled, v = e.stateMarkerGraphic, z = this.marker || {}, w = e.chart,
                    C = e.halo, F, y, G, I = k && e.markerAttribs;
                a = a || "";
                if (!(a === this.state && !b || this.selected && "select" !== a || !1 === g.enabled || a && (p || l && !1 === f.enabled) || a && z.states && z.states[a] && !1 === z.states[a].enabled)) {
                    this.state = a;
                    I && (F = e.markerAttribs(this,
                        a));
                    if (this.graphic) h && this.graphic.removeClass("highcharts-point-" + h), a && this.graphic.addClass("highcharts-point-" + a), w.styledMode || (y = e.pointAttribs(this, a), G = m(w.options.chart.animation, g.animation), e.options.inactiveOtherPoints && ((this.dataLabels || []).forEach(function (a) {
                        a && a.animate({opacity: y.opacity}, G)
                    }), this.connector && this.connector.animate({opacity: y.opacity}, G)), this.graphic.animate(y, G)), F && this.graphic.animate(F, m(w.options.chart.animation, f.animation, k.animation)), v && v.hide(); else {
                        if (a &&
                            f) {
                            h = z.symbol || e.symbol;
                            v && v.currentSymbol !== h && (v = v.destroy());
                            if (v) v[b ? "animate" : "attr"]({
                                x: F.x,
                                y: F.y
                            }); else h && (e.stateMarkerGraphic = v = w.renderer.symbol(h, F.x, F.y, F.width, F.height).add(e.markerGroup), v.currentSymbol = h);
                            !w.styledMode && v && v.attr(e.pointAttribs(this, a))
                        }
                        v && (v[a && w.isInsidePlot(c, d, w.inverted) ? "show" : "hide"](), v.element.point = this)
                    }
                    (a = g.halo) && a.size ? (C || (e.halo = C = w.renderer.path().add((this.graphic || v).parentGroup)), C.show()[b ? "animate" : "attr"]({d: this.haloPath(a.size)}), C.attr({
                        "class": "highcharts-halo highcharts-color-" +
                            m(this.colorIndex, e.colorIndex) + (this.className ? " " + this.className : ""),
                        zIndex: -1
                    }), C.point = this, w.styledMode || C.attr(t({
                        fill: this.color || e.color,
                        "fill-opacity": a.opacity
                    }, a.attributes))) : C && C.point && C.point.haloPath && C.animate({d: C.point.haloPath(0)}, null, C.hide);
                    u(this, "afterSetState")
                }
            }, haloPath: function (a) {
                return this.series.chart.renderer.symbols.circle(Math.floor(this.plotX) - a, this.plotY - a, 2 * a, 2 * a)
            }
        });
        t(g.prototype, {
            onMouseOver: function () {
                var a = this.chart, b = a.hoverSeries;
                if (b && b !== this) b.onMouseOut();
                this.options.events.mouseOver && u(this, "mouseOver");
                this.setState("hover");
                a.hoverSeries = this
            }, onMouseOut: function () {
                var a = this.options, b = this.chart, c = b.tooltip, d = b.hoverPoint;
                b.hoverSeries = null;
                if (d) d.onMouseOut();
                this && a.events.mouseOut && u(this, "mouseOut");
                !c || this.stickyTracking || c.shared && !this.noSharedTooltip || c.hide();
                b.series.forEach(function (a) {
                    a.setState("", !0)
                })
            }, setState: function (a, b) {
                var c = this, d = c.options, e = c.graph, h = d.inactiveOtherPoints, g = d.states,
                    k = d.lineWidth, l = d.opacity, f = m(g[a ||
                    "normal"] && g[a || "normal"].animation, c.chart.options.chart.animation), d = 0;
                a = a || "";
                if (c.state !== a && ([c.group, c.markerGroup, c.dataLabelsGroup].forEach(function (b) {
                    b && (c.state && b.removeClass("highcharts-series-" + c.state), a && b.addClass("highcharts-series-" + a))
                }), c.state = a, !c.chart.styledMode)) {
                    if (g[a] && !1 === g[a].enabled) return;
                    a && (k = g[a].lineWidth || k + (g[a].lineWidthPlus || 0), l = m(g[a].opacity, l));
                    if (e && !e.dashstyle) for (g = {"stroke-width": k}, e.animate(g, f); c["zone-graph-" + d];) c["zone-graph-" + d].attr(g), d +=
                        1;
                    h || [c.group, c.markerGroup, c.dataLabelsGroup, c.labelBySeries].forEach(function (a) {
                        a && a.animate({opacity: l}, f)
                    })
                }
                b && h && c.points && c.points.forEach(function (b) {
                    b.setState && b.setState(a)
                })
            }, setVisible: function (a, b) {
                var c = this, d = c.chart, e = c.legendItem, g, h = d.options.chart.ignoreHiddenSeries,
                    k = c.visible;
                g = (c.visible = a = c.options.visible = c.userOptions.visible = void 0 === a ? !k : a) ? "show" : "hide";
                ["group", "dataLabelsGroup", "markerGroup", "tracker", "tt"].forEach(function (a) {
                    if (c[a]) c[a][g]()
                });
                if (d.hoverSeries ===
                    c || (d.hoverPoint && d.hoverPoint.series) === c) c.onMouseOut();
                e && d.legend.colorizeItem(c, a);
                c.isDirty = !0;
                c.options.stacking && d.series.forEach(function (a) {
                    a.options.stacking && a.visible && (a.isDirty = !0)
                });
                c.linkedSeries.forEach(function (b) {
                    b.setVisible(a, !1)
                });
                h && (d.isDirtyBox = !0);
                u(c, g);
                !1 !== b && d.redraw()
            }, show: function () {
                this.setVisible(!0)
            }, hide: function () {
                this.setVisible(!1)
            }, select: function (a) {
                this.selected = a = this.options.selected = void 0 === a ? !this.selected : a;
                this.checkbox && (this.checkbox.checked = a);
                u(this, a ? "select" : "unselect")
            }, drawTracker: w.drawTrackerGraph
        })
    });
    K(G, "parts/Responsive.js", [G["parts/Globals.js"]], function (a) {
        var C = a.Chart, G = a.isArray, F = a.isObject, k = a.pick, e = a.splat;
        C.prototype.setResponsive = function (e, k) {
            var q = this.options.responsive, t = [], p = this.currentResponsive;
            !k && q && q.rules && q.rules.forEach(function (h) {
                void 0 === h._id && (h._id = a.uniqueKey());
                this.matchResponsiveRule(h, t, e)
            }, this);
            k = a.merge.apply(0, t.map(function (e) {
                return a.find(q.rules, function (a) {
                    return a._id === e
                }).chartOptions
            }));
            k.isResponsiveOptions = !0;
            t = t.toString() || void 0;
            t !== (p && p.ruleIds) && (p && this.update(p.undoOptions, e), t ? (p = this.currentOptions(k), p.isResponsiveOptions = !0, this.currentResponsive = {
                ruleIds: t,
                mergedOptions: k,
                undoOptions: p
            }, this.update(k, e)) : this.currentResponsive = void 0)
        };
        C.prototype.matchResponsiveRule = function (a, e) {
            var q = a.condition;
            (q.callback || function () {
                return this.chartWidth <= k(q.maxWidth, Number.MAX_VALUE) && this.chartHeight <= k(q.maxHeight, Number.MAX_VALUE) && this.chartWidth >= k(q.minWidth, 0) && this.chartHeight >=
                    k(q.minHeight, 0)
            }).call(this) && e.push(a._id)
        };
        C.prototype.currentOptions = function (q) {
            function t(q, p, h, d) {
                var m;
                a.objectEach(q, function (a, g) {
                    if (!d && -1 < ["series", "xAxis", "yAxis"].indexOf(g)) for (a = e(a), h[g] = [], m = 0; m < a.length; m++) p[g][m] && (h[g][m] = {}, t(a[m], p[g][m], h[g][m], d + 1)); else F(a) ? (h[g] = G(a) ? [] : {}, t(a, p[g] || {}, h[g], d + 1)) : h[g] = k(p[g], null)
                })
            }

            var u = {};
            t(q, this.options, u, 0);
            return u
        }
    });
    K(G, "masters/highcharts.src.js", [G["parts/Globals.js"]], function (a) {
        return a
    });
    G["masters/highcharts.src.js"]._modules =
        G;
    return G["masters/highcharts.src.js"]
});
//# sourceMappingURL=highcharts.js.map

/*
    Highcharts JS v7.1.1 (2019-04-09)

    Old IE (v6, v7, v8) module for Highcharts v6+.

    (c) 2010-2019 Highsoft AS
    Author: Torstein Honsi

    License: www.highcharts.com/license
    */
(function (f) {
    "object" === typeof module && module.exports ? (f["default"] = f, module.exports = f) : "function" === typeof define && define.amd ? define("highcharts/modules/oldie", ["highcharts"], function (k) {
        f(k);
        f.Highcharts = k;
        return f
    }) : f("undefined" !== typeof Highcharts ? Highcharts : void 0)
})(function (f) {
    function k(d, f, h, w) {
        d.hasOwnProperty(f) || (d[f] = w.apply(null, h))
    }

    f = f ? f._modules : {};
    k(f, "modules/oldie.src.js", [f["parts/Globals.js"]], function (d) {
        var f, h;
        h = d.Chart;
        var w = d.createElement, k = d.css, E = d.defined, p = d.deg2rad,
            F = d.discardElement, g = d.doc, G = d.erase, y = d.extend;
        f = d.extendClass;
        var K = d.isArray, H = d.isNumber, z = d.isObject, L = d.merge, I = d.noop, A = d.pick, q = d.pInt,
            C = d.svg, x = d.SVGElement, u = d.SVGRenderer, v = d.win;
        d.getOptions().global.VMLRadialGradientURL = "http://code.highcharts.com/7.1.1/gfx/vml-radial-gradient.png";
        g && !g.defaultView && (d.getStyle = function (a, b) {
            var c = {width: "clientWidth", height: "clientHeight"}[b];
            if (a.style[b]) return d.pInt(a.style[b]);
            "opacity" === b && (b = "filter");
            if (c) return a.style.zoom = 1, Math.max(a[c] -
                2 * d.getStyle(a, "padding"), 0);
            a = a.currentStyle[b.replace(/\-(\w)/g, function (a, b) {
                return b.toUpperCase()
            })];
            "filter" === b && (a = a.replace(/alpha\(opacity=([0-9]+)\)/, function (a, b) {
                return b / 100
            }));
            return "" === a ? 1 : d.pInt(a)
        });
        C || (d.addEvent(x, "afterInit", function () {
            "text" === this.element.nodeName && this.css({position: "absolute"})
        }), d.Pointer.prototype.normalize = function (a, b) {
            a = a || v.event;
            a.target || (a.target = a.srcElement);
            b || (this.chartPosition = b = d.offset(this.chart.container));
            return d.extend(a, {
                chartX: Math.round(Math.max(a.x,
                    a.clientX - b.left)), chartY: Math.round(a.y)
            })
        }, h.prototype.ieSanitizeSVG = function (a) {
            return a = a.replace(/<IMG /g, "\x3cimage ").replace(/<(\/?)TITLE>/g, "\x3c$1title\x3e").replace(/height=([^" ]+)/g, 'height\x3d"$1"').replace(/width=([^" ]+)/g, 'width\x3d"$1"').replace(/hc-svg-href="([^"]+)">/g, 'xlink:href\x3d"$1"/\x3e').replace(/ id=([^" >]+)/g, ' id\x3d"$1"').replace(/class=([^" >]+)/g, 'class\x3d"$1"').replace(/ transform /g, " ").replace(/:(path|rect)/g, "$1").replace(/style="([^"]+)"/g, function (a) {
                return a.toLowerCase()
            })
        },
            h.prototype.isReadyToRender = function () {
                var a = this;
                return C || v != v.top || "complete" === g.readyState ? !0 : (g.attachEvent("onreadystatechange", function () {
                    g.detachEvent("onreadystatechange", a.firstRender);
                    "complete" === g.readyState && a.firstRender()
                }), !1)
            }, g.createElementNS || (g.createElementNS = function (a, b) {
            return g.createElement(b)
        }), d.addEventListenerPolyfill = function (a, b) {
            function c(a) {
                a.target = a.srcElement || v;
                b.call(e, a)
            }

            var e = this;
            e.attachEvent && (e.hcEventsIE || (e.hcEventsIE = {}), b.hcKey || (b.hcKey = d.uniqueKey()),
                e.hcEventsIE[b.hcKey] = c, e.attachEvent("on" + a, c))
        }, d.removeEventListenerPolyfill = function (a, b) {
            this.detachEvent && (b = this.hcEventsIE[b.hcKey], this.detachEvent("on" + a, b))
        }, h = {
            docMode8: g && 8 === g.documentMode, init: function (a, b) {
                var c = ["\x3c", b, ' filled\x3d"f" stroked\x3d"f"'], e = ["position: ", "absolute", ";"],
                    n = "div" === b;
                ("shape" === b || n) && e.push("left:0;top:0;width:1px;height:1px;");
                e.push("visibility: ", n ? "hidden" : "visible");
                c.push(' style\x3d"', e.join(""), '"/\x3e');
                b && (c = n || "span" === b || "img" === b ? c.join("") :
                    a.prepVML(c), this.element = w(c));
                this.renderer = a
            }, add: function (a) {
                var b = this.renderer, c = this.element, e = b.box, n = a && a.inverted,
                    e = a ? a.element || a : e;
                a && (this.parentGroup = a);
                n && b.invertChild(c, e);
                e.appendChild(c);
                this.added = !0;
                this.alignOnAdd && !this.deferUpdateTransform && this.updateTransform();
                if (this.onAdd) this.onAdd();
                this.className && this.attr("class", this.className);
                return this
            }, updateTransform: x.prototype.htmlUpdateTransform, setSpanRotation: function () {
                var a = this.rotation, b = Math.cos(a * p), c = Math.sin(a *
                    p);
                k(this.element, {filter: a ? ["progid:DXImageTransform.Microsoft.Matrix(M11\x3d", b, ", M12\x3d", -c, ", M21\x3d", c, ", M22\x3d", b, ", sizingMethod\x3d'auto expand')"].join("") : "none"})
            }, getSpanCorrection: function (a, b, c, e, n) {
                var d = e ? Math.cos(e * p) : 1, f = e ? Math.sin(e * p) : 0,
                    r = A(this.elemHeight, this.element.offsetHeight), g;
                this.xCorr = 0 > d && -a;
                this.yCorr = 0 > f && -r;
                g = 0 > d * f;
                this.xCorr += f * b * (g ? 1 - c : c);
                this.yCorr -= d * b * (e ? g ? c : 1 - c : 1);
                n && "left" !== n && (this.xCorr -= a * c * (0 > d ? -1 : 1), e && (this.yCorr -= r * c * (0 > f ? -1 : 1)), k(this.element,
                    {textAlign: n}))
            }, pathToVML: function (a) {
                for (var b = a.length, c = []; b--;) H(a[b]) ? c[b] = Math.round(10 * a[b]) - 5 : "Z" === a[b] ? c[b] = "x" : (c[b] = a[b], !a.isArc || "wa" !== a[b] && "at" !== a[b] || (c[b + 5] === c[b + 7] && (c[b + 7] += a[b + 7] > a[b + 5] ? 1 : -1), c[b + 6] === c[b + 8] && (c[b + 8] += a[b + 8] > a[b + 6] ? 1 : -1)));
                return c.join(" ") || "x"
            }, clip: function (a) {
                var b = this, c;
                a ? (c = a.members, G(c, b), c.push(b), b.destroyClip = function () {
                    G(c, b)
                }, a = a.getCSS(b)) : (b.destroyClip && b.destroyClip(), a = {clip: b.docMode8 ? "inherit" : "rect(auto)"});
                return b.css(a)
            }, css: x.prototype.htmlCss,
            safeRemoveChild: function (a) {
                a.parentNode && F(a)
            }, destroy: function () {
                this.destroyClip && this.destroyClip();
                return x.prototype.destroy.apply(this)
            }, on: function (a, b) {
                this.element["on" + a] = function () {
                    var a = v.event;
                    a.target = a.srcElement;
                    b(a)
                };
                return this
            }, cutOffPath: function (a, b) {
                var c;
                a = a.split(/[ ,]/);
                c = a.length;
                if (9 === c || 11 === c) a[c - 4] = a[c - 2] = q(a[c - 2]) - 10 * b;
                return a.join(" ")
            }, shadow: function (a, b, c) {
                var e = [], d, D = this.element, f = this.renderer, r, g = D.style, l, t = D.path, h, m, k, p;
                t && "string" !== typeof t.value && (t =
                    "x");
                m = t;
                if (a) {
                    k = A(a.width, 3);
                    p = (a.opacity || .15) / k;
                    for (d = 1; 3 >= d; d++) h = 2 * k + 1 - 2 * d, c && (m = this.cutOffPath(t.value, h + .5)), l = ['\x3cshape isShadow\x3d"true" strokeweight\x3d"', h, '" filled\x3d"false" path\x3d"', m, '" coordsize\x3d"10 10" style\x3d"', D.style.cssText, '" /\x3e'], r = w(f.prepVML(l), null, {
                        left: q(g.left) + A(a.offsetX, 1),
                        top: q(g.top) + A(a.offsetY, 1)
                    }), c && (r.cutOff = h + 1), l = ['\x3cstroke color\x3d"', a.color || "#000000", '" opacity\x3d"', p * d, '"/\x3e'], w(f.prepVML(l), null, null, r), b ? b.element.appendChild(r) :
                        D.parentNode.insertBefore(r, D), e.push(r);
                    this.shadows = e
                }
                return this
            }, updateShadows: I, setAttr: function (a, b) {
                this.docMode8 ? this.element[a] = b : this.element.setAttribute(a, b)
            }, getAttr: function (a) {
                return this.docMode8 ? this.element[a] : this.element.getAttribute(a)
            }, classSetter: function (a) {
                (this.added ? this.element : this).className = a
            }, dashstyleSetter: function (a, b, c) {
                (c.getElementsByTagName("stroke")[0] || w(this.renderer.prepVML(["\x3cstroke/\x3e"]), null, null, c))[b] = a || "solid";
                this[b] = a
            }, dSetter: function (a, b,
                                  c) {
                var e = this.shadows;
                a = a || [];
                this.d = a.join && a.join(" ");
                c.path = a = this.pathToVML(a);
                if (e) for (c = e.length; c--;) e[c].path = e[c].cutOff ? this.cutOffPath(a, e[c].cutOff) : a;
                this.setAttr(b, a)
            }, fillSetter: function (a, b, c) {
                var e = c.nodeName;
                "SPAN" === e ? c.style.color = a : "IMG" !== e && (c.filled = "none" !== a, this.setAttr("fillcolor", this.renderer.color(a, c, b, this)))
            }, "fill-opacitySetter": function (a, b, c) {
                w(this.renderer.prepVML(["\x3c", b.split("-")[0], ' opacity\x3d"', a, '"/\x3e']), null, null, c)
            }, opacitySetter: I, rotationSetter: function (a,
                                                           b, c) {
                c = c.style;
                this[b] = c[b] = a;
                c.left = -Math.round(Math.sin(a * p) + 1) + "px";
                c.top = Math.round(Math.cos(a * p)) + "px"
            }, strokeSetter: function (a, b, c) {
                this.setAttr("strokecolor", this.renderer.color(a, c, b, this))
            }, "stroke-widthSetter": function (a, b, c) {
                c.stroked = !!a;
                this[b] = a;
                H(a) && (a += "px");
                this.setAttr("strokeweight", a)
            }, titleSetter: function (a, b) {
                this.setAttr(b, a)
            }, visibilitySetter: function (a, b, c) {
                "inherit" === a && (a = "visible");
                this.shadows && this.shadows.forEach(function (c) {
                    c.style[b] = a
                });
                "DIV" === c.nodeName && (a = "hidden" ===
                a ? "-999em" : 0, this.docMode8 || (c.style[b] = a ? "visible" : "hidden"), b = "top");
                c.style[b] = a
            }, xSetter: function (a, b, c) {
                this[b] = a;
                "x" === b ? b = "left" : "y" === b && (b = "top");
                this.updateClipping ? (this[b] = a, this.updateClipping()) : c.style[b] = a
            }, zIndexSetter: function (a, b, c) {
                c.style[b] = a
            }, fillGetter: function () {
                return this.getAttr("fillcolor") || ""
            }, strokeGetter: function () {
                return this.getAttr("strokecolor") || ""
            }, classGetter: function () {
                return this.getAttr("className") || ""
            }
        }, h["stroke-opacitySetter"] = h["fill-opacitySetter"],
            d.VMLElement = h = f(x, h), h.prototype.ySetter = h.prototype.widthSetter = h.prototype.heightSetter = h.prototype.xSetter, h = {
            Element: h, isIE8: -1 < v.navigator.userAgent.indexOf("MSIE 8.0"), init: function (a, b, c) {
                var e, d;
                this.alignedObjects = [];
                e = this.createElement("div").css({position: "relative"});
                d = e.element;
                a.appendChild(e.element);
                this.isVML = !0;
                this.box = d;
                this.boxWrapper = e;
                this.gradients = {};
                this.cache = {};
                this.cacheKeys = [];
                this.imgCount = 0;
                this.setSize(b, c, !1);
                if (!g.namespaces.hcv) {
                    g.namespaces.add("hcv", "urn:schemas-microsoft-com:vml");
                    try {
                        g.createStyleSheet().cssText = "hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "
                    } catch (D) {
                        g.styleSheets[0].cssText += "hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "
                    }
                }
            }, isHidden: function () {
                return !this.box.offsetWidth
            }, clipRect: function (a, b, c, e) {
                var d = this.createElement(), f = z(a);
                return y(d, {
                    members: [],
                    count: 0,
                    left: (f ? a.x : a) + 1,
                    top: (f ? a.y : b) + 1,
                    width: (f ? a.width : c) - 1,
                    height: (f ? a.height : e) -
                        1,
                    getCSS: function (a) {
                        var b = a.element, c = b.nodeName, e = a.inverted,
                            d = this.top - ("shape" === c ? b.offsetTop : 0), f = this.left, b = f + this.width,
                            n = d + this.height,
                            d = {clip: "rect(" + Math.round(e ? f : d) + "px," + Math.round(e ? n : b) + "px," + Math.round(e ? b : n) + "px," + Math.round(e ? d : f) + "px)"};
                        !e && a.docMode8 && "DIV" === c && y(d, {width: b + "px", height: n + "px"});
                        return d
                    },
                    updateClipping: function () {
                        d.members.forEach(function (a) {
                            a.element && a.css(d.getCSS(a))
                        })
                    }
                })
            }, color: function (a, b, c, e) {
                var f = this, g, h = /^rgba/, r, k, l = "none";
                a && a.linearGradient ?
                    k = "gradient" : a && a.radialGradient && (k = "pattern");
                if (k) {
                    var t, p, m = a.linearGradient || a.radialGradient, q, u, v, x, A, y = "";
                    a = a.stops;
                    var z, C = [], E = function () {
                        r = ['\x3cfill colors\x3d"' + C.join(",") + '" opacity\x3d"', v, '" o:opacity2\x3d"', u, '" type\x3d"', k, '" ', y, 'focus\x3d"100%" method\x3d"any" /\x3e'];
                        w(f.prepVML(r), null, null, b)
                    };
                    q = a[0];
                    z = a[a.length - 1];
                    0 < q[0] && a.unshift([0, q[1]]);
                    1 > z[0] && a.push([1, z[1]]);
                    a.forEach(function (a, b) {
                        h.test(a[1]) ? (g = d.color(a[1]), t = g.get("rgb"), p = g.get("a")) : (t = a[1], p = 1);
                        C.push(100 *
                            a[0] + "% " + t);
                        b ? (v = p, x = t) : (u = p, A = t)
                    });
                    if ("fill" === c) if ("gradient" === k) c = m.x1 || m[0] || 0, a = m.y1 || m[1] || 0, q = m.x2 || m[2] || 0, m = m.y2 || m[3] || 0, y = 'angle\x3d"' + (90 - 180 * Math.atan((m - a) / (q - c)) / Math.PI) + '"', E(); else {
                        var l = m.r, F = 2 * l, G = 2 * l, H = m.cx, I = m.cy, J = b.radialReference, B,
                            l = function () {
                                J && (B = e.getBBox(), H += (J[0] - B.x) / B.width - .5, I += (J[1] - B.y) / B.height - .5, F *= J[2] / B.width, G *= J[2] / B.height);
                                y = 'src\x3d"' + d.getOptions().global.VMLRadialGradientURL + '" size\x3d"' + F + "," + G + '" origin\x3d"0.5,0.5" position\x3d"' + H + "," + I + '" color2\x3d"' +
                                    A + '" ';
                                E()
                            };
                        e.added ? l() : e.onAdd = l;
                        l = x
                    } else l = t
                } else h.test(a) && "IMG" !== b.tagName ? (g = d.color(a), e[c + "-opacitySetter"](g.get("a"), c, b), l = g.get("rgb")) : (l = b.getElementsByTagName(c), l.length && (l[0].opacity = 1, l[0].type = "solid"), l = a);
                return l
            }, prepVML: function (a) {
                var b = this.isIE8;
                a = a.join("");
                b ? (a = a.replace("/\x3e", ' xmlns\x3d"urn:schemas-microsoft-com:vml" /\x3e'), a = -1 === a.indexOf('style\x3d"') ? a.replace("/\x3e", ' style\x3d"display:inline-block;behavior:url(#default#VML);" /\x3e') : a.replace('style\x3d"',
                    'style\x3d"display:inline-block;behavior:url(#default#VML);')) : a = a.replace("\x3c", "\x3chcv:");
                return a
            }, text: u.prototype.html, path: function (a) {
                var b = {coordsize: "10 10"};
                K(a) ? b.d = a : z(a) && y(b, a);
                return this.createElement("shape").attr(b)
            }, circle: function (a, b, c) {
                var e = this.symbol("circle");
                z(a) && (c = a.r, b = a.y, a = a.x);
                e.isCircle = !0;
                e.r = c;
                return e.attr({x: a, y: b})
            }, g: function (a) {
                var b;
                a && (b = {className: "highcharts-" + a, "class": "highcharts-" + a});
                return this.createElement("div").attr(b)
            }, image: function (a, b, c,
                                e, d) {
                var f = this.createElement("img").attr({src: a});
                1 < arguments.length && f.attr({x: b, y: c, width: e, height: d});
                return f
            }, createElement: function (a) {
                return "rect" === a ? this.symbol(a) : u.prototype.createElement.call(this, a)
            }, invertChild: function (a, b) {
                var c = this;
                b = b.style;
                var e = "IMG" === a.tagName && a.style;
                k(a, {
                    flip: "x",
                    left: q(b.width) - (e ? q(e.top) : 1),
                    top: q(b.height) - (e ? q(e.left) : 1),
                    rotation: -90
                });
                [].forEach.call(a.childNodes, function (b) {
                    c.invertChild(b, a)
                })
            }, symbols: {
                arc: function (a, b, c, e, d) {
                    var f = d.start, g = d.end,
                        h = d.r || c || e;
                    c = d.innerR;
                    e = Math.cos(f);
                    var n = Math.sin(f), l = Math.cos(g), k = Math.sin(g);
                    if (0 === g - f) return ["x"];
                    f = ["wa", a - h, b - h, a + h, b + h, a + h * e, b + h * n, a + h * l, b + h * k];
                    d.open && !c && f.push("e", "M", a, b);
                    f.push("at", a - c, b - c, a + c, b + c, a + c * l, b + c * k, a + c * e, b + c * n, "x", "e");
                    f.isArc = !0;
                    return f
                }, circle: function (a, b, c, e, d) {
                    d && E(d.r) && (c = e = 2 * d.r);
                    d && d.isCircle && (a -= c / 2, b -= e / 2);
                    return ["wa", a, b, a + c, b + e, a + c, b + e / 2, a + c, b + e / 2, "e"]
                }, rect: function (a, b, c, d, f) {
                    return u.prototype.symbols[E(f) && f.r ? "callout" : "square"].call(0, a, b, c, d, f)
                }
            }
        },
            d.VMLRenderer = f = function () {
                this.init.apply(this, arguments)
            }, f.prototype = L(u.prototype, h), d.Renderer = f);
        u.prototype.getSpanWidth = function (a, b) {
            var c = a.getBBox(!0).width;
            !C && this.forExport && (c = this.measureSpanWidth(b.firstChild.data, a.styles));
            return c
        };
        u.prototype.measureSpanWidth = function (a, b) {
            var c = g.createElement("span");
            a = g.createTextNode(a);
            c.appendChild(a);
            k(c, b);
            this.box.appendChild(c);
            b = c.offsetWidth;
            F(c);
            return b
        }
    });
    k(f, "masters/modules/oldie.src.js", [], function () {
    })
});
//# sourceMappingURL=oldie.js.map

/*
    Highcharts JS v7.1.1 (2019-04-09)

    Old IE (v6, v7, v8) array polyfills for Highcharts v7+.

    (c) 2010-2019 Highsoft AS
    Author: Torstein Honsi

    License: www.highcharts.com/license
    */
(function (e) {
    "object" === typeof module && module.exports ? (e["default"] = e, module.exports = e) : "function" === typeof define && define.amd ? define("highcharts/modules/oldie-polyfills", ["highcharts"], function (f) {
        e(f);
        e.Highcharts = f;
        return e
    }) : e("undefined" !== typeof Highcharts ? Highcharts : void 0)
})(function (e) {
    function f(c, b, a, d) {
        c.hasOwnProperty(b) || (c[b] = d.apply(null, a))
    }

    e = e ? e._modules : {};
    f(e, "modules/oldie-polyfills.src.js", [], function () {
        Array.prototype.forEach || (Array.prototype.forEach = function (c, b) {
            for (var a =
                0, d = this.length; a < d; a++) if (void 0 !== this[a] && !1 === c.call(b, this[a], a, this)) return a
        });
        Array.prototype.map || (Array.prototype.map = function (c) {
            for (var b = [], a = 0, d = this.length; a < d; a++) b[a] = c.call(this[a], this[a], a, this);
            return b
        });
        Array.prototype.indexOf || (Array.prototype.indexOf = function (c, b) {
            var a = b || 0;
            if (this) for (b = this.length; a < b; a++) if (this[a] === c) return a;
            return -1
        });
        Array.prototype.filter || (Array.prototype.filter = function (c) {
            for (var b = [], a = 0, d = this.length; a < d; a++) c(this[a], a) && b.push(this[a]);
            return b
        });
        Array.prototype.some || (Array.prototype.some = function (c, b) {
            for (var a = 0, d = this.length; a < d; a++) if (!0 === c.call(b, this[a], a, this)) return !0;
            return !1
        });
        Array.prototype.reduce || (Array.prototype.reduce = function (c, b) {
            for (var a = 1 < arguments.length ? 0 : 1, d = 1 < arguments.length ? b : this[0], e = this.length; a < e; ++a) d = c.call(this, d, this[a], a, this);
            return d
        });
        Object.keys || (Object.keys = function (c) {
            var b = [], a = Object.prototype.hasOwnProperty, d;
            for (d in c) a.call(c, d) && b.push(d);
            return b
        })
    });
    f(e, "masters/modules/oldie-polyfills.src.js",
        [], function () {
        })
});
//# sourceMappingURL=oldie-polyfills.js.map

if (typeof JSON !== "object") {
    JSON = {}
}
(function () {
    "use strict";

    function f(e) {
        return e < 10 ? "0" + e : e
    }

    function quote(e) {
        escapable.lastIndex = 0;
        return escapable.test(e) ? '"' + e.replace(escapable, function (e) {
            var t = meta[e];
            return typeof t === "string" ? t : "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
        }) + '"' : '"' + e + '"'
    }

    function str(e, t) {
        var n, r, i, s, o = gap, u, a = t[e];
        if (a && typeof a === "object" && typeof a.toJSON === "function") {
            a = a.toJSON(e)
        }
        if (typeof rep === "function") {
            a = rep.call(t, e, a)
        }
        switch (typeof a) {
            case"string":
                return quote(a);
            case"number":
                return isFinite(a) ? String(a) : "null";
            case"boolean":
            case"null":
                return String(a);
            case"object":
                if (!a) {
                    return "null"
                }
                gap += indent;
                u = [];
                if (Object.prototype.toString.apply(a) === "[object Array]") {
                    s = a.length;
                    for (n = 0; n < s; n += 1) {
                        u[n] = str(n, a) || "null"
                    }
                    i = u.length === 0 ? "[]" : gap ? "[\n" + gap + u.join(",\n" + gap) + "\n" + o + "]" : "[" + u.join(",") + "]";
                    gap = o;
                    return i
                }
                if (rep && typeof rep === "object") {
                    s = rep.length;
                    for (n = 0; n < s; n += 1) {
                        if (typeof rep[n] === "string") {
                            r = rep[n];
                            i = str(r, a);
                            if (i) {
                                u.push(quote(r) + (gap ? ": " : ":") + i)
                            }
                        }
                    }
                } else {
                    for (r in a) {
                        if (Object.prototype.hasOwnProperty.call(a, r)) {
                            i = str(r, a);
                            if (i) {
                                u.push(quote(r) + (gap ? ": " : ":") + i)
                            }
                        }
                    }
                }
                i = u.length === 0 ? "{}" : gap ? "{\n" + gap + u.join(",\n" + gap) + "\n" + o + "}" : "{" + u.join(",") + "}";
                gap = o;
                return i
        }
    }

    if (typeof Date.prototype.toJSON !== "function") {
        Date.prototype.toJSON = function () {
            return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + f(this.getUTCMonth() + 1) + "-" + f(this.getUTCDate()) + "T" + f(this.getUTCHours()) + ":" + f(this.getUTCMinutes()) + ":" + f(this.getUTCSeconds()) + "Z" : null
        };
        String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function () {
            return this.valueOf()
        }
    }
    var cx, escapable, gap, indent, meta, rep;
    if (typeof JSON.stringify !== "function") {
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
        meta = {"\b": "\\b", "	": "\\t", "\n": "\\n", "\f": "\\f", "\r": "\\r", '"': '\\"', "\\": "\\\\"};
        JSON.stringify = function (e, t, n) {
            var r;
            gap = "";
            indent = "";
            if (typeof n === "number") {
                for (r = 0; r < n; r += 1) {
                    indent += " "
                }
            } else if (typeof n === "string") {
                indent = n
            }
            rep = t;
            if (t && typeof t !== "function" && (typeof t !== "object" || typeof t.length !== "number")) {
                throw new Error("JSON.stringify")
            }
            return str("", {"": e})
        }
    }
    if (typeof JSON.parse !== "function") {
        cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
        JSON.parse = function (text, reviver) {
            function walk(e, t) {
                var n, r, i = e[t];
                if (i && typeof i === "object") {
                    for (n in i) {
                        if (Object.prototype.hasOwnProperty.call(i, n)) {
                            r = walk(i, n);
                            if (r !== undefined) {
                                i[n] = r
                            } else {
                                delete i[n]
                            }
                        }
                    }
                }
                return reviver.call(e, t, i)
            }

            var j;
            text = String(text);
            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function (e) {
                    return "\\u" + ("0000" + e.charCodeAt(0).toString(16)).slice(-4)
                })
            }
            if (/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) {
                j = eval("(" + text + ")");
                return typeof reviver === "function" ? walk({"": j}, "") : j
            }
            throw new SyntaxError("JSON.parse")
        }
    }
})();

function drawColumnChart(container, categories, series, options) {
    //костыль к показу
    var borderRadius = 8;
    if (series.length > 1) {
        borderRadius = 5;
    }
    //конец костыля к показу

    if (!options.numbersAfterComma && options.numbersAfterComma !== 0) {
        options.numbersAfterComma = 0;
    }
    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);

    Highcharts.chart({
        chart: {
            marginTop: 10,
            renderTo: container,
            type: 'column'
        },
        title: {
            text: ''
        },
        tooltip: {
            formatter: function () {
                var res = Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                    options.numbersAfterComma, '.', ' ');

                return series.length > 1 ? '<b>' + res + '</b>' : '<span style="color:' +
                    this.point.color + '">\u25CF</span> ' + this.series.name + ': <b>' + res + '</b><br/>';
            }
        },
        legend: {
            enabled: options.useLegendChart,
            align: 'right',
            verticalAlign: 'top',
            floating: false,
            labelFormatter: function () {
                return this.name.toUpperCase();
            },
            symbolRadius: 0,
            itemStyle: {
                fontWeight: 'normal',
                fontSize: '10px'
            },
            backgroundColor: '#FFFFFF'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            maxPadding: 0.1,
            minRange: 0.1,
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return Highcharts.numberFormat(this.value, 0, '.', ' ');
                }
            },
            gridLineDashStyle: "shortdash"
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0,
                columnWidth: 8,
                borderRadius: borderRadius,
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                            options.numbersAfterComma, '.', ' ');
                    }
                }
            }
        },
        series: series
    });
}

function drawColumnChartHorizont(container, categories, series, options) {
    //костыль к показу
    var borderRadius = 8;
    if (categories.length > 6) {
        borderRadius = 5;
    }
    //конец костыля к показу

    if (!options.numbersAfterComma && options.numbersAfterComma !== 0) {
        options.numbersAfterComma = 0;
    }
    calcVisibleY(series, options.acceptableDif ? options.acceptableDif : 1);

    var title = options.title ? options.title : '';
    Highcharts.chart({
        chart: {
            marginTop: options.title ? 40 : 10,
            renderTo: container,
            type: 'bar'
        },
        title: {
            text: title,
            align: 'left',
            style: {"font-size": "14px", "font-weight": "bold"}
        },
        tooltip: {
            formatter: function () {
                var res = Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                    options.numbersAfterComma, '.', ' ');

                return '<span style="color:' + this.point.color +
                    '">\u25CF</span> ' + this.series.name + ': <b>' + res + '</b><br/>';
            }
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: categories,
            title: {
                text: null
            },
            gridLineColor: "#e6e6e6",
            gridLineDashStyle: "Solid",
            gridLineWidth: 1,
            gridZIndex: 1,
            lineWidth: 0,
            labels: {
                align: "left",
                reserveSpace: true,
                style: {
                    fontSize: '14px'
                }
            }
        },
        yAxis: {
            min: 0,
            minRange: 0.0001, // если убрать данный фикс, то при всех нулевых значениях в графике нули будут в центре блока, а не слева
            maxPadding: 0.1,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                enabled: false
            },
            lineWidth: 0,
            gridLineWidth: 0
        },
        plotOptions: {
            bar: {
                borderRadius: borderRadius,
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return Highcharts.numberFormat(customRound(this.point.options.realY ? this.point.options.realY : this.y, options.numbersAfterComma),
                            options.numbersAfterComma, '.', ' ');
                    }
                }
            },
            series: {
                colorByPoint: options.colors ? options.colors : false,
                colors: options.colors ? options.colors : undefined
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: series
    });
}// LEGACY
function drawColumnChartVert(containerId, categories, series) {
    return Highcharts.chart({
        chart: {
            renderTo: containerId,
            type: 'column'
        },
        title: {
            text: ''
        },
        legend: {
            // layout: series[0].name.length > 10 ? 'vertical':'horizontal',
            align: 'right',
            verticalAlign: 'top',
            floating: true,
            backgroundColor: '#FFFFFF',
            labelFormatter: function () {
                return this.name.toUpperCase();
            }
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            },
            labels: {
                formatter: function () {
                    return Highcharts.numberFormat(this.value, 0, '.', ' ');
                }
            },
            gridLineDashStyle: "shortdash"
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0,
                columnWidth: 8,
                borderRadius: 8,
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: series //todo  возможно нужно в динамике заполнять
    });
}

function getLinearGradient(colors, isHorizontal, brightness) {
    isHorizontal = isHorizontal && navigator.userAgent.toString().indexOf('Mozilla/4.0') >= 0;

    if (colors) {
        if (colors.length > 1) {
            var stops = [];
            var sectorLength = customRound(1 / (colors.length - 1), 2);

            for (var i = 0, currentSectorLength = 0; i < colors.length - 1; ++i, currentSectorLength += sectorLength) {
                stops.push([currentSectorLength, colors[i]]);
            }
            stops.push([1, colors[colors.length - 1]]);

            return {
                linearGradient: isHorizontal ? {x1: 0, x2: 1, y1: 0.5, y2: 0.5} : {
                    x1: 0.5,
                    x2: 0.5,
                    y1: 1,
                    y2: 0
                },
                stops: stops
            };
        } else if (colors.length === 1) {
            var selectedBrightness = brightness ? brightness : -0.15;

            return {
                linearGradient: isHorizontal ? {x1: 0, x2: 1, y1: 0.5, y2: 0.5} : {
                    x1: 0.5,
                    x2: 0.5,
                    y1: 1,
                    y2: 0
                },
                stops: [
                    [0, Highcharts.Color(colors[0]).brighten(selectedBrightness).get('rgb')],
                    [0.5, colors[0]],
                    [1, Highcharts.Color(colors[0]).brighten(selectedBrightness).get('rgb')]
                ]
            };
        }
    }
    return undefined;
}

function getSimpleGradient(isHorizontal, colors) {
    var firstColor = colors && colors[0] ? colors[0] : '#FCB255';
    var secondColor = colors && colors[1] ? colors[1] : '#FF7132';

    if ((isHorizontal) && (navigator.userAgent.toString().indexOf('Mozilla/4.0') >= 0)) {
        return {
            linearGradient: {x1: 0, x2: 1, y1: 0, y2: 0},
            stops: [
                [0, firstColor],
                [1, secondColor]
            ]
        };
    } else {
        return {
            linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
            stops: [
                [0, secondColor],
                [1, firstColor]
            ]
        };
    }
}

function getPrimaryColor() {
    return '#1A78E2';
}

function getSecondaryColor() {
    return '#40B3EE';
}

function getYellowColor() {
    return '#1A78E2';
}

function getTurquoiseColor() {
    return '#BEE9FF';
}

function getOrangeColor() {
    return '#1A78E2';
}

function getPrimaryGradient(isHorizontal) {
    return getLinearGradient(['#40B3EE', '#1A78E2'], isHorizontal);
}

function getSecondaryGradient(isHorizontal) {
    return getLinearGradient(['#BEE9FF', '#40B3EE'], isHorizontal);
}

function addGradientColumn(dataSet, isHorizontal) {
    for (var i = 0; i < dataSet.length; i++) {
        if (dataSet[i].series) {
            if (dataSet[i].series[0]) {
                dataSet[i].series[0].color = getPrimaryGradient(isHorizontal);
            }
            if (dataSet[i].series[1]) {
                dataSet[i].series[1].color = getSecondaryGradient(isHorizontal);
            }
        }
    }
    return dataSet;
}

function addGradientToBar(data) {
    return [
        {
            y: data[0],
            color: getPrimaryGradient(true)
        },
        {
            y: data[1],
            color: getSecondaryGradient(true)
        }
    ];
}

function addGradientToBarArray(data) {
    var arr = [];

    for (var i = 0; i < data.length; ++i) {
        arr.push({y: data[i], color: getPrimaryGradient(true)});
    }
    return arr;
}

function addGradientColumnSection(dataSet) {
    for (var i = 0; i < dataSet.length; ++i) {
        if (dataSet[i].sections) {
            for (var j = 0; j < dataSet[i].sections.length; ++j) {
                if (dataSet[i].sections[j].data) {
                    dataSet[i].sections[j].data = addGradientToBarArray(dataSet[i].sections[j].data);
                }
            }
        }
    }
    return dataSet;
}

function addLinearGradientToSeries(series, isHorizontal) {
    for (var j = 0; j < series.length; ++j) {
        var serie = series[j];

        if (isHorizontal) {
            for (var i = 0; i < serie.data.length; ++i) {
                if (serie.data[i].color) {
                    serie.data[i].color = getLinearGradient(serie.data[i].color, true);
                } else {
                    serie.data[i].color = i === 0 ? getSecondaryGradient(true) : getPrimaryGradient(true);
                }
            }
        } else {
            if (serie.color) {
                serie.color = getLinearGradient(serie.color);
            } else {
                serie.color = i === 0 ? getPrimaryGradient(false) : getSecondaryGradient(false);
            }
        }
    }
}

function addLinearGradientToData(data, isHorizontal) {
    var total = 0;

    for (var i = 0; i < data.length; ++i) {
        if (data[i].color) {
            data[i].color = getLinearGradient(data[i].color, isHorizontal);
        }
        total += data[i].y;
    }
    return total;
}

function renderChart(options, indexies) {
    //если параметры не определены, то по умолчанию
    if (typeof indexies === "undefined") indexies = [0, 0];

    var dataSetIndex = parseInt(indexies[0]);
    var dataSetIndex2 = parseInt(indexies[1]);

    var parent = $("#chart_" + options.id)[0];
    parent.innerHTML = '';

    var sectionIndex = indexies.length > 1 ? indexies[1] : 0;

    if (options.dataSets) {
        for (var i = 0; i < options.dataSets.length; i++) {
            if ((options.dataSets[i].series || options.dataSets[i].dataList) && options.tabType !== "combobox_double"
                && options.tabType !== "combobox") {
                dataSetIndex = i;
            }
            if (options.dataSets[i].sections && options.tabType !== "combobox_double"
                && options.tabType !== "combobox") {
                dataSetIndex = i;
                for (var j = 0; j < options.dataSets[i].sections.length; j++) {
                    if (options.dataSets[i].sections[j].data) {
                        sectionIndex = j;
                    }
                }
            }
        }
    }
    var isMaximized = addMaximizeButtonEvent(parent, options, indexies);

    if (options.tabSection) {
        renderTabSection(parent, options);

        var newDiv = document.createElement("div");
        newDiv.className = "highcharts-container";

        var height = ($(parent).height() - $($("#tabPanel_" + options.id)[0]).height() - 8);
        if (height < 100) { // костыль для IE5
            height = 650;
        }
        $(newDiv).css("height", height + 'px');

        parent.appendChild(newDiv);
        parent = newDiv;
    } else if (options.dataSets && (options.dataSets.length > 1 || options.dataSets[0].sections || options.showLegend)) {
        // LEGACY: Добавление панели для старых столов
        addDataSetsSwitcher(parent, options, dataSetIndex, dataSetIndex2, sectionIndex, options.showLegend);

        var newDiv = document.createElement("div");
        newDiv.className = "highcharts-container";

        var height = ($(parent).height() - $($("#switcher_" + options.id)[0]).height() - 8);
        if (height < 100) { // костыль для IE5
            height = 650;
        }
        $(newDiv).css("height", height + 'px');

        parent.appendChild(newDiv);
        parent = newDiv;
    }

    if (options.sidebarContent) {
        parent = renderSidebar(parent, options.sidebarContent);
    }
	
    if (options.type === "columnChart") {
        if (options.tabType === "combobox_double") {
            drawColumnChart(
                parent,
                options.dataSets[dataSetIndex].categories,
                getSeries(options.dataSets, dataSetIndex * 5 + dataSetIndex2, sectionIndex),
                options
            );
        } else {
            drawColumnChart(
                parent,
                options.dataSets[dataSetIndex].categories,
                getSeries(options.dataSets, dataSetIndex, sectionIndex),
                options
            );
        }
    }
    if (options.type === "barChart") {
        drawColumnChartHorizont(
            parent,
            options.dataSets[dataSetIndex].categories,
            getSeries(options.dataSets, dataSetIndex, sectionIndex),
            options
        );
    }
    if (options.type === "pieChart") {
        options.dataSets[0].isMaximized = isMaximized;
        options.dataSets[0].id = options.id;

        drawPieChart(parent, options.dataSets[0]);
    }
    if (options.type === "lineChart") {
        drawLineChart(parent, getLineData(options));
    }
    if (options.type === "calendar") {
        drawCalendar(parent, options.dataSets[0].data, options, isMaximized);
    }
    if (options.type === "pieChartCustomLegend") {
        options.dataSets[0].isMaximized = isMaximized;

        var newDivPie = document.createElement("div");
        newDivPie.className = "list-chart";
        var newDivLegend = document.createElement("div");
        newDivLegend.className = "list-chart legend-container";

        parent.appendChild(newDivLegend);
        parent.appendChild(newDivPie);

        options.dataSets[0].id = options.id;

        drawLegend(newDivLegend, options.dataSets[0], options.id);
        drawPieChart(newDivPie, options.dataSets[0]);
    }
    if (options.type === "customBarChart") {
        drawCustomBarChart(parent, options, dataSetIndex);
    }
    if (options.type === "customHierarchyBarChart") {
        parent.parentElement.style.height = 'auto';

        createCustomBarChart(parent, options);
    }
    if (options.type === "linksList") {
        drawLinksList(parent, options);
    }
}

function customRound(number, numbersAfterComma) {
    var multiplier = 1;

    for (var i = 0; i < numbersAfterComma; ++i) {
        multiplier *= 10;
    }
    return Math.round(number * multiplier) / multiplier;
}

function labelFormatter(name, container, proportion) {
    if (!proportion) {
        return name;
    }
    var words = name.split(/[\s]+/);
    var str = [];
    var limit = Math.floor(container.offsetWidth * proportion / 10);

    for (var i = 0, symAcc = 0, firstWordInRow = true; i < words.length; ++i) {
        symAcc += words[i].length;

        if (symAcc > limit) {
            if (!firstWordInRow) {
                str.push('<br>');
                symAcc = words[i].length;
            }
        }
        firstWordInRow = false;
        str.push(words[i]);
        ++symAcc;
    }
    return str.join(' ');
}

function labelLinesCounter(name, container, proportion) {
    if (!proportion) {
        return 1;
    }
    var words = name.split(/[\s]+/);
    var linesCounter = 1;
    var limit = Math.floor(container.offsetWidth * proportion / 10);

    for (var i = 0, symAcc = 0, firstWordInRow = true; i < words.length; ++i) {
        symAcc += words[i].length;

        if (symAcc > limit) {
            if (!firstWordInRow) {
                ++linesCounter;
                symAcc = words[i].length;
            }
        }
        firstWordInRow = false;
        ++symAcc;
    }
    return linesCounter;
}

function addMaximizeButtonEvent(parent, options, indexies) {
    var resizeButtonRef = $(parent).parents('.big-data-block').find('.resize-btn');
    var isMaximized = resizeButtonRef.parents('.big-data-block').hasClass('resize-target-max');

    resizeButtonRef.off().on('click', function (e) {
        var $resizeButton = $(e.target);
        var $targetTd = $resizeButton.parents('.big-data-block');
        var height = $resizeButton.attr('data-height');
        var $tr = $targetTd.parent();
        var hasClassResize = $targetTd.hasClass('resize-target-max');

        if (hasClassResize) {
            $targetTd.removeClass('resize-target-max');

            $targetTd.find('.big-data-block__container').css('height', height);

            if ($tr.children().size() > 1) {
                $targetTd.attr('colspan', options.colSpan ? options.colSpan : '1');
            }            // show td
            $tr.children().each(function (i, td) {
                if ($(td)[0] !== $targetTd[0]) $(td).css('display', '');
            });

        } else {
            $targetTd.addClass('resize-target-max');

            // hide td
            $tr.children().each(function (i, td) {
                if ($(td)[0] !== $targetTd[0]) $(td).css('display', 'none');
            });

            if ($tr.children().size() > 1) {
                $targetTd.attr('colspan', options.maxColSpan ? options.maxColSpan : $tr.children().size());
            }
            $targetTd.find('.big-data-block__container').css('height', '600px');
        }
        if (options.onMaximization) {
            options.onMaximization($targetTd);
        }
        renderChart(options, indexies);
    });

    return isMaximized;
}

function getSeries(dataSets, dataSetIndex, sectionIndex, inDataSetIndex) {
    var dataSet = inDataSetIndex !== undefined && inDataSetIndex !== null ? dataSets[dataSetIndex][inDataSetIndex] : dataSets[dataSetIndex];

    if (dataSet.type) {
        return dataSet.sections[sectionIndex].data;
    }
    if (!dataSet.sections) {
        return dataSet.series;
    } else {
        var section = dataSet.sections[sectionIndex];
        return [{
            name: section.name,
            color: section.color,
            data: section.data
        }];
    }
}

function getLegendTableHorizontal(series) {
    var table = document.createElement("table");
    table.className = "big-data-block__data-set-switcher_table";
    var tbody = document.createElement("tbody");
    var tr = document.createElement("tr");

    for (var i = 0; i < series.length; ++i) {
        var td1 = document.createElement("td");
        var div1 = document.createElement("div");
        td1.className = "legend-icon";
        div1.className = "div_legend";

        if (series[i].color.stops) {
            div1.style.backgroundColor = series[i].color.stops[0][1];
        } else {
            div1.style.backgroundColor = series[i].color;
        }
        var td2 = document.createElement("td");
        var span1 = document.createElement("span");
        if (i < series.length - 1) {
            td2.className = "legend-text";
        }
        span1.className = "span_legend";
        span1.innerText = series[i].name;

        td1.appendChild(div1);
        td2.appendChild(span1);

        tr.appendChild(td1);
        tr.appendChild(td2);
    }
    tbody.appendChild(tr);
    table.appendChild(tbody);

    return table;
}

function getLegendTableVertical(array, itemHeight, itemMargin) {
    var items = document.createElement("div");

    for (var i = 0; i < array.length; i++) {
        var item = document.createElement("div");
        item.style.padding = itemMargin ? itemMargin / 2 + "px 0" : "0";

        var icon = document.createElement("div");
        icon.className = "legend_item-td-first";
        icon.style.height = itemHeight + 'px';
        var div1 = document.createElement("div");
        div1.className = "div_legend";
        if (array[i].color) {
            if (array[i].color.stops) {
                div1.style.backgroundColor = array[i].color.stops[0][1];
            } else {
                div1.style.backgroundColor = array[i].color[0];
            }
        } else {
            div1.style.backgroundColor = array[i].colors[0];
            // linear-gradient(to right, #F6EFD2, #CEAD78)
            /* div1.style.background = 'linear-gradient(to right, '+
                array[i].color[1]+', '+array[i].color[0]+')';*/
        }
        var label = document.createElement("div");
        label.className = "legend_item-td-second";
        label.style.height = itemHeight + 'px';
        var span1 = document.createElement("span");
        span1.className = "legend_item-span";
        span1.id = 'legendItem_' + array[i].id;
        span1.innerText = array[i].name;

        icon.appendChild(div1);
        label.appendChild(span1);

        item.appendChild(icon);
        item.appendChild(label);

        items.appendChild(item);
    }
    return items;
}

function bindLegendClick(id) {
    $('.legend_item-span').off().on("click", function () {
        var span = $(this)[0];
        buttonFireEvent('Event', 'chartButton_' + id + '_' +
            parseInt(this.id.substr(span.id.length - 1, 1)));
    });
}

function calcVisibleY(series, acceptableDif) {
    var maxLength = -1;

    for (var i = 0; i < series.length; ++i) {
        for (var j = 0; j < series[i].data.length; ++j) {
            var currentValue = series[i].data[j].y ? series[i].data[j].y : series[i].data[j];

            if (currentValue > maxLength) {
                maxLength = currentValue;
            }
        }
    }
    maxLength = String(maxLength).split('.')[0].length;
    var minY = 1;

    for (var mulCounter = 1; mulCounter < maxLength - acceptableDif; ++mulCounter) {
        minY *= 10;
    }
    for (var i = 0; i < series.length; ++i) {
        for (var j = 0; j < series[i].data.length; ++j) {
            var currentValue = series[i].data[j].y ? series[i].data[j].y : series[i].data[j];

            if (currentValue > 0 && currentValue < minY) {
                if (series[i].data[j].y) {
                    series[i].data[j].realY = currentValue;
                    series[i].data[j].y = minY;
                } else {
                    series[i].data[j] = {y: minY, realY: currentValue};
                }
            }
        }
    }
}

function calcVisibleYInHierarchy(items, acceptableDif, max) {
    max = String(max).split('.')[0].length;
    var minY = 1;

    for (var mulCounter = 1; mulCounter < max - acceptableDif; ++mulCounter) {
        minY *= 10;
    }
    _calcVisibleYInHierarchyRec(items, max, minY);
}

function _calcVisibleYInHierarchyRec(items, max, minY) {
    for (var i = 0; i < items.length; ++i) {
        var currentValue = items[i].data.y;

        if (currentValue > 0 && currentValue < minY) {
            items[i].data.realY = currentValue;
            items[i].data.y = minY;
        }
        if (items[i].children && items[i].children.length > 0) {
            _calcVisibleYInHierarchyRec(items[i].children, max, minY);
        }
    }
}

function drawLegend(container, dataSet, id) {
    var dif = 0;
    var itemHeight = 22;

    if (!dataSet.itemMargin && dataSet.autoItemMargin) {
        var linesCounter = 0;

        for (var i = 0; i < dataSet.legend.length; ++i) {
            linesCounter += labelLinesCounter(dataSet.legend[i].name, container, 0.5);
        }
        dataSet.itemMargin = container.offsetHeight - linesCounter * itemHeight;

        if (dataSet.itemMargin > 0) {
            dataSet.itemMargin /= dataSet.legend.length + 1;

            if (dataSet.itemMargin > 40) {
                dataSet.itemMargin = 40;
            }
        } else {
            dataSet.itemMargin = 0;
        }
    }
    if (dataSet.itemMargin) {
        dif = container.offsetHeight - dataSet.legend.length * (itemHeight + dataSet.itemMargin);
        container.style.paddingTop = (dif > 0 ? dif / 2 : 0) + 'px';
    }
    var t = getLegendTableVertical(dataSet.legend, itemHeight, dataSet.itemMargin);
    container.appendChild(t);

    var itemIndex = document.getElementById('legendItem_' + dataSet.legendItemIndex);
    itemIndex.className += " legend_item-select";

    bindLegendClick(id);
}

function parseDataFromString(data) {
    if (typeof data === 'string' || data instanceof String)
        data = jQuery.parseJSON(data);

    return data;
}

function parseCategoriesFromString(categories) {
    if (typeof categories === 'string' || categories instanceof String)
        categories = categories.split(",");

    return categories;
}

function highchartsSetDEfaultOptions() {
    Highcharts.setOptions({
        lang: {
            numericSymbols: null,
            decimalPoint: ','
        }
    });
}

function attachButtonsEventPerformers() {
    highchartsSetDEfaultOptions();

    $(".big-data-block__data-list__show-more-button").off().on('click', function (e) {
        var $el = $(e.target);
        var id = getParentIdByClassName_V2($el, 'big-data-block__data-list__show-more-button');
        buttonFireEvent('buttonId', id);
    });

    $(".small-data-block").off().on('click', function (e) {
        var $el = $(e.target);
        var id = getParentIdByClassName($el, 'small-data-block');
        buttonFireEvent('buttonId', id);
    });

    $("#button_envelope").off().on('click', function () {
        buttonFireEvent('buttonId', 'button_envelope');
    });

    $("#button_bubble").off().on('click', function () {
        buttonFireEvent('buttonId', 'button_bubble');
    });

    $("#btn_search").off().on('click', function () {
        var text = $("#input_search").val();
        if ((text !== '') && (text !== 'Искать на рабочем столе')) {
            buttonFireEvent('searchEvent', text);
        }
    });

    $('#input_search').off().on('click', function (e) {
        try {
            var el = $('#input_search'); //$(e.target);
            var text = el.attr('placeholder');
            var inputValue = el.val();
            if (text === inputValue) {
                el.val('');
            }
        } catch (err) {
            $('#input_search').val('');
            $('#input_search').css('color', 'black');
        }
    }).on('change', function (e) {
        try {
            var el = $('#input_search'); //$(e.target);
            var text = el.attr('placeholder');
            var inputValue = el.val();
            if (inputValue === '') {
                el.val(text);
                el.css('color', 'grey');
            }
        } catch (err) {
            $('#input_search').val(text);
            $('#input_search').css('color', 'grey');
        }
    });

    // $(".section__header__button").off().on('click',function (e) {
    //     var $el = $(e.target);
    //     var id = getParentIdByClassName($el, 'section__header__button');
    //     buttonFireEvent('buttonId', id);
    // });

    $(".fs-header-menu__calc-btn").off().on('click', function (e) {
        calcFoodSecurity();
    });

    // События календаря fairs2 находятся в drawCalendar, так как это необходимо для работы datepicker-а jQuery

    // Хот фикс для ie 5 #223267 (пустые большие блоки не отображаются в ie 5)
    $('.section__big-blocks-table').css('width', '100%');
}

function calcFoodSecurity() {
    var data = {
        period: dateRangeSelectorModel,
        filters: getSelectedIdsFromCustomSelect()
    };

    buttonFireEvent('filterData', JSON.stringify(data));
}

function getParentIdByClassName(el, parentClassName) {
    var className = el.attr('class');

    if (!className) {
        className = '';
    }
    while (className !== parentClassName) {
        el = el.parent();
        className = el.attr('class');
    }

    return el.attr('id');
}

function getParentIdByClassName_V2(el, parentClassName) {
    var className = el.attr('class');

    if (!className) {
        className = '';
    }
    while (className.indexOf(parentClassName) < 0) {
        el = el.parent();
        className = el.attr('class');
    }
    return el.attr('id');
}

function buttonFireEvent(propertyName, data) {
    if (document.createEventObject) {
        //для нормальных браузеров
        var evt = document.createEventObject();
        evt.propertyName = propertyName;
        evt.data = data;
        evt.cancelBubble = true;
        evt.returnValue = false;
        document.fireEvent('onclick', evt);
    } else {
        //конечно же для IE
        var evt = document.createEvent("MouseEvent");
        evt.initMouseEvent("click", false, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        evt.propertyName = propertyName;
        evt.data = data;
        document.body.dispatchEvent(evt);
    }
}// Option extensions
function extendPieOptions(options, params) {
    options.dataSets[0].title = params.pieTitle;
}

function extendOptions(options, params) {
    if (params.fullWidth && options.removalId && options.fullWidthId) {
        var $block = $('#infoBlock' + options.removalId);

        $block.parent().find('.section__big-blocks-table__gap').remove();
        $block.remove();

        $('#infoBlock' + options.fullWidthId).attr('colSpan', '3');
    }
}// used in API.
function setActualDate(date) {
    $('#date-actual').html(date);
}


//# sourceMappingURL=highcharts.js.map

/*
    Highcharts JS v7.1.1 (2019-04-09)

    Old IE (v6, v7, v8) module for Highcharts v6+.

    (c) 2010-2019 Highsoft AS
    Author: Torstein Honsi

    License: www.highcharts.com/license
    */
if (!document.getElementsByClassName) {
    document.getElementsByClassName = function(search) {
        var d = document, elements, pattern, i, results = [];
        if (d.querySelectorAll) { // IE8
            return d.querySelectorAll("." + search);
        }
        if (d.evaluate) { // IE6, IE7
            pattern = ".//*[contains(concat(' ', @class, ' '), ' " + search + " ')]";
            elements = d.evaluate(pattern, d, null, 0, null);
            while ((i = elements.iterateNext())) {
                results.push(i);
            }
        } else {
            elements = d.getElementsByTagName("*");
            pattern = new RegExp("(^|\\s)" + search + "(\\s|$)");
            for (i = 0; i < elements.length; i++) {
                if ( pattern.test(elements[i].className) ) {
                    results.push(elements[i]);
                }
            }
        }
        return results;
    }
}

(function(f){"object"===typeof module&&module.exports?(f["default"]=f,module.exports=f):"function"===typeof define&&define.amd?define("highcharts/modules/oldie",["highcharts"],function(k){f(k);f.Highcharts=k;return f}):f("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(f){function k(d,f,h,w){d.hasOwnProperty(f)||(d[f]=w.apply(null,h))}f=f?f._modules:{};k(f,"modules/oldie.src.js",[f["parts/Globals.js"]],function(d){var f,h;h=d.Chart;var w=d.createElement,k=d.css,E=d.defined,p=d.deg2rad,
    F=d.discardElement,g=d.doc,G=d.erase,y=d.extend;f=d.extendClass;var K=d.isArray,H=d.isNumber,z=d.isObject,L=d.merge,I=d.noop,A=d.pick,q=d.pInt,C=d.svg,x=d.SVGElement,u=d.SVGRenderer,v=d.win;d.getOptions().global.VMLRadialGradientURL="http://code.highcharts.com/7.1.1/gfx/vml-radial-gradient.png";g&&!g.defaultView&&(d.getStyle=function(a,b){var c={width:"clientWidth",height:"clientHeight"}[b];if(a.style[b])return d.pInt(a.style[b]);"opacity"===b&&(b="filter");if(c)return a.style.zoom=1,Math.max(a[c]-
    2*d.getStyle(a,"padding"),0);a=a.currentStyle[b.replace(/\-(\w)/g,function(a,b){return b.toUpperCase()})];"filter"===b&&(a=a.replace(/alpha\(opacity=([0-9]+)\)/,function(a,b){return b/100}));return""===a?1:d.pInt(a)});C||(d.addEvent(x,"afterInit",function(){"text"===this.element.nodeName&&this.css({position:"absolute"})}),d.Pointer.prototype.normalize=function(a,b){a=a||v.event;a.target||(a.target=a.srcElement);b||(this.chartPosition=b=d.offset(this.chart.container));return d.extend(a,{chartX:Math.round(Math.max(a.x,
        a.clientX-b.left)),chartY:Math.round(a.y)})},h.prototype.ieSanitizeSVG=function(a){return a=a.replace(/<IMG /g,"\x3cimage ").replace(/<(\/?)TITLE>/g,"\x3c$1title\x3e").replace(/height=([^" ]+)/g,'height\x3d"$1"').replace(/width=([^" ]+)/g,'width\x3d"$1"').replace(/hc-svg-href="([^"]+)">/g,'xlink:href\x3d"$1"/\x3e').replace(/ id=([^" >]+)/g,' id\x3d"$1"').replace(/class=([^" >]+)/g,'class\x3d"$1"').replace(/ transform /g," ").replace(/:(path|rect)/g,"$1").replace(/style="([^"]+)"/g,function(a){return a.toLowerCase()})},
    h.prototype.isReadyToRender=function(){var a=this;return C||v!=v.top||"complete"===g.readyState?!0:(g.attachEvent("onreadystatechange",function(){g.detachEvent("onreadystatechange",a.firstRender);"complete"===g.readyState&&a.firstRender()}),!1)},g.createElementNS||(g.createElementNS=function(a,b){return g.createElement(b)}),d.addEventListenerPolyfill=function(a,b){function c(a){a.target=a.srcElement||v;b.call(e,a)}var e=this;e.attachEvent&&(e.hcEventsIE||(e.hcEventsIE={}),b.hcKey||(b.hcKey=d.uniqueKey()),
    e.hcEventsIE[b.hcKey]=c,e.attachEvent("on"+a,c))},d.removeEventListenerPolyfill=function(a,b){this.detachEvent&&(b=this.hcEventsIE[b.hcKey],this.detachEvent("on"+a,b))},h={docMode8:g&&8===g.documentMode,init:function(a,b){var c=["\x3c",b,' filled\x3d"f" stroked\x3d"f"'],e=["position: ","absolute",";"],n="div"===b;("shape"===b||n)&&e.push("left:0;top:0;width:1px;height:1px;");e.push("visibility: ",n?"hidden":"visible");c.push(' style\x3d"',e.join(""),'"/\x3e');b&&(c=n||"span"===b||"img"===b?c.join(""):
        a.prepVML(c),this.element=w(c));this.renderer=a},add:function(a){var b=this.renderer,c=this.element,e=b.box,n=a&&a.inverted,e=a?a.element||a:e;a&&(this.parentGroup=a);n&&b.invertChild(c,e);e.appendChild(c);this.added=!0;this.alignOnAdd&&!this.deferUpdateTransform&&this.updateTransform();if(this.onAdd)this.onAdd();this.className&&this.attr("class",this.className);return this},updateTransform:x.prototype.htmlUpdateTransform,setSpanRotation:function(){var a=this.rotation,b=Math.cos(a*p),c=Math.sin(a*
        p);k(this.element,{filter:a?["progid:DXImageTransform.Microsoft.Matrix(M11\x3d",b,", M12\x3d",-c,", M21\x3d",c,", M22\x3d",b,", sizingMethod\x3d'auto expand')"].join(""):"none"})},getSpanCorrection:function(a,b,c,e,n){var d=e?Math.cos(e*p):1,f=e?Math.sin(e*p):0,r=A(this.elemHeight,this.element.offsetHeight),g;this.xCorr=0>d&&-a;this.yCorr=0>f&&-r;g=0>d*f;this.xCorr+=f*b*(g?1-c:c);this.yCorr-=d*b*(e?g?c:1-c:1);n&&"left"!==n&&(this.xCorr-=a*c*(0>d?-1:1),e&&(this.yCorr-=r*c*(0>f?-1:1)),k(this.element,
        {textAlign:n}))},pathToVML:function(a){for(var b=a.length,c=[];b--;)H(a[b])?c[b]=Math.round(10*a[b])-5:"Z"===a[b]?c[b]="x":(c[b]=a[b],!a.isArc||"wa"!==a[b]&&"at"!==a[b]||(c[b+5]===c[b+7]&&(c[b+7]+=a[b+7]>a[b+5]?1:-1),c[b+6]===c[b+8]&&(c[b+8]+=a[b+8]>a[b+6]?1:-1)));return c.join(" ")||"x"},clip:function(a){var b=this,c;a?(c=a.members,G(c,b),c.push(b),b.destroyClip=function(){G(c,b)},a=a.getCSS(b)):(b.destroyClip&&b.destroyClip(),a={clip:b.docMode8?"inherit":"rect(auto)"});return b.css(a)},css:x.prototype.htmlCss,
    safeRemoveChild:function(a){a.parentNode&&F(a)},destroy:function(){this.destroyClip&&this.destroyClip();return x.prototype.destroy.apply(this)},on:function(a,b){this.element["on"+a]=function(){var a=v.event;a.target=a.srcElement;b(a)};return this},cutOffPath:function(a,b){var c;a=a.split(/[ ,]/);c=a.length;if(9===c||11===c)a[c-4]=a[c-2]=q(a[c-2])-10*b;return a.join(" ")},shadow:function(a,b,c){var e=[],d,D=this.element,f=this.renderer,r,g=D.style,l,t=D.path,h,m,k,p;t&&"string"!==typeof t.value&&(t=
        "x");m=t;if(a){k=A(a.width,3);p=(a.opacity||.15)/k;for(d=1;3>=d;d++)h=2*k+1-2*d,c&&(m=this.cutOffPath(t.value,h+.5)),l=['\x3cshape isShadow\x3d"true" strokeweight\x3d"',h,'" filled\x3d"false" path\x3d"',m,'" coordsize\x3d"10 10" style\x3d"',D.style.cssText,'" /\x3e'],r=w(f.prepVML(l),null,{left:q(g.left)+A(a.offsetX,1),top:q(g.top)+A(a.offsetY,1)}),c&&(r.cutOff=h+1),l=['\x3cstroke color\x3d"',a.color||"#000000",'" opacity\x3d"',p*d,'"/\x3e'],w(f.prepVML(l),null,null,r),b?b.element.appendChild(r):
        D.parentNode.insertBefore(r,D),e.push(r);this.shadows=e}return this},updateShadows:I,setAttr:function(a,b){this.docMode8?this.element[a]=b:this.element.setAttribute(a,b)},getAttr:function(a){return this.docMode8?this.element[a]:this.element.getAttribute(a)},classSetter:function(a){(this.added?this.element:this).className=a},dashstyleSetter:function(a,b,c){(c.getElementsByTagName("stroke")[0]||w(this.renderer.prepVML(["\x3cstroke/\x3e"]),null,null,c))[b]=a||"solid";this[b]=a},dSetter:function(a,b,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         c){var e=this.shadows;a=a||[];this.d=a.join&&a.join(" ");c.path=a=this.pathToVML(a);if(e)for(c=e.length;c--;)e[c].path=e[c].cutOff?this.cutOffPath(a,e[c].cutOff):a;this.setAttr(b,a)},fillSetter:function(a,b,c){var e=c.nodeName;"SPAN"===e?c.style.color=a:"IMG"!==e&&(c.filled="none"!==a,this.setAttr("fillcolor",this.renderer.color(a,c,b,this)))},"fill-opacitySetter":function(a,b,c){w(this.renderer.prepVML(["\x3c",b.split("-")[0],' opacity\x3d"',a,'"/\x3e']),null,null,c)},opacitySetter:I,rotationSetter:function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           b,c){c=c.style;this[b]=c[b]=a;c.left=-Math.round(Math.sin(a*p)+1)+"px";c.top=Math.round(Math.cos(a*p))+"px"},strokeSetter:function(a,b,c){this.setAttr("strokecolor",this.renderer.color(a,c,b,this))},"stroke-widthSetter":function(a,b,c){c.stroked=!!a;this[b]=a;H(a)&&(a+="px");this.setAttr("strokeweight",a)},titleSetter:function(a,b){this.setAttr(b,a)},visibilitySetter:function(a,b,c){"inherit"===a&&(a="visible");this.shadows&&this.shadows.forEach(function(c){c.style[b]=a});"DIV"===c.nodeName&&(a="hidden"===
    a?"-999em":0,this.docMode8||(c.style[b]=a?"visible":"hidden"),b="top");c.style[b]=a},xSetter:function(a,b,c){this[b]=a;"x"===b?b="left":"y"===b&&(b="top");this.updateClipping?(this[b]=a,this.updateClipping()):c.style[b]=a},zIndexSetter:function(a,b,c){c.style[b]=a},fillGetter:function(){return this.getAttr("fillcolor")||""},strokeGetter:function(){return this.getAttr("strokecolor")||""},classGetter:function(){return this.getAttr("className")||""}},h["stroke-opacitySetter"]=h["fill-opacitySetter"],
    d.VMLElement=h=f(x,h),h.prototype.ySetter=h.prototype.widthSetter=h.prototype.heightSetter=h.prototype.xSetter,h={Element:h,isIE8:-1<v.navigator.userAgent.indexOf("MSIE 8.0"),init:function(a,b,c){var e,d;this.alignedObjects=[];e=this.createElement("div").css({position:"relative"});d=e.element;a.appendChild(e.element);this.isVML=!0;this.box=d;this.boxWrapper=e;this.gradients={};this.cache={};this.cacheKeys=[];this.imgCount=0;this.setSize(b,c,!1);if(!g.namespaces.hcv){g.namespaces.add("hcv","urn:schemas-microsoft-com:vml");
        try{g.createStyleSheet().cssText="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "}catch(D){g.styleSheets[0].cssText+="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "}}},isHidden:function(){return!this.box.offsetWidth},clipRect:function(a,b,c,e){var d=this.createElement(),f=z(a);return y(d,{members:[],count:0,left:(f?a.x:a)+1,top:(f?a.y:b)+1,width:(f?a.width:c)-1,height:(f?a.height:e)-
            1,getCSS:function(a){var b=a.element,c=b.nodeName,e=a.inverted,d=this.top-("shape"===c?b.offsetTop:0),f=this.left,b=f+this.width,n=d+this.height,d={clip:"rect("+Math.round(e?f:d)+"px,"+Math.round(e?n:b)+"px,"+Math.round(e?b:n)+"px,"+Math.round(e?d:f)+"px)"};!e&&a.docMode8&&"DIV"===c&&y(d,{width:b+"px",height:n+"px"});return d},updateClipping:function(){d.members.forEach(function(a){a.element&&a.css(d.getCSS(a))})}})},color:function(a,b,c,e){var f=this,g,h=/^rgba/,r,k,l="none";a&&a.linearGradient?
        k="gradient":a&&a.radialGradient&&(k="pattern");if(k){var t,p,m=a.linearGradient||a.radialGradient,q,u,v,x,A,y="";a=a.stops;var z,C=[],E=function(){r=['\x3cfill colors\x3d"'+C.join(",")+'" opacity\x3d"',v,'" o:opacity2\x3d"',u,'" type\x3d"',k,'" ',y,'focus\x3d"100%" method\x3d"any" /\x3e'];w(f.prepVML(r),null,null,b)};q=a[0];z=a[a.length-1];0<q[0]&&a.unshift([0,q[1]]);1>z[0]&&a.push([1,z[1]]);a.forEach(function(a,b){h.test(a[1])?(g=d.color(a[1]),t=g.get("rgb"),p=g.get("a")):(t=a[1],p=1);C.push(100*
        a[0]+"% "+t);b?(v=p,x=t):(u=p,A=t)});if("fill"===c)if("gradient"===k)c=m.x1||m[0]||0,a=m.y1||m[1]||0,q=m.x2||m[2]||0,m=m.y2||m[3]||0,y='angle\x3d"'+(90-180*Math.atan((m-a)/(q-c))/Math.PI)+'"',E();else{var l=m.r,F=2*l,G=2*l,H=m.cx,I=m.cy,J=b.radialReference,B,l=function(){J&&(B=e.getBBox(),H+=(J[0]-B.x)/B.width-.5,I+=(J[1]-B.y)/B.height-.5,F*=J[2]/B.width,G*=J[2]/B.height);y='src\x3d"'+d.getOptions().global.VMLRadialGradientURL+'" size\x3d"'+F+","+G+'" origin\x3d"0.5,0.5" position\x3d"'+H+","+I+'" color2\x3d"'+
        A+'" ';E()};e.added?l():e.onAdd=l;l=x}else l=t}else h.test(a)&&"IMG"!==b.tagName?(g=d.color(a),e[c+"-opacitySetter"](g.get("a"),c,b),l=g.get("rgb")):(l=b.getElementsByTagName(c),l.length&&(l[0].opacity=1,l[0].type="solid"),l=a);return l},prepVML:function(a){var b=this.isIE8;a=a.join("");b?(a=a.replace("/\x3e",' xmlns\x3d"urn:schemas-microsoft-com:vml" /\x3e'),a=-1===a.indexOf('style\x3d"')?a.replace("/\x3e",' style\x3d"display:inline-block;behavior:url(#default#VML);" /\x3e'):a.replace('style\x3d"',
        'style\x3d"display:inline-block;behavior:url(#default#VML);')):a=a.replace("\x3c","\x3chcv:");return a},text:u.prototype.html,path:function(a){var b={coordsize:"10 10"};K(a)?b.d=a:z(a)&&y(b,a);return this.createElement("shape").attr(b)},circle:function(a,b,c){var e=this.symbol("circle");z(a)&&(c=a.r,b=a.y,a=a.x);e.isCircle=!0;e.r=c;return e.attr({x:a,y:b})},g:function(a){var b;a&&(b={className:"highcharts-"+a,"class":"highcharts-"+a});return this.createElement("div").attr(b)},image:function(a,b,c,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        e,d){var f=this.createElement("img").attr({src:a});1<arguments.length&&f.attr({x:b,y:c,width:e,height:d});return f},createElement:function(a){return"rect"===a?this.symbol(a):u.prototype.createElement.call(this,a)},invertChild:function(a,b){var c=this;b=b.style;var e="IMG"===a.tagName&&a.style;k(a,{flip:"x",left:q(b.width)-(e?q(e.top):1),top:q(b.height)-(e?q(e.left):1),rotation:-90});[].forEach.call(a.childNodes,function(b){c.invertChild(b,a)})},symbols:{arc:function(a,b,c,e,d){var f=d.start,g=d.end,
            h=d.r||c||e;c=d.innerR;e=Math.cos(f);var n=Math.sin(f),l=Math.cos(g),k=Math.sin(g);if(0===g-f)return["x"];f=["wa",a-h,b-h,a+h,b+h,a+h*e,b+h*n,a+h*l,b+h*k];d.open&&!c&&f.push("e","M",a,b);f.push("at",a-c,b-c,a+c,b+c,a+c*l,b+c*k,a+c*e,b+c*n,"x","e");f.isArc=!0;return f},circle:function(a,b,c,e,d){d&&E(d.r)&&(c=e=2*d.r);d&&d.isCircle&&(a-=c/2,b-=e/2);return["wa",a,b,a+c,b+e,a+c,b+e/2,a+c,b+e/2,"e"]},rect:function(a,b,c,d,f){return u.prototype.symbols[E(f)&&f.r?"callout":"square"].call(0,a,b,c,d,f)}}},
    d.VMLRenderer=f=function(){this.init.apply(this,arguments)},f.prototype=L(u.prototype,h),d.Renderer=f);u.prototype.getSpanWidth=function(a,b){var c=a.getBBox(!0).width;!C&&this.forExport&&(c=this.measureSpanWidth(b.firstChild.data,a.styles));return c};u.prototype.measureSpanWidth=function(a,b){var c=g.createElement("span");a=g.createTextNode(a);c.appendChild(a);k(c,b);this.box.appendChild(c);b=c.offsetWidth;F(c);return b}});k(f,"masters/modules/oldie.src.js",[],function(){})});
//# sourceMappingURL=oldie.js.map

/*
    Highcharts JS v7.1.1 (2019-04-09)

    Old IE (v6, v7, v8) array polyfills for Highcharts v7+.

    (c) 2010-2019 Highsoft AS
    Author: Torstein Honsi

    License: www.highcharts.com/license
    */
(function(e){"object"===typeof module&&module.exports?(e["default"]=e,module.exports=e):"function"===typeof define&&define.amd?define("highcharts/modules/oldie-polyfills",["highcharts"],function(f){e(f);e.Highcharts=f;return e}):e("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(e){function f(c,b,a,d){c.hasOwnProperty(b)||(c[b]=d.apply(null,a))}e=e?e._modules:{};f(e,"modules/oldie-polyfills.src.js",[],function(){Array.prototype.forEach||(Array.prototype.forEach=function(c,b){for(var a=
    0,d=this.length;a<d;a++)if(void 0!==this[a]&&!1===c.call(b,this[a],a,this))return a});Array.prototype.map||(Array.prototype.map=function(c){for(var b=[],a=0,d=this.length;a<d;a++)b[a]=c.call(this[a],this[a],a,this);return b});Array.prototype.indexOf||(Array.prototype.indexOf=function(c,b){var a=b||0;if(this)for(b=this.length;a<b;a++)if(this[a]===c)return a;return-1});Array.prototype.filter||(Array.prototype.filter=function(c){for(var b=[],a=0,d=this.length;a<d;a++)c(this[a],a)&&b.push(this[a]);return b});
    Array.prototype.some||(Array.prototype.some=function(c,b){for(var a=0,d=this.length;a<d;a++)if(!0===c.call(b,this[a],a,this))return!0;return!1});Array.prototype.reduce||(Array.prototype.reduce=function(c,b){for(var a=1<arguments.length?0:1,d=1<arguments.length?b:this[0],e=this.length;a<e;++a)d=c.call(this,d,this[a],a,this);return d});Object.keys||(Object.keys=function(c){var b=[],a=Object.prototype.hasOwnProperty,d;for(d in c)a.call(c,d)&&b.push(d);return b})});f(e,"masters/modules/oldie-polyfills.src.js",
    [],function(){})});
//# sourceMappingURL=oldie-polyfills.js.map

if(typeof JSON!=="object"){JSON={}}(function(){"use strict";function f(e){return e<10?"0"+e:e}function quote(e){escapable.lastIndex=0;return escapable.test(e)?'"'+e.replace(escapable,function(e){var t=meta[e];return typeof t==="string"?t:"\\u"+("0000"+e.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+e+'"'}function str(e,t){var n,r,i,s,o=gap,u,a=t[e];if(a&&typeof a==="object"&&typeof a.toJSON==="function"){a=a.toJSON(e)}if(typeof rep==="function"){a=rep.call(t,e,a)}switch(typeof a){case"string":return quote(a);case"number":return isFinite(a)?String(a):"null";case"boolean":case"null":return String(a);case"object":if(!a){return"null"}gap+=indent;u=[];if(Object.prototype.toString.apply(a)==="[object Array]"){s=a.length;for(n=0;n<s;n+=1){u[n]=str(n,a)||"null"}i=u.length===0?"[]":gap?"[\n"+gap+u.join(",\n"+gap)+"\n"+o+"]":"["+u.join(",")+"]";gap=o;return i}if(rep&&typeof rep==="object"){s=rep.length;for(n=0;n<s;n+=1){if(typeof rep[n]==="string"){r=rep[n];i=str(r,a);if(i){u.push(quote(r)+(gap?": ":":")+i)}}}}else{for(r in a){if(Object.prototype.hasOwnProperty.call(a,r)){i=str(r,a);if(i){u.push(quote(r)+(gap?": ":":")+i)}}}}i=u.length===0?"{}":gap?"{\n"+gap+u.join(",\n"+gap)+"\n"+o+"}":"{"+u.join(",")+"}";gap=o;return i}}if(typeof Date.prototype.toJSON!=="function"){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+"-"+f(this.getUTCMonth()+1)+"-"+f(this.getUTCDate())+"T"+f(this.getUTCHours())+":"+f(this.getUTCMinutes())+":"+f(this.getUTCSeconds())+"Z":null};String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(){return this.valueOf()}}var cx,escapable,gap,indent,meta,rep;if(typeof JSON.stringify!=="function"){escapable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;meta={"\b":"\\b","	":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};JSON.stringify=function(e,t,n){var r;gap="";indent="";if(typeof n==="number"){for(r=0;r<n;r+=1){indent+=" "}}else if(typeof n==="string"){indent=n}rep=t;if(t&&typeof t!=="function"&&(typeof t!=="object"||typeof t.length!=="number")){throw new Error("JSON.stringify")}return str("",{"":e})}}if(typeof JSON.parse!=="function"){cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;JSON.parse=function(text,reviver){function walk(e,t){var n,r,i=e[t];if(i&&typeof i==="object"){for(n in i){if(Object.prototype.hasOwnProperty.call(i,n)){r=walk(i,n);if(r!==undefined){i[n]=r}else{delete i[n]}}}}return reviver.call(e,t,i)}var j;text=String(text);cx.lastIndex=0;if(cx.test(text)){text=text.replace(cx,function(e){return"\\u"+("0000"+e.charCodeAt(0).toString(16)).slice(-4)})}if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,"@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,"]").replace(/(?:^|:|,)(?:\s*\[)+/g,""))){j=eval("("+text+")");return typeof reviver==="function"?walk({"":j},""):j}throw new SyntaxError("JSON.parse")}}})()
if(!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(obj, start) {
        for (var i = (start || 0), j = this.length; i < j; i++) {
            if (this[i] === obj) { return i; }
        }
        return -1;
    }
}
