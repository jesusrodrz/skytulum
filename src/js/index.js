import '../scss/style.scss'

class Menu {
  constructor (options) {
    this.Nav = document.getElementById(options.nav)
    this.openBtn = document.getElementById(options.open)
    this.closeBtn = document.getElementById(options.close)
    // this.closeBtnContact = document.getElementById(options.close)
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
  createModal = () => {
    this.contact = document.getElementById(this.contactId).cloneNode(true)
    const modal = document.createElement('div')
    modal.classList.add('modal-contact')
    this.closeContactBtn = this.closeBtn.cloneNode(true)
    this.closeContactBtn.classList.add('close-contact')
    this.contact.appendChild(this.closeContactBtn)
    this.menuModal = this.menu.cloneNode(true)
    // console.log(this.closeBtn,this.menuModal,this.closeContactBtn)
    this.closeMenuBtn = this.closeBtn.cloneNode(true)
    this.closeMenuBtn.classList.add('close-btn')
    this.menuModal.prepend(this.closeMenuBtn)
    modal.appendChild(this.menuModal)
    modal.appendChild(this.contact)
    modal.addEventListener('click', this.handleClick)

    return modal
  }
  closeContact = () => {
    this.body.classList.remove('overflow-hidden')
    this.modal.classList.remove('active')
    this.modal.classList.toggle('nav')
  }
  openContact = (isNav) => {

    if (!this.modal) this.modal = this.createModal()
    
    this.body.classList.add('overflow-hidden')
    this.modal.classList.add('active')
    this.modal.classList.add('active')
    if (isNav) this.modal.classList.add('nav')
    this.body.appendChild(this.modal)
  }
  handleClick = (e) => {
    // e.preventDefault();
    console.log(e,e.target)
    const target = e.target,
      isLink = e.target.parentElement.nodeName === 'LI'
    // check if is a link and not a button
    if (!isLink)  e.preventDefault() 
    
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
    
    
    if( position <= height && this.btn.classList.contains('active') ) this.btn.classList.remove('active')
    if( position >= height && !this.btn.classList.contains('active') ) this.btn.classList.add('active')
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
