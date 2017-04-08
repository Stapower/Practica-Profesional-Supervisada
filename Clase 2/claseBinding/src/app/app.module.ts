import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';
import { TypedJSON, JsonObject, JsonMember } from 'typedjson-npm/src/typed-json';

import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { Login } from '../pages/Login/Login';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
//import {RouterModule, Routes} from '@angular/router';

//array de rutas
//constante llamara RouteArray de tipo Routes (lo definimos arriba )
//const RouteArray: Routes = [{path:'login' ,component:Login},
  //                        {path:'', redirectTo: '/login', pathMatch:'full'},
    //                      {path:'**', component:PageNotFoundComponent}];

@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
   Login
   // PageNotFoundComponent
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp)//,
    //RouterModule.forRoot(RouteArray)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    Login
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
