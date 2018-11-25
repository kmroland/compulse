import $ from "jquery";
const form = $("#jscontactForm");
const contactButtonNode = $("#jsContactButton");
const messageNode = $("#jsContactMessage");

class Form {
    /**
     * Creates an instance of a Form class
     * @param  {HtmlFormElement} form
     * @return {self}
     */
    constructor(form) {
        this.form = form;
    }
    /**
     * Submits this form
     */
    submit() {
        this.beforeRequest();
        const url = this.form.attr("action");

        $.ajax({ method: "POST", data: this.getData(), url })
            .fail(this.handleErrors.bind(this))
            .done(this.handleSuccess.bind(this))
            .always(this.afterRequest.bind(this));
    }
    /**
     * Invoke this callback before each request
     */
    beforeRequest() {
        //clear any errors
        messageNode.html("");
        // disable the button
        contactButtonNode.prop("disabled", true);
        //cache the existing  button html
        contactButtonNode.text("Sending ...");
    }
    /**
     * Invoke this request after every request
     */
    afterRequest() {
        contactButtonNode.prop("disabled", false);
        contactButtonNode.text("Send Message");
    }
    /**
     * Handle form errors
     * @param  {Object} options.responseJSON
     */
    handleErrors({ responseJSON }) {
        const { errors } = responseJSON;
        const errorMarkUp = ["<ul>"];
        $.each(errors, (field, fieldErrors) => {
            fieldErrors.map(error => {
                errorMarkUp.push(`<li class="text-accent"> ${error} </li>`);
            });
        });
        errorMarkUp.push("</ul>");
        messageNode.html(errorMarkUp.join(""));
    }
    /**
     * Success callback*/
    handleSuccess() {
        messageNode.html(
            `<div class="alert alert-primary">
                    Message Was sent successfully
            </div>`
        );
        this.form.trigger("reset");
    }
    /**
     * Gets the form data
     * @return {Object}
     */
    getData() {
        const data = {};
        this.form.serializeArray().forEach(({ name, value }) => {
            data[name] = value;
        });
        return data;
    }
}

form.on("submit", function(event) {
    event.preventDefault();
    new Form(form).submit();
});
