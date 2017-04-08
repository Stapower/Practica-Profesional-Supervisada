import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Flashlight } from '@ionic-native/flashlight';

@Component({
  selector: 'page-contact',
  templateUrl: 'contact.html'
})

export class ContactPage {

//constructor(public navCtrl: NavController) {
constructor(private flashlight: Flashlight) {}
  

  flash()
  {
      console.log("hola");
      this.flashlight.switchOn().then(
      function (success) { console.log(success)},
      function (error) { console.log(error)}
      );
  }

}



/*
var estaElFlash = false;
  this.flash=function(){
    if (estaElFlash){
        $cordovaFlashlight.toggle()
      .then(function (success) { /* success  },
        function (error) { /* error  });
    }
  }*/


