export class TextInput {
    static get toolbox() {
        return {
            title: 'Text Input',
        };
    }
    constructor({data}) {
        this.data = data;
    }

    _input() {
        const input = document.createElement('input');
        input.type = 'text';
        input.classList.add('input', 'input-bordered');
        // input.value = this.data.placeholder;
        input.name = `data[${this.data.label}]`

        return input;
    }

    _label() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('label');

        const span = document.createElement('span');
        span.classList.add('label-text');
        span.innerHTML = this.data.label || 'Label';

        wrapper.appendChild(span);

        return wrapper
    }

    _wrapper() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('form-control', 'w-full', 'max-w-sm');
        wrapper.appendChild(this._label());
        wrapper.appendChild(this._input());

        return wrapper;
    }

    render() {
        return this._wrapper();
    }

    save(blockContent) {
        return {
        };
    }
}
