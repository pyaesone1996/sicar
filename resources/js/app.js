import 'bootstrap';
import $ from 'jquery';
import Alpine from 'alpinejs';
Alpine.store("totalCount", {
    total: 0,

    update(num) {
        if (typeof num !== "number") {
            return;
        }
        this.total = num;
    },
});
window.Alpine = Alpine;
window.jQuery = $;
window.$ = $;

Alpine.start();
