import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';


/*
  Generated class for the SecaoProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class SecaoProvider {

  public URL = "http://localhost:8000/admin";

  constructor(public http: HttpClient) {
    console.log('Hello SecaoProvider Provider');
  }

  listarSecoes():Observable<any>{
    
    return this.http.get("http://localhost:8000/admin/secaoMobile");
  }

}
