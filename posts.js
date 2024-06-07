import { Post } from "./src/components/posts.js"

const renderPost = item => `
    <div>
        ${item.title}
        <br>${item.body}
        <br>ID пользователя: ${item.userId}
        <br>ID поста: ${item.id}
    </div>
    <p><br></P>
`;

const renderComment = item => {
    let res = `Комментарии:`;
    for(let i = 0; i < item.length; i++) {
        res += `
            <div>
                ${item[i].email} 
                <br>${item[i].name} 
                <br>${item[i].body}
                <br>ID комментария: ${item[i].id}
                <br>ID поста: ${item[i].postId}
            </div>
            <p></P>`;
    }
    return res;
};

const getPost = async (id) => {
    try {
        const res = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`);
        return await res.json();
    }
    catch(err) {
        console.log(err);
    }
};

const getComments = async (id) => {
    try {
        const res = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}/comments`);
        return await res.json();
    }
    catch(err) {
        console.log(err);
    }
};

const init = () => {
    const post = document.getElementById('post');
    const comment = document.querySelector('.comments-post');
    new Post(post, comment, {
        renderPost: renderPost,
        getPost: getPost,
        getComments: getComments,
        renderComment: renderComment
    }).init()
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    init()
}