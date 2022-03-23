import axios from 'axios';

export const new_news = (title, description) => {
    return axios.post('/new-post', {
                title,
                description
            });
}

export const destroy = (id) => {
    return axios.delete(`/delete-news/${id}`);
}

export const update_news = (id, title, description) => {
    return axios.patch(`/edit-post/${id}`, {
        title,
        description
    })
}
