const Ziggy = {"url":"http:\/\/passwordless.localhost","port":null,"defaults":{},"routes":{"auth.login":{"uri":"auth\/login","methods":["GET","HEAD"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
