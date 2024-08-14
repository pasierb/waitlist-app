type ParagraphBlock = {
    type: "paragraph";
    data: {
        text: string;
    }
};

type HeadingBlock = {
    type: "heading";
    data: {
        text: string;
        level: 1 | 2 | 3 | 4;
    }
};

type ListBlock = {
    type: "list";
    data: {
        style: "ordered" | "unordered";
        items: string[];
    }
};

type TextInputBlock = {
    type: "text-input";
    data: {
        label: string;
        placeholder: string;
    };
};

type EmailInputBlock = {
    type: "email";
    data: {
        buttonLabel: string;
        placeholder: string;
    };
};

type FAQBlock = {
    type: "faq";
    data: {
        items: {
            question: string;
            answer: string;
        }[]
    }
}

type Output = {
    blocks: Array<ParagraphBlock | HeadingBlock | ListBlock | TextInputBlock | FAQBlock | EmailInputBlock>;
};
