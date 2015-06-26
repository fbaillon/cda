// Get the div that holds the collection of pictures
var collectionHolder = $('ul.pictures');

// setup an "add a picture" link
var $addPictureLink = $('<a href="#" class="add_picture_link">Add a picture</a>');
var $newLinkLi = $('<li></li>').append($addPictureLink);

jQuery(document).ready(function() {
	// add a delete link to all of the existing picture form li elements
    collectionHolder.find('li').each(function() {
        addPictureFormDeleteLink($(this));
    });
    
	// add the "add a picture" anchor and li to the pictures ul
    collectionHolder.append($newLinkLi);

    $addPictureLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addPictureForm(collectionHolder, $newLinkLi);
    });
});

function addPictureForm(collectionHolder, $newLinkLi) {
    // Get the data-prototype we explained earlier
    var prototype = collectionHolder.attr('data-prototype');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on the current collection's length.
//    var newFormLabel = prototype.replace('__name__', 'Pictures ' + collectionHolder.children().length);
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);

    // Display the form in the page in an li, before the "Add a picture" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    
    // add a delete link to the new form
    addPictureFormDeleteLink($newFormLi);
}

function addPictureFormDeleteLink($pictureFormLi) {
    var $removeFormA = $('<a href="#">delete this picture</a>');
    $pictureFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the picture form
        $pictureFormLi.remove();
    });
}