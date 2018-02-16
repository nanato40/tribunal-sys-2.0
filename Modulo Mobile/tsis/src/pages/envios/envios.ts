import { Component } from '@angular/core';
import { IonicPage, NavController,LoadingController, NavParams } from 'ionic-angular';
import { ContratoProvider } from './../../providers/contrato/contrato';
import { Storage } from '@ionic/storage';
import { Contrato } from '../../model/contrato';
import { ToastController } from 'ionic-angular';
import { IndexPage } from '../index';




/**
 * Generated class for the EnviosPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-envios',
  templateUrl: 'envios.html',
  providers: [ContratoProvider]
})
export class EnviosPage {

  public listas:any = [];
  public contrato: Contrato[];
  constructor(public navCtrl: NavController, public navParams: NavParams,private contratoService: ContratoProvider,public loadingCtrl: LoadingController,private storage: Storage,private toastCtrl: ToastController) {
   
  }
  

  abrirPDF(pdf){
    var ref = window.open(pdf, '_blank', 'location=yes');
var myCallback = function(event) { alert(event.url); }
ref.addEventListener('loadstart', myCallback);
ref.removeEventListener('loadstart', myCallback);
  }

  
  deletarContrato(id){

    var self = this;
    let toast = this.toastCtrl.create({
      message: 'Contrato Deletado com Sucesso',
      duration: 3000,
      position: 'top'
    });

    var data = {id: id}
     
    this.contratoService.deletarContrato(data).subscribe(function infor(response){

      if(response.retorno == "OK"){
        toast.present();
        self.navCtrl.push(IndexPage)
      }else{
        toast.setMessage("Tente novamente mais tarde.")
        toast.present();
      }
  

    }), function error(error){

    }
  }
  

  ionViewDidLoad() {
    var self = this;
    

    let loading = this.loadingCtrl.create({
      content: 'Aguarde...'
    });
  
    loading.present();

    self.storage.get('id').then((dat) => {
      var data = {id: dat}
      this.contratoService.usuarioContratos(data).subscribe(function infor(response){

        if(response.retorno == "NO"){
          
          loading.dismiss();
          console.log(response);
              
        }else{
        
         self.contrato = response;
       
          
         for(var i in self.contrato){
        self.listas.push(self.contrato[i]);
          
      }
         
         
         loading.dismiss();
        }
  
      }), function error(error){
  
      }
    });

    
  }

}
