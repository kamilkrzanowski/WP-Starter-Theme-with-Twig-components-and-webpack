import $ from 'jquery'

class Navbar {
  constructor(element, options) {
    this.element = element
    this.hamburger = options.hamburger
    this.navMenu = options.navMenu
  }

  init() {
    if (!this.element) {
      return
    }
    this.onClickHamburger()
  }

  onClickHamburger() {
    this.hamburger.click(()=>{
      this.navMenu.toggleClass('is-active')
    })
  }
}

const navbar = new Navbar($('[data-header]'), {
  hamburger: $('[data-nav-hamburger]'),
  navMenu: $('[data-nav-menu]'),
})

navbar.init()