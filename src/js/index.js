import '../scss/style.scss'
import 'particles.js'

class Menu {
  constructor (options) {
    this.Nav = document.getElementById(options.nav)
    this.openBtn = document.getElementById(options.open)
    this.closeBtn = document.getElementById(options.close)
    this.menu = document.getElementById(options.menu)
    this.cta = document.getElementById(options.cta)
    this.contactId = options.contact
    this.body = document.body
    this.state = false
  }
  
  init = () => {
    this.Nav.addEventListener('click',this.handleClick)
  }
  close = () => {
    this.menu.classList.remove('active')
  }
  open = () => {
    this.menu.classList.add('active')
  }
  setParticles = () => {
    const particles = document.createElement('div'),
    particlesJson = this.cta.dataset.jsonsrc
    particles.id = 'particlesCTA'
    particles.classList.add('particles')
    this.contact.appendChild(particles)
    particlesJS.load('particlesCTA', particlesJson, function() {
      console.log('particles ready 2')
    })

  }
  createModal = () => {
    this.contact = document.getElementById(this.contactId)
    this.contactParent = document.getElementById(this.contactId).parentElement
    const modal = document.createElement('div')
    modal.classList.add('modal-contact')
    this.closeContactBtn = this.closeBtn.cloneNode(true)
    this.closeContactBtn.classList.add('close-contact')
    this.contact.appendChild(this.closeContactBtn)
    this.menuModal = this.menu.cloneNode(true)
    this.closeMenuBtn = this.closeBtn.cloneNode(true)
    this.closeMenuBtn.classList.add('close-btn')
    this.menuModal.prepend(this.closeMenuBtn)
    modal.appendChild(this.menuModal)
    modal.appendChild(this.contact)
    modal.addEventListener('click', this.handleClick)

    this.setParticles()
    
    return modal
  }
  closeContact = () => {
    this.body.classList.remove('overflow-hidden')
    this.modal.classList.remove('active')
    if (this.modal.classList.contains('nav')) this.modal.classList.remove('nav')
    this.contactParent.appendChild(this.contact)
  }
  openContact = (isNav) => {

    if (!this.modal) this.modal = this.createModal()
    if (this.modal) this.modal.appendChild(this.contact)

    this.body.classList.add('overflow-hidden')
    this.modal.classList.add('active')
    this.modal.classList.add('active')
    if (isNav) this.modal.classList.add('nav')
    this.body.appendChild(this.modal)
  }
  handleClick = (e) => {
    // e.preventDefault();
    const target = e.target,
      isLink = e.target.parentElement.nodeName === 'LI',
      isSubmit = e.target.classList.contains('btn-white')
    // check if is a link and not a button
    if (!isLink && !isSubmit )  e.preventDefault() 
    console.log(target,e)
    // mobile menu
    if (window.innerWidth < 864) {
      
      if (this.openBtn.contains(target)) this.open()
      if (this.closeBtn.contains(target)) this.close()
    }
    //Desktop
    if (window.innerWidth >= 864) {
      
      if (this.openBtn.contains(target)) this.openContact(true)
      if (this.cta.contains(target)) this.openContact(false)
      if (this.closeBtn.contains(target)) this.closeContact()
      if (this.closeContactBtn.contains(target)) this.closeContact()
      if (this.closeMenuBtn.contains(target)) this.closeContact()
      if (this.modal === target ) this.closeContact()
    }

  }
  
}

const nav = new Menu({
  nav: 'mainNavigation',
  menu:'mainMenu',
  open:'menuOpen',
  close: 'menuClose',
  cta: 'ctaBtn',
  contact:'contact'
})

nav.init()

class ScrollToTop {
  constructor(btnId){
    this.btn = document.getElementById(btnId)
  }
  toTop = () => {
    window.scroll({
      top: 0,
      behavior: "smooth"
    });

  }
  toggleBtn = () => {
    const position = window.pageYOffset,
      height = window.innerHeight;  
    // console.log(this.btn.classList,position,height)
    if( position <= height && this.btn.classList.contains('active') ) this.btn.classList.remove('active')
    if (position >= height && !this.btn.classList.contains('active')) this.btn.classList.add('active')
    if (position <= height) {
      
    }
    if (position >= height) {
      
    }
    // if (position >= height ) this.btn.classList.add('active')
    
  }
  init = () => {
    if (this.btn) {
      this.btn.addEventListener('click',this.toTop)
    }

    window.addEventListener('scroll',this.toggleBtn)
  }

}

const toTopBtn = new ScrollToTop('btnUp')
toTopBtn.init()


