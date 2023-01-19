import sanityClient from '@sanity/client';
import imageUrlBuilder from '@sanity/image-url';

export const client = sanityClient({
  projectId: process.env.REACT_APP_SANITY_PROJECT_ID,
  dataset: 'production',
  apiVersion: '2023-01-01',
  useCdn: true,
  token: process.env.REACT_APP_SANITY_PROJECT_TOKEN,
});


const api_url = process.env.REACT_APP_BACKEND_ENDPOINT
const api_token = process.env.REACT_APP_BACKEND_TOKEN

export const api = (endpoint, method='get') => {
  const api_endpoint = `${api_url}/api${endpoint}`

  const headers = new Headers({
    "Content-Type": "application/json",
    'Accept': 'application/json',
    "x-api-token": api_token,
  });

  return fetch(api_endpoint, {
    method: method, 
    headers: headers
  })

}

const builder = imageUrlBuilder(client);

// export const urlFor = (source) => builder.image(source);
export const urlFor = (source) =>  `${api_url}/uploads/img/${source}`