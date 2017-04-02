import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  constructor() { }
  ngOnInit() {
  }

}

export class Usuario {
user = "";
 pass = "";

  set SetUser(val) {
    this.user = val;

  }
   get GetUser() {
    return this.user;
  }

  set SetPass(val) {
    this.user = val;

  }
   get GetPass() {
    return this.user;
  }

  public loggear()
  {
    console.log(this.user + this.pass);
  }

}

function test()
{
  alert("test");
}

	function hacer_click()
	{
		alert("Me haz dado un click");
	}
