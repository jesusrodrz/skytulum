import '../scss/style.scss'

class Menu {
  constructor (options) {
    this.Nav = document.getElementById(options.nav)
    this.openTrigger = document.getElementById(options.open)
    this.closeTrigger = document.getElementById(options.close)
    this.menu = document.getElementById(options.menu)
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
  handleClick = (e) => {
    e.preventDefault();
    console.log('click')

    const target = e.target

    if (this.openTrigger.contains(target)) this.open()
    if (this.closeTrigger.contains(target)) this.close()
  }
  
}

const nav = new Menu({
  nav: 'mainNavigation',
  menu:'mainMenu',
  open:'menuOpen',
  close:'menuClose'
})

nav.init()
