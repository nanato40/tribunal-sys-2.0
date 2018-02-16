import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { DownloadPage } from '../download/download';
import { Storage } from '@ionic/storage';
import { EnviosPage } from '../envios/envios';
import { EnviarPage } from '../enviar/enviar';
import { PerfilPage } from '../perfil/perfil';

/**
 * Generated class for the IndexPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-index',
  templateUrl: 'index.html',
})
export class IndexPage {

 

  constructor(public navCtrl: NavController, public navParams: NavParams, public storage: Storage) {
    
  }

  

  downloadPage(){
    this.navCtrl.push(DownloadPage);
  }
  meusEnvios(){
    this.navCtrl.push(EnviosPage);
  }
  enviarPage(){
    this.navCtrl.push(EnviarPage);
  }
  perfilPage(){
    this.navCtrl.push(PerfilPage);
  }


}
