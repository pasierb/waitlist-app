export class EmailInput {
    static get toolbox() {
        return {
            title: 'Email Input',
        };
    }
    constructor({data}) {
        this.data = data;
    }

    _input() {
        const input = document.createElement('input');
        input.type = 'email';
        input.classList.add('input', 'input-bordered', 'join-item', 'grow');
        input.value = this.data.placeholder;

        return input;
    }

    _button() {
        const button = document.createElement('button');
        button.classList.add('btn', 'btn-primary', 'join-item');
        button.innerText = this.data.button;
        button.onclick = (event) => {
            event.preventDefault();
            const value = window.prompt('Enter button label', this.data.button);
            if (value !== null) {
                button.innerText = value;
            }
        };

        return button;
    }

    _wrapper() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('join', 'w-full', 'max-w-sm', 'flex');
        wrapper.appendChild(this._input());
        wrapper.appendChild(this._button());

        return wrapper;
    }

    render() {
        return this._wrapper();
    }

    save(blockContent) {
        return {
            placeholder: blockContent.querySelector('input').value,
            button: blockContent.querySelector('button').innerText,
        };
    }
}
