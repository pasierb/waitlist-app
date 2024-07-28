export class EmailInput {
    constructor({data}) {
        this.data = data;
    }

    _input() {
        const input = document.createElement('input');
        input.type = 'email';
        input.classList.add('input', 'input-bordered', 'join-item');
        input.value = this.data.placeholder;

        return input;
    }

    _button() {
        const button = document.createElement('button');
        button.classList.add('btn', 'btn-primary', 'join-item');
        button.innerText = this.data.button;
        button.onclick = (event) => {
            event.preventDefault();
            alert('Subscribed');
        };

        return button;
    }

    _wrapper() {
        const wrapper = document.createElement('div');
        wrapper.classList.add('join');
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
