import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Storage } from '@ionic/storage';
import { Contrato } from '../../model/contrato';
import { SecaoProvider } from './../../providers/secao/secao';
/**
 * Generated class for the PerfilPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-perfil',
  templateUrl: 'perfil.html',
  providers: [SecaoProvider]
})
export class PerfilPage {

  public usuario = [{nome:"",email:""}];

  constructor(public navCtrl: NavController, public navParams: NavParams, private storage: Storage,private secaoService: SecaoProvider) {
    this.usuario;
  }

  ionViewDidLoad() {
    
    var self = this;

    self.storage.get('nome').then((val) => {
      this.usuario['nome'] = val;
    });
    self.storage.get('email').then((val) => {
      this.usuario['email'] = val;
    });

    this.secaoService.listarSecoes().subscribe(function res(response){

      console.log(response);

  });

  }

}