class Lightbox {
  constructor (lightboxId,btnId) {
    this.lightbox = document.getElementById(lightboxId)
    this.btn = document.getElementById(btnId)
    this.body = document.body
    this.images = () => {
      const images = [...this.lightbox.getElementsByClassName('gallery__img')],
      imagesSrc = this.lightbox.dataset.images.split(','),
      imagesLazy = imagesSrc.map( src => {
        const img = document.createElement('img')
        img.classList.add('lightbox__img')
        img.src = src
        return img
        })
      return images.contact(imagesLazy)
    }

  }
  getImages = () => {
    const images = [...this.lightbox.getElementsByClassName('gallery__img')]

    const imagesSrc = this.lightbox.dataset.images.split(',')
      const imagesLazy = imagesSrc.map( src => {
      const img = document.createElement('img')
      img.classList.add('lightbox__img')
      img.src = src
      return img
      }),
    imagesLightbox = images.map(imgOld => {
      const img = imgOld.cloneNode(true)
      img.classList.add('lightbox__img')
      img.classList.remove('gallery__img')
      return img
    })

    const imagesR = this.lightbox.dataset.images && this.lightbox.dataset.images !== '' && this.lightbox.dataset.images !== ' '  ? imagesLightbox.concat(imagesLazy) : imagesLightbox
    imagesR.forEach (e => {
      this.modal.append(e)
    } )
    return imagesR
  }

  open = (target) => {
    if (!this.modal) this.create()
    this.images = this.getImages()
    this.body.classList.add('overflow-hidden')
    this.modal.classList.add('active')

    if (target === null) {
      this.images[0].classList.add('active')
      this.curretImage = this.images[0]
      this.modal.append(this.curretImage)
    }
    if ( !isNaN(target) )  {
      this.images[target].classList.add('active')
      this.curretImage = this.images[target]
      this.modal.append(this.curretImage)
    }
      
  }

  change = (newImage,oldImage) => {
    this.curretImage = newImage
    oldImage.classList.remove('active')
    newImage.classList.add('active')
  }
  next = () => {
    const index = this.imgIndex(),
      newImage = (index < this.images.length - 1) ? this.images[index + 1] : this.images[0]
    this.change(newImage, this.curretImage)
    
  }

  imgIndex = () => this.images.indexOf(this.curretImage) 

  prev = () => {
    const index = this.imgIndex(),
      newImage = ( index > 0 ) ? this.images[index - 1] : this.images[this.images.length - 1]
    this.change(newImage,this.curretImage)
  }
  close = () => {
    this.body.classList.remove('overflow-hidden')
    this.modal.classList.remove('active')
    this.modal.removeChild(this.curretImage)
    this.curretImage.classList.remove('active')
  }
  create = () => {
    this.modal = document.createElement('div')
    this.modal.classList.add('lightbox')
    this.btnNext = document.createElement('button')
    this.btnNext.classList.add('lightbox__next')
    this.btnNext.innerHTML = `<i class="icon-arrow-right"></i>`
    this.btnPrev = document.createElement('button')
    this.btnPrev.classList.add('lightbox__prev')
    this.btnPrev.innerHTML = `<i class="icon-arrow-left"></i>`
    this.btnClose = document.createElement('button')
    this.btnClose.innerHTML = `&times;`
    this.btnClose.classList.add('lightbox__close')
    this.modal.append(this.btnNext)
    this.modal.append(this.btnPrev)
    this.modal.append(this.btnClose)
    this.body.append(this.modal)
    this.modal.addEventListener('click', this.handleClick)
    // this.modal.nodeType
  }
  handleClick = (e) => {
    const target = e.target,
    image = (e.target.nodeName === 'IMG') ? [...this.lightbox.getElementsByTagName('img')].indexOf( target ) : null
    if ( this.btn === target )  this.open(null)
    if ( image )  this.open(image)
    if ( this.btnNext.contains( target ) )  this.next()
    if ( this.btnPrev.contains( target ) )  this.prev()
    if ( this.btnClose.contains( target ) )  this.close()
    if ( this.modal === target )  this.close()
  }
  init = () => {
    if (this.lightbox) this.lightbox.addEventListener('click', this.handleClick)
  }
}

const lightbox = new Lightbox('galleryTulum','galleryBtn')
lightbox.init()

class Lightbox2 {
  constructor (lightbox) {
    this.lightbox = lightbox;
    this.btns = [...this.lightbox.getElementsByClassName('table-level__btn')]
    this.body = document.body
  }

  change = (newImage,oldImage) => {
    this.curretImage = newImage
    oldImage.classList.remove('active')
    newImage.classList.add('active')
  }
  next = () => {
    const index = this.imgIndex(),
      newImage = (index < this.currentImages.length - 1) ? this.currentImages[index + 1] : this.currentImages[0]
    this.change(newImage, this.curretImage)
    
  }

  imgIndex = () => this.currentImages.indexOf(this.curretImage) 

  prev = () => {
    const index = this.imgIndex(),
      newImage = ( index > 0 ) ? this.currentImages[index - 1] : this.currentImages[this.currentImages.length - 1]
    this.change(newImage,this.curretImage)
  }

