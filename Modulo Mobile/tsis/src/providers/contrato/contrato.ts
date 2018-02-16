import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import {Observable} from 'rxjs/Observable';
/*
  Generated class for the ContratoProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ContratoProvider {

  public URL = "http://localhost:8000/admin";
  constructor(public http: HttpClient) {
    
  }

   
    usuarioContratos(data):Observable<any>{
      return this.http.post(this.URL+"/contratos/contratosMobile", data);
    }

    deletarContrato(data){
      return this.http.post(this.URL+"/contratos/deletar", data);
    }

}
