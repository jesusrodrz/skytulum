(function (c, b) {
  var a = null,
      e = null,
      d = null;
  a = function () {
    this.more = "more"
  };
  e = function () {
    this.more = "View more"
  };
  d = function () {
    this.oApplyTo = null;
    this.oBackupApplyTo = null;
    this.oTarget = null;
    this.oClasses = new a();
    this.oTexts = new e();
    this.nWords = 0;
    this.nWordsCounter = 0;
    this.oViewMore = null;
    this.oSerialized = {};
    this.oDocumentFragment = b.createDocumentFragment();
    this.bTest = false;
    this.nIdTest = 0;
    this.bNeedViewMore = false;
    this.bNotViewMore = false
  };
  d.prototype.applyTo = function (f) {
    if (!f) {
      return this
    }
    this.oApplyTo = f;
    this.oBackupApplyTo = f.cloneNode(true);
    return this
  };
  d.prototype.setTarget = function (f) {
    if (!f) {
      return this
    }
    this.oTarget = f;
    return this
  };
  d.prototype.setClasses = function (f) {
    if (!f) {
      return this
    }
    this.oClasses = f;
    return this
  };
  d.prototype.setTexts = function (f) {
    if (!f) {
      return this
    }
    this.oTexts = f;
    return this
  };
  d.prototype.setWords = function (f) {
    if (!f) {
      return this
    }
    this.nWords = f - 1;
    return this
  };
  d.prototype.trim = function (f) {
    return f.replace(/^\s+/g, "").replace(/\s+$/g, "")
  };
  d.prototype.countWords = function (f) {
    return this.trim(f).split(" ").length
  };
  d.prototype.getOnlyNumberOfWords = function (g, f) {
    return this.trim(g).split(" ").splice(0, f).join(" ")
  };
  d.prototype.createViewMore = function () {
    var f = b.createElement("button");
    // h = b.createcreateElement('div')
    // f.className = this.oClasses.more;
    f.classList.add('gallery__btn')
    f.classList.add('btn')
    f.classList.add('t-uppercase')
    f.classList.add('post__btn')
    f.title = this.oTexts.more;
    // f.href = "#";
    f.innerHTML = this.oTexts.more;
    this.oViewMore = f
  };
  d.prototype.getFirstElementOfObject = function (g) {
    var f = null,
        h = "";
    for (h in g) {
      if (g.hasOwnProperty(h)) {
        f = g[h];
        break
      }
    }
    return f
  };
  d.prototype.deserializeObject = function (i, h) {
    var f = null,
        g = "";
    if (i.nodeType === 1) {
      f = b.createElement(i.tagName);
      if (typeof i.attributes !== "undefined") {
        for (g in i.attributes) {
          if (i.attributes.hasOwnProperty(g)) {
            f.setAttribute(g, i.attributes[g])
          }
        }
      }
      h.appendChild(f)
    } else {
      if (i.nodeType === 3) {
        if (typeof i.textContent !== "undefined") {
          f = b.createTextNode(i.textContent)
        } else {
          if (i.data) {
            f = b.createTextNode(i.data)
          } else {
            f = b.createTextNode(i.innerText)
          }
        }
        h.appendChild(f)
      }
    }
    if (typeof i.childNodes !== "undefined") {
      this.loopOnDeserialize(i.childNodes, f)
    }
  };
  d.prototype.loopOnDeserialize = function (h, g) {
    var f = "";
    for (f in h) {
      if (h.hasOwnProperty(f)) {
        this.deserializeObject(h[f], g)
      }
    }
  };
  d.prototype.deserializeSerializedObject = function (i, h) {
    var g = false,
        f = null;
    if (typeof i === "undefined") {
      i = this.getFirstElementOfObject(this.oSerialized);
      this.oDocumentFragment = b.createDocumentFragment();
      g = true
    }
    if (typeof h === "undefined") {
      f = b.createElement("div");
      this.oDocumentFragment.appendChild(f);
      h = f
    }
    this.deserializeObject(i, h);
    if (typeof i.childNodes !== "undefined") {
      this.loopOnDeserialize(i.childNodes, h)
    }
  };
  d.prototype.serializeDomObject = function (l, i) {
    var g = Math.random() * 15412457562,
        f = null,
        n = [],
        p = null,
        h = 0,
        m = 0,
        k = 0,
        o = 0,
        j = l.childNodes.length;
    if (this.bTest) {
      g = "__" + (this.nIdTest += 1) + "__"
    }
    if (this.nWordsCounter < this.nWords) {
      f = {};
      f.nodeType = l.nodeType;
      if (typeof l.tagName !== "undefined") {
        f.tagName = l.tagName.toLowerCase()
      }
      n = l.attributes;
      if (n) {
        f.attributes = {};
        m = n.length;
        for (; h < m; h += 1) {
          p = n[h];
          if (p.nodeValue) {
            f.attributes[p.name] = p.value
          }
        }
      }
      if (f.nodeType === 3) {
        k = this.nWordsCounter;
        if (typeof l.textContent !== "undefined") {
          this.nWordsCounter += this.countWords(this.trim(l.textContent))
        } else {
          if (l.data) {
            this.nWordsCounter += this.countWords(this.trim(l.data))
          } else {
            this.nWordsCounter += this.countWords(this.trim(l.innerText))
          }
        }
        if (this.nWordsCounter < this.nWords) {
          if (typeof l.textContent !== "undefined") {
            f.textContent = l.textContent
          } else {
            if (l.data) {
              f.innerText = l.data
            } else {
              f.innerText = l.innerText
            }
          }
        } else {
          this.bNeedViewMore = true;
          if (k < this.nWords && this.nWordsCounter > this.nWords) {
            if (typeof l.textContent !== "undefined") {
              f.textContent = this.getOnlyNumberOfWords(l.textContent, (this.nWords - k))
            } else {
              if (l.data) {
                f.innerText = this.getOnlyNumberOfWords(l.data, (this.nWords - k))
              } else {
                f.innerText = this.getOnlyNumberOfWords(l.innerText, (this.nWords - k))
              }
            }
          } else {
            if (b.body.textContent) {
              f.textContent = ""
            } else {
              f.innerText = ""
            }
          }
        }
      }
      if (l.hasChildNodes()) {
        f.childNodes = {};
        o = 0;
        j = l.childNodes.length;
        for (; o < j; o += 1) {
          this.serializeDomObject(l.childNodes[o], f.childNodes)
        }
      }
      if (typeof i === "undefined") {
        this.oSerialized[g] = f
      } else {
        i[g] = f
      }
    }
  };
  d.prototype.addEvent = function (f, h, g) {
    if (f.addEventListener) {
      f.addEventListener(h, g, false)
    } else {
      if (f.attachEvent) {
        f.attachEvent("on" + h, g)
      }
    }
  };
  d.prototype.setBehaviour = function () {
    var f = this;
    this.addEvent(this.oViewMore, "click", function () {
      f.showAll();
      return false
    })
  };
  d.prototype.showAll = function () {
    var f = this.oTarget,
        g = f.parentNode;
    g.insertBefore(this.oBackupApplyTo, f);
    g.removeChild(f)
  };
  d.prototype.init = function () {
    this.serializeDomObject(this.oApplyTo);
    this.deserializeSerializedObject();
    var f = this.oDocumentFragment.childNodes[0];
    f.removeChild(this.oDocumentFragment.childNodes[0].childNodes[0]);
    this.oTarget.innerHTML = "";
    this.createViewMore();
    if (this.bNeedViewMore && !this.bNotViewMore) {
      f.appendChild(b.createTextNode("..."));
      // f.appendChild(b.createElement("br"));
      f.appendChild(this.oViewMore);
      this.setBehaviour()
    }
    console.log(this.oDocumentFragment)
    this.oTarget.appendChild(this.oDocumentFragment)
  };
  d.run = function (k, f, j, g, i) {
    var h = new d();
    h.applyTo(k).setTarget(f).setWords(j);
    if (typeof g !== "undefined") {
      h.setTexts(g)
    }
    if (typeof i !== "undefined") {
      h.setClasses(i)
    }
    h.init()
  };
  c.Cutter = d
}(window, document));