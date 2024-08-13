export class Faq {
    static get toolbox() {
        return {
            title: 'Email Input',
        };
    }

    constructor({data}) {
        this.data = data;
    }

    render() {
        return this._wrapper();
    }

    save(blockContent) {
        return this.data;
    }

    _item(itemData) {
        const item = document.createElement('div');
        item.classList.add('faq-item', 'border', 'bg-base-100');
        item.innerHTML = `
            <div class="faq-item-question flex flex-row">
                <div>Q:</div>
                <div contenteditable>${itemData.question}</div>
            </div>
            <div class="faq-item-answer flex flex-row">
                <div>A:</div>
                <div contenteditable>${itemData.answer}</div>
            </div>
        `;

        return item;
    }

    _wrapper() {
        const wrapper = document.createElement('div');

        this.data.items.forEach(item => {
            wrapper.appendChild(this._item(item));
        });

        return wrapper;
    }
}
