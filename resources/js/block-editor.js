import EditorJS from '@editorjs/editorjs'
import Header from '@editorjs/header';
import List from "@editorjs/list";
import Embed from '@editorjs/embed';
import SimpleImage from "@editorjs/simple-image";
import {EmailInput} from './blockeditor/email-input';
import {TextInput} from './blockeditor/text-input';

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

function bootstrap() {
    const holder = document.getElementById('editorjs');
    const editor = createEditor(holder);

    document.addEventListener('block-editor-save', (event) => {
        editor.save().then((data) => {
            event.detail.callback(data);
        });
    });
}

document.addEventListener('DOMContentLoaded', bootstrap);
