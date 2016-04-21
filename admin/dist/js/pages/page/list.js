/**
 * Created by v.ahmedjanov on 21.04.2016.
 */


(function ($) {

   $('a .fa-eraser').click(
       function () {
           return confirm("Удалить элемент");
       }
   );

}(jQuery));


