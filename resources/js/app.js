import './bootstrap';
import Autosize from '@marcreichel/alpine-autosize';

import Alpine from 'alpinejs';
Alpine.plugin(Autosize);

window.Alpine = Alpine;

Alpine.start();