  create = () => {
    this.modal = document.createElement('div')
    this.modal.classList.add('lightbox')
    this.btnNext = document.createElement('button')
    this.btnNext.classList.add('lightbox__next')
    this.btnNext.innerHTML = `<i class="icon-arrow-right"></i>`
    this.btnPrev = document.createElement('button')
    this.btnPrev.classList.add('lightbox__prev')
    this.btnPrev.innerHTML = `<i class="icon-arrow-left"></i>`
    this.btnClose = document.createElement('button')
    this.btnClose.innerHTML = `&times;`
    this.btnClose.classList.add('lightbox__close')
    this.modal.append(this.btnClose)
    this.modal.append(this.btnPrev)
    this.modal.append(this.btnNext)
    this.body.append(this.modal)
    this.modal.addEventListener('click', this.handleClick)

  }
  open = (index) => {
    if (!this.modal) this.create()
    // this.images = this.getImages()
    this.body.classList.add('overflow-hidden')
    this.modal.classList.add('active')

    this.setImges(this.getImages(index))
    
  }
  close = () => {
    this.body.classList.remove('overflow-hidden')
    this.modal.classList.remove('active')
    if ( this.btnNext.classList.contains('unactive') ) this.btnNext.classList.remove('unactive')
    if (this.btnPrev.classList.contains('unactive')) this.btnPrev.classList.remove('unactive')
    this.currentImages.forEach( item => {
      this.modal.removeChild(item)
    })
  }
  getImages = (index) => {
    const string = this.btns[index].dataset.src,
      imgs = string.split(',')
    return imgs.filter( img=> img !== '' && img !== ' ')
  }
  setImges = (images) => {
    this.currentImages = []
    if (images.length === 1 ) {
      this.btnNext.classList.add('unactive')
      this.btnPrev.classList.add('unactive')
    }
    images.forEach((imgsrc, index) => {
      const img = document.createElement('img')
      img.classList.add('lightbox__img')
      img.src = imgsrc
      if (index === 0) {
        img.classList.add('active')
        this.curretImage = img
      }
      this.modal.appendChild(img)
      this.currentImages.push(img)
    })
  }
  handleClick = (e) => {
    const btn = e.target.closest('.table-level__btn'),
    target = e.target
    if (this.btns.includes(btn)) this.open(this.btns.indexOf(btn))
    // if ( this.btnClose.contains( e.target ) )  this.close()
    if (this.btnClose) {
      
      if ( this.btnClose.contains( e.target ) )  this.close()
    }

    if (this.btnNext) {
      
      if ( this.btnNext.contains( target ) )  this.next()
    }
    if (this.btnPrev) {
      
      if ( this.btnPrev.contains( target ) )  this.prev()
    }
    if (this.modal === e.target) this.close()

  }
  init = () => {
    this.lightbox.addEventListener('click', this.handleClick)
  }
}

const specs = document.getElementById('specsLightbox')
if (specs) {
  const specsBox = new Lightbox2(specs)
  specsBox.init()
}

const particlesJson = document.getElementById('particles').dataset.jsonsrc
particlesJS.load('particles', particlesJson, function() {
  console.log('particles ready')
})


class Slider {
  constructor (container,itemClass) {
    this.slider = container
    this.images = [...this.slider.getElementsByClassName(itemClass)];
    this.curretImage = this.images[0]
  }

  next = () => {
    const index = this.imgIndex(),
      newImage = (index < this.images.length - 1) ? this.images[index + 1] : this.images[0]
    this.change(newImage, this.curretImage)
    
  }

  change = (newImage,oldImage) => {
    this.curretImage = newImage
    oldImage.classList.remove('active')
    newImage.classList.add('active')
  }

  imgIndex = () => this.images.indexOf(this.curretImage) 

  init = () => {
    if (this.images.length > 0) setInterval(this.next,5500)
  }
}
const sliderContainer = document.getElementById('slider')
if (sliderContainer) {
  const slider = new Slider(sliderContainer,'hero__img')
  slider.init()
}

class LazyLoad{
  constructor (itemsCLass) {
    this.elements = [...document.getElementsByClassName(itemsCLass)]
    
  }
  getData = (element) => {
    const items = [...element.getElementsByClassName('table-level__btn')],
      itemsData = items.map( item => {
        const srcS = item.dataset.src.split(',').filter( img=> img !== '' && img !== ' ')
        return {
          srcs: srcS,
          area: item.dataset.area
        }

    } )
    
    return itemsData

  }
  load = ( item ) => {
    const index = this.elements.indexOf(item),
      data = this.elementsLazy[index].images,
      element = item
    
    data.forEach(item => {
      item.srcs.forEach(imgsrc => {

        const fig = document.createElement('figure'),
          img = document.createElement('img'),
        area = document.createElement('span')
  
        fig.classList.add('level__fig')
        img.classList.add('level__img')
        img.src = imgsrc
        area.classList.add('level__area')
        area.innerText = item.area
        fig.append(img)
        fig.append(area)
        element.append(fig)
      })
    } )

  }
  init = () => {
    if (this.elements) {
      this.elementsLazy = this.elements.map(item => {
        return  {
          item: item,
          images: this.getData(item)
        }
      })
      this.elements.forEach(item => {
        this.load(item)
      })
    }
  }
}

if (window.innerWidth < 864) {
  
  const lazy = new LazyLoad('level')
  lazy.init()
}
// if ()  