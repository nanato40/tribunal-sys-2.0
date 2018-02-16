import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Storage } from '@ionic/storage';


/**
 * Generated class for the EnviarPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-enviar',
  templateUrl: 'enviar.html',
})
export class EnviarPage {

  public usuario = [{nome:"",email:"",secao:"",modelo:""}]
  constructor(public navCtrl: NavController, public navParams: NavParams, private storage: Storage) {
  }

  ionViewDidLoad() {
    
    var self = this;

    self.storage.get('nome').then((val) => {
      this.usuario['nome'] = val;
    });
    self.storage.get('email').then((val) => {
      this.usuario['email'] = val;
    });

    self.storage.get('secao').then((val) => {
      this.usuario['secao'] = val;
    });

  }
  

}
