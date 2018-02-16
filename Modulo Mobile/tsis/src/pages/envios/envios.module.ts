import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { EnviosPage } from './envios';

@NgModule({
  declarations: [
    EnviosPage,
  ],
  imports: [
    IonicPageModule.forChild(EnviosPage),
  ],
})
export class EnviosPageModule {}
