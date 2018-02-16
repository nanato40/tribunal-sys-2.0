import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { HttpClientModule } from '@angular/common/http';
import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { IndexPage } from '../pages/index/index';
import { RecuperarPage } from '../pages/recuperar/recuperar';
import { DownloadPage } from '../pages/download/download';
import { EnviosPage } from '../pages/envios/envios';
import { IonicStorageModule } from '@ionic/storage';
import { EnviarPage } from '../pages/enviar/enviar';
import { PerfilPage } from '../pages/perfil/perfil';
import { UsuarioProvider } from '../providers/usuario/usuario';
import { ContratoProvider } from '../providers/contrato/contrato';
import { SecaoProvider } from '../providers/secao/secao';



@NgModule({
  declarations: [
    MyApp,
    HomePage,
    RecuperarPage,
    IndexPage,
    DownloadPage,
    EnviosPage,
    EnviarPage,
    PerfilPage
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    IonicModule.forRoot(MyApp),
    IonicStorageModule.forRoot()
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    RecuperarPage,
    IndexPage,
    DownloadPage,
    EnviosPage,
    EnviarPage,
    PerfilPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    UsuarioProvider,
    ContratoProvider,
    SecaoProvider
  ]
})
export class AppModule {}
