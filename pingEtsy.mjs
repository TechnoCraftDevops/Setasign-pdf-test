import fetch from "node-fetch";

export async function ping() {
    const requestOptions = {
        'method': 'GET',
        'headers': {
            'x-api-key': '1aa2bb33c44d55eeeeee6fff',
        },
    };

    const response = await fetch(
        'https://api.etsy.com/v3/application/openapi-ping',
        requestOptions
    );

    //console.log(await response.json())

    if (response.ok) {
        return await response.json();
    } else {
        return await response.json();
    }
    
}