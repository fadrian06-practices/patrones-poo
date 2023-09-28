```java
// La interfaz de un servicio remoto.
interface ThirdPartyYouTubeLib is
    method listVideos()
    method getVideoInfo(id)
    method downloadVideo(id)

// La implementación concreta de un conector de servicio. Los
// métodos de esta clase pueden solicitar información a YouTube.
// La velocidad de la solicitud depende de la conexión a
// internet del usuario y de YouTube. La aplicación se
// ralentizará si se lanzan muchas solicitudes al mismo tiempo,
// incluso aunque todas soliciten la misma información.
class ThirdPartyYouTubeClass implements ThirdPartyYouTubeLib is
    method listVideos() is
        // Envía una solicitud API a YouTube.

    method getVideoInfo(id) is
        // Obtiene metadatos de algún video.

    method downloadVideo(id) is
        // Descarga un archivo de video de YouTube.

// Para ahorrar ancho de banda, podemos guardar en caché
// resultados de la solicitud durante algún tiempo, pero se
// puede colocar este código directamente dentro de la clase de
// servicio. Por ejemplo, puede haberse proporcionado como parte
// de la biblioteca de un tercero y/o definido como `final`. Por
// eso colocamos el código de almacenamiento en caché dentro de
// una nueva clase proxy que implementa la misma interfaz que la
// clase servicio. Delega al objeto de servicio únicamente
// cuando deben enviarse las solicitudes reales.
class CachedYouTubeClass implements ThirdPartyYouTubeLib is
    private field service: ThirdPartyYouTubeLib
    private field listCache, videoCache
    field needReset

    constructor CachedYouTubeClass(service: ThirdPartyYouTubeLib) is
        this.service = service

    method listVideos() is
        if (listCache == null || needReset)
            listCache = service.listVideos()
        return listCache

    method getVideoInfo(id) is
        if (videoCache == null || needReset)
            videoCache = service.getVideoInfo(id)
        return videoCache

    method downloadVideo(id) is
        if (!downloadExists(id) || needReset)
            service.downloadVideo(id)

// La clase GUI, que solía trabajar directamente con un objeto
// de servicio, permanece sin cambios siempre y cuando trabaje
// con el objeto de servicio a través de una interfaz. Podemos
// pasar sin riesgo un objeto proxy en lugar de un objeto de
// servicio real, ya que ambos implementan la misma interfaz.
class YouTubeManager is
    protected field service: ThirdPartyYouTubeLib

    constructor YouTubeManager(service: ThirdPartyYouTubeLib) is
        this.service = service

    method renderVideoPage(id) is
        info = service.getVideoInfo(id)
        // Representa la página del video.

    method renderListPanel() is
        list = service.listVideos()
        // Representa la lista de miniaturas de los videos.

    method reactOnUserInput() is
        renderVideoPage()
        renderListPanel()

// La aplicación puede configurar proxies sobre la marcha.
class Application is
    method init() is
        aYouTubeService = new ThirdPartyYouTubeClass()
        aYouTubeProxy = new CachedYouTubeClass(aYouTubeService)
        manager = new YouTubeManager(aYouTubeProxy)
        manager.reactOnUserInput()
```
