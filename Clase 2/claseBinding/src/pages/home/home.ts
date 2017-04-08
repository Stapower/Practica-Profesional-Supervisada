import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(public navCtrl: NavController) {

  }

}



export class Login {
user = {};
constructor(public navCtrl: NavController){}
Login(){
          console.log(this.user);
       }
}