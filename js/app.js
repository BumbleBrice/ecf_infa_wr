class Slideshow{
    constructor(id, imgs){
        this.idSlide = id;
        this.imgs = imgs;

        this.domSlide = document.getElementById(this.idSlide);
        this.domImg = this.domSlide.querySelector('img');
        this.domPrev = this.domSlide.querySelector('div .prevBtn');
        this.domNext  = this.domSlide.querySelector('div .nextBtn');
        this.domPause  = this.domSlide.querySelector('div .pauseBtn');

        this.timer = null;

        this.imgNumber = 0;
      
        // Gestionnaires d'événements et Action !
        document.addEventListener('keydown', this.keyboard.bind(this));
        this.domPrev.addEventListener('click', this.prevImage.bind(this));
        this.domNext.addEventListener('click', this.nextImage.bind(this));
        this.domPause.addEventListener('click', this.playPause.bind(this));
      
        this.playPause();
    }
    
    /* Fonction bouton prev */
    prevImage() {
        this.imgNumber--;
        if (this.imgNumber < 0) {
            this.imgNumber = this.imgs.length - 1;
        }
        this.domImg.src = this.imgs[this.imgNumber];
    }

    /* fonction bouton next */
    nextImage() {
        this.imgNumber++;
        if (this.imgNumber > (this.imgs.length - 1)) {
            this.imgNumber = 0;
        }
        this.domImg.src = this.imgs[this.imgNumber];
    }
  
    /* Fonction clavier */
    keyboard(e){
        switch(e.keyCode){
            case 37: // left
                this.nextImage();
                break;
            case 39: // right
                this.prevImage();
                break;
            case 32: // space (or any key)
                this.playPause();
                break;
        }
    }
  
    /* Fonction slider auto + bouton play / pause */
    playPause() {
        if (this.timer) {
            clearInterval(this.timer);
            this.timer = null;
            this.domPause.className = "playBtn";
        } else {
            this.timer = setInterval(this.nextImage.bind(this), 2000);
            this.domPause.className = "pauseBtn";
        }
    }
}

const path = 'https://bumbleweb.net/mlp/'
var slide = new Slideshow(
    'slideshow', 
    [ path+"mlp1.jpg",
      path+"mlp2.jpg",
      path+"mlp3.jpg",
      path+"mlp4.jpg",
      path+"mlp5.jpg",
      path+"mlp6.jpg",
      path+"mlp7.jpg" ]
);