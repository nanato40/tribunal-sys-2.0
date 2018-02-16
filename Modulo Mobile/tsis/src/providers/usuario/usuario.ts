import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';
/*
  Generated class for the UsuarioProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class UsuarioProvider {

  public URL = "http://localhost:8000/admin";
  constructor(public http: HttpClient) {
    
  }

    logar(data):Observable<any>{
      return this.http.post(this.URL+"/usuario/logarMobile", data);
    }

}
