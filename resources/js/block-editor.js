import EditorJS from '@editorjs/editorjs'
import Header from '@editorjs/header';
import List from "@editorjs/list";
import {EmailInput} from './blockeditor/email-input';
import {TextInput} from './blockeditor/text-input';

function createEditor() {
    const holder = document.getElementById('editorjs');

    const data = JSON.parse(holder.dataset.data);

    const editor = new EditorJS({
        holder,
        data,
        tools: {
            header: Header,
            'email-input': EmailInput,
            'text-input': TextInput,
            list: {
                class: List,
                inlineToolbar: true,
                config: {
                    defaultStyle: 'unordered'
                }
            },
        }
    });
    return editor;
}

function bootstrap() {
    const editor = createEditor();

    document.addEventListener('block-editor-save', (event) => {
        editor.save().then((data) => {
            event.detail.callback(data);
        });
    });
}

document.addEventListener('DOMContentLoaded', bootstrap);
