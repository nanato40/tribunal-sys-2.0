import { Component } from '@angular/core';
import { NavController,LoadingController, ToastController} from 'ionic-angular';
import { RecuperarPage } from '../recuperar/recuperar';
import { IndexPage } from '../index/index';
import { Usuario } from '../../model/usuario';
import { UsuarioProvider } from './../../providers/usuario/usuario';
import { Storage } from '@ionic/storage';


@Component({
  selector: 'page-home',
  templateUrl: 'home.html',
  providers: [UsuarioProvider]
})
export class HomePage {

  

public usuario:Usuario;

  constructor(public navCtrl: NavController,private usuarioService: UsuarioProvider, public loadingCtrl: LoadingController, private toastCtrl: ToastController, private storage: Storage) {
    this.usuario = new Usuario(null,null,null,null,null);
    
    
  }

  

  goToRec(){
    this.navCtrl.push(RecuperarPage);
  }
  goToIndex(){

    var self = this;

//Loading
    let loading = this.loadingCtrl.create({
      content: 'Please wait...'
    });
  
    loading.present();

//Toast
    let toast = this.toastCtrl.create({
      message: 'Usuário invalido.',
      duration: 3000,
      position: 'top'
    });
  
    toast.onDidDismiss(() => {
      console.log('Dismissed toast');
    });
  
    
    var data = {email: this.usuario.email, senha: this.usuario.senha}

    this.usuarioService.logar(data).subscribe(function infor(response){

      if(response.retorno == "FALSE"){
        
        loading.dismiss();
        toast.present();        
      }else{
        
       loading.dismiss();
       self.storage.set('id', response.id);
       self.storage.set('nome', response.nome);
       self.storage.set('email', response.email);
       self.storage.set('senha', response.senha);
       self.storage.set('secao', response.secao);
       self.navCtrl.push(IndexPage);

      }

    }), function error(error){

    }
  }

}
