import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import {RouterModule, Routes} from '@angular/router';

//array de rutas
//constante llamara RouteArray de tipo Routes (lo definimos arriba )
const RouteArray:Routes = [{path:'login' ,component:LoginComponent},
                          {path:'', redirectTo: '/login', pathMatch:'full'},
                          {path:'**', component:PageNotFoundComponent}];


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    PageNotFoundComponent
    
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot(RouteArray)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
