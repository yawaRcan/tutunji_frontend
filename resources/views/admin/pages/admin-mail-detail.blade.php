<html>
    <head>
        <title>New Submit Property Mail</title>
    </head>
<body>
<h2>Welcome to, Tutunjirealty</h2>
<h3>Your Property Details are Given Below</h3>
<table border="1">
    <tr>
        <th width="30%">Property Title</th>
        <td>{{($details['title']) ? $details['title'] : '-'}}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{($details['description']) ? $details['description'] : '-'}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{($details['price']) ? $details['price'] : '-'}}</td>
    </tr>
{{--    <tr>--}}
{{--        <th>Media</th>--}}
{{--        <td><img src="{{asset('frontend/assets/property-media/'.$details->image)}}" height="100px" width="100px"></td>--}}
{{--    </tr>--}}
    <tr>
        <th>After Price Label</th>
        <td>{{($details['after_price_label']) ? $details['after_price_label'] : '-'}}</td>
    </tr>
    <tr>
        <th>Before Price Label</th>
        <td>{{($details['before_price_label']) ? $details['before_price_label'] : '-'}}</td>
    </tr>
    <tr>
        <th>Category</th>
        <td>{{($details['category']) ? $details['category'] : '-'}}</td>
    </tr>
    <tr>
        <th>Listed In</th>
        <td>{{($details['listed_in']) ? $details['listed_in'] : '-'}}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{($details['address']) ? $details['address'] : '-'}}</td>
    </tr>
    <tr>
        <th>City</th>
        <td>{{($details['city']) ? $details['city'] : '-'}}</td>
    </tr>
    <tr>
        <th>Neighborhood</th>
        <td>{{($details['neighborhood']) ? $details['neighborhood'] : '-'}}</td>
    </tr>
    <tr>
        <th>Zip Code</th>
        <td>{{($details['zip']) ? $details['zip'] : '-'}}</td>
    </tr>
    <tr>
        <th>Country_state</th>
        <td>{{($details['country_state']) ? $details['country_state'] : '-'}}</td>
    </tr>
    <tr>
        <th>Country</th>
        <td>{{($details['country']) ? $details['country'] : '-'}}</td>
    </tr>
    <tr>
        <th>Latitude</th>
        <td>{{($details['latitude']) ? $details['latitude'] : '-'}}</td>
    </tr>
    <tr>
        <th>Longitude</th>
        <td>{{($details['longitude']) ? $details['longitude'] : '-'}}</td>
    </tr>
    <tr>
        <th>Enable Google Street View</th>
        <td>{{($details['enable_google_street_view']) ? $details['enable_google_street_view'] : '-'}}</td>
    </tr>
    <tr>
        <th>Google Street View</th>
        <td>{{($details['google_street_view']) ? $details['google_street_view'] : '-'}}</td>
    </tr>
    <tr>
        <th>Size In Ft2</th>
        <td>{{($details['size_in_ft2']) ? $details['size_in_ft2'] : '-'}}</td>
    </tr>
    <tr>
        <th>Lot Size In Ft2</th>
        <td>{{($details['lot_size_in_ft2']) ? $details['lot_size_in_ft2'] : '-'}}</td>
    </tr>
    <tr>
        <th>Rooms</th>
        <td>{{($details['rooms']) ? $details['rooms'] : '-'}}</td>
    </tr>
    <tr>
        <th>Bedrooms</th>
        <td>{{($details['bedrooms']) ? $details['bedrooms'] : '-'}}</td>
    </tr>
    <tr>
        <th>Bathrooms</th>
        <td>{{($details['bathrooms']) ? $details['bathrooms'] : '-'}}</td>
    </tr>
    <tr>
        <th>Custom Id</th>
        <td>{{($details['custom_id']) ? $details['custom_id'] : '-'}}</td>
    </tr>
    <tr>
        <th>Year Built</th>
        <td>{{($details['year_built']) ? $details['year_built'] : '-'}}</td>
    </tr>
    <tr>
        <th>Garages</th>
        <td>{{($details['garages']) ? $details['garages'] : '-'}}</td>
    </tr>
    <tr>
        <th>Available From</th>
        <td>{{($details['available_from']) ? $details['available_from'] : '-'}}</td>
    </tr>
    <tr>
        <th>Garage Size</th>
        <td>{{($details['garage_size']) ? $details['garage_size'] : '-'}}</td>
    </tr>
    <tr>
        <th>External Construction</th>
        <td>{{($details['external_construction']) ? $details['external_construction'] : '-'}}</td>
    </tr>
    <tr>
        <th>Basement</th>
        <td>{{($details['basement']) ? $details['basement'] : '-'}}</td>
    </tr>
    <tr>
        <th>Exterior Material</th>
        <td>{{($details['exterior_material']) ? $details['exterior_material'] : '-'}}</td>
    </tr>
    <tr>
        <th>Roofing</th>
        <td>{{($details['roofing']) ? $details['roofing'] : '-'}}</td>
    </tr>
    <tr>
        <th>Floors No</th>
        <td>{{($details['floors_no']) ? $details['floors_no'] : '-'}}</td>
    </tr>
    <tr>
        <th>Structure Type</th>
        <td>{{($details['structure_type']) ? $details['structure_type'] : '-'}}</td>
    </tr>
    <tr>
        <th>Owner Agent Note</th>
        <td>{{($details['owner_agent_note']) ? $details['owner_agent_note'] : '-'}}</td>
    </tr>
    <tr>
        <th>Property Status</th>
        <td>{{($details['property_status']) ? $details['property_status'] : '-'}}</td>
    </tr>
    <tr>
        <th>Amenities Feature</th>
        <td>{{($details['amenities_feature']) ? $details['amenities_feature'] : '-'}}</td>
    </tr>
    <tr>
        <th>Video From</th>
        <td>{{($details['video_from']) ? $details['video_from'] : '-'}}</td>
    </tr>
    <tr>
        <th>Embed Video Id</th>
        <td>{{($details['embed_video_id']) ? $details['embed_video_id'] : '-'}}</td>
    </tr>
    <tr>
        <th>Virtual Tour</th>
        <td>{{($details['virtual_tour']) ? $details['virtual_tour'] : '-'}}</td>
    </tr>
    <tr>
        <th>SubUnits</th>
        <td>{{($details['subunits']) ? $details['subunits'] : '-'}}</td>
    </tr>
    <tr>
        <th>UserId</th>
        <td>{{($details['user_id']) ? $details['user_id'] : '-'}}</td>
    </tr>
    <tr>
        <th>Property Type</th>
        <td>{{($details['property_type']) ? $details['property_type'] : '-'}}</td>
    </tr>
    <tr>
        <th>Internal Status</th>
        <td>{{($details['internal_status']) ? $details['internal_status'] : '-'}}</td>
    </tr>
</table>
<h2>Thank You</h2>
</body>
</html>
{{--<p>--}}
{{--    title :- {{$details['title']}}--}}
{{--</p>--}}
{{--<p>--}}
{{--    description :- {{$details['description']}}--}}
{{--</p>--}}
{{--<p>--}}
{{--    Thank you--}}
{{--</p>--}}
