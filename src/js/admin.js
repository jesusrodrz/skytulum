import '../scss/admin.scss'


class Gallery {
  constructor (gallery,addBtn,figClass) {
    this.gallery = gallery
    this.addBtn = document.getElementById(addBtn)
    this.images = [...this.gallery.getElementsByClassName(figClass)];
  }
  init = () => {
    if(this.gallery) this.gallery.addEventListener("click", this.handleClick)
  }

  helper = url => {
    console.log(this.target)
    // this.target
    this.target.getElementsByTagName('input')[0].value= url
    this.target.getElementsByTagName('img')[0].src= url
  }

  openMediaSingle = (element) => {
    this.target = element
    if (this.wp_media_s) {
      this.wp_media_s.open();
      return;
    }
    this.wp_media_s = wp.media.frames.wp_media_s = wp.media({
      title: this.gallery.dataset.titleS,
      button: {
        text: this.gallery.dataset.button
      },
    })
    this.wp_media_s.on('select', () => {
      
      const attachment = this.wp_media_s.state().get('selection').first().toJSON();
      this.helper(attachment.url)
    })
    this.wp_media_s.open();
  }
  openMedia = () => {
    if (this.wp_media) {
      this.wp_media.open();
      return;
    }
    // Sets up the media library frame
    this.wp_media = wp.media.frames.wp_media = wp.media({
      title: this.gallery.dataset.title,
      button: {
        text: this.gallery.dataset.button
      },
      multiple: true
    })

    this.wp_media.on('select', () => {
      const attachments = this.wp_media.state().get('selection').map((e) => {
          
        e.toJSON();
        const item = {
          url: e.attributes.url,
          id:e.id
        }
        return item;
          
      })

      attachments.forEach(item => {
        this.addImg(item.url)
      });

    })

    this.wp_media.open();
  }

  handleClick = (e) => {
    e.preventDefault()
    const target = e.target;
    // console.log(target)
    if (target === this.addBtn) this.openMedia()

    if (target.closest('.gallery__close')) {

      this.remove(target.closest('.gallery__fig'), this.images)

    } else if (target.closest('.gallery__fig')) {

      this.openMediaSingle(target.closest('.gallery__fig'))
    }
  }

  remove = (element,items) => {
    this.gallery.removeChild(element)
    items.splice(items.indexOf(element),1)
    items.forEach( (e,index) => {
      e.getElementsByTagName('input')[0].name=`${this.gallery.dataset.name}[${index}]`
    } )
  }

  addImg = (imgSrc='img/src') => {
    const fig = document.createElement('figure'),
      img = document.createElement('img'),
      input = document.createElement('input'),
      close = document.createElement('button')
    
    input.type = 'text'
    input.name = `${this.gallery.dataset.name}[${this.images.length}]`
    img.src = imgSrc
    input.value = imgSrc
    fig.classList.add('gallery__fig')
    img.classList.add('gallery__img')
    input.classList.add('gallery__input')
    close.classList.add('gallery__close')
    close.classList.add('gallery__btn')
    fig.appendChild(img)
    fig.appendChild(input)
    fig.appendChild(close)

    this.gallery.insertBefore(fig,this.addBtn)
    this.images.push(fig)
  }
}

const galleryConatiner = document.getElementById('galleryContainer')
if (galleryConatiner) {
  const gallery = new Gallery(galleryConatiner, 'addBtn', 'gallery__fig')
  gallery.init()
}


class Image {
  constructor(figID){
    this.fig = figID
    this.inputText = this.fig.getElementsByTagName('input')[0]
    this.image = this.fig.getElementsByTagName('img')[0]
  }

  openMediaSingle = (e) => {
    // console.log(e.target)
    // this.target = element
    if (this.wp_media_s) {
      this.wp_media_s.open();
      return;
    }
    this.wp_media_s = wp.media.frames.wp_media_s = wp.media({
      title: this.fig.dataset.title,
      button: {
        text: this.fig.dataset.button
      },
    })
    this.wp_media_s.on('select', () => {
      
      const attachment = this.wp_media_s.state().get('selection').first().toJSON();
      this.setImage(attachment.url)
    })
    this.wp_media_s.open();
  }

  setImage = (url) => {
    // this.inputText.value = srcB
    // this.image = srcB
    this.fig.getElementsByTagName('input')[0].value = url
    if (this.fig.getElementsByTagName('img')[0]) { 

      this.fig.getElementsByTagName('img')[0].src = url
    } else {
      const img = document.createElement('img')
      img.src = url
      img.classList.add('gallery__img')
       this.fig.appendChild(img)
    }
    
  }

  // handleClick = (e) => {
    
  // }
  init = () => {
    this.fig.addEventListener('click', this.openMediaSingle) 
  }
}
const imageField = document.getElementById('imageField')
if (imageField) {

  const imageFieldset = new Image(imageField)
  
  imageFieldset.init()
}

class List {
  constructor (list,tnoid) {
    this.list = list
    this.btn = document.getElementById(tnoid)    
  }
  handleClick = (e) => {
    if (e.target === this.btn) this.add()
    if (e.target.classList.contains('list__remove')) this.remove(e.target.closest('.'))
  }
  
  init() {
    this.list.addEventListener('click',this.handleClick)
  }
}
const list = document.getElementById('imageField')
if (list) {

  const listInstance = new List(list,'listBtn')
  
  listInstance.init()
}
