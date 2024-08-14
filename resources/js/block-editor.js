import EditorJS from '@editorjs/editorjs'
import Header from '@editorjs/header';
import List from "@editorjs/list";
import Embed from '@editorjs/embed';
import SimpleImage from "@editorjs/simple-image";
import {EmailInput} from './blockeditor/email-input';
import {TextInput} from './blockeditor/text-input';
import {Faq} from './blockeditor/faq';
import {Features} from './blockeditor/features';

function createEditor(holder) {
    const data = JSON.parse(holder.dataset.data);

    return new EditorJS({
        holder,
        data,
        tools: {
            embed: {
                class: Embed,
            },
            header: Header,
            'email-input': EmailInput,
            'text-input': TextInput,
            image: SimpleImage,
            faq: Faq,
            features: Features,
            list: {
                class: List,
                inlineToolbar: true,
                config: {
                    defaultStyle: 'unordered'
                }
            },
        },
        onChange(api, event) {
            api.saver.save().then((outputData) => {
                document.dispatchEvent(new CustomEvent('block-editor-change', {detail: {data: outputData}}));
            });
        }
    });
}

function createSuccessEditor(holder) {
    const data = JSON.parse(holder.dataset.data);

    return new EditorJS({
        holder,
        data,
        tools: {
            embed: {
                class: Embed,
            },
            header: Header,
            image: SimpleImage,
            list: {
                class: List,
                inlineToolbar: true,
                config: {
                    defaultStyle: 'unordered'
                }
            },
        },
        onChange(api, event) {
            api.saver.save().then((outputData) => {
                document.dispatchEvent(new CustomEvent('success-editor-change', {detail: {data: outputData}}));
            });
        }
    });
}

function bootstrap() {
    const holder = document.getElementById('editorjs');
    const editor = createEditor(holder);

    createSuccessEditor(document.getElementById('success-editorjs'));
}

document.addEventListener('DOMContentLoaded', bootstrap);
