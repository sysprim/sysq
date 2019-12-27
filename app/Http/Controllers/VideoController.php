<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;
use App\Video;

class VideoController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index(){

        $videos = Video::all();
        
        return view('video.indexVideo', ['video'=>$videos]);
    }

    public function register(){
        return view('video.registerVideo');
    }

    public function save(Request $request){

        $validate = $this->validate($request, [
            'video_path'  => 'required|mimes:mp4'
        ]);
        

        $video_path     = $request->file('video_path');
        $description    = $request->input('description');

        $video = new Video();

        $video->description_video = $description;
        
        //subir Imagen

        if($video_path){

            $video_path_name = time().$video_path->getClientOriginalName();

            Storage::disk('videos')->put($video_path_name, File::get($video_path)); //Guardar imagen en la carpeta image en storage

            $video->video_path  = $video_path_name;
        }

        $video->save();

        return redirect()->route('index.video')->with([
            'message'=>'El video ha sido subido correctamente !!'
        ]);
      }
    


    public function delete(Request $request){
        
        $id = $request->input('id');
        
        $video = Video::find($id);

            //Eliminar ficheros de imagen de storage
        if($video){

            Storage::disk('videos')->delete($video->video_path);

            //Eliminar registro de la imagen

            $video->delete();

            $message = array('message'=>'Se ha borrado el video');

        }else{

            $message = array('message'=>'No se ha podido borrar el video');

        }

        return redirect()->route('index.video')->with($message);   
    }

    public function search($id){

        $video = Video::find($id);
        $videoAll = Video::all();

        return view('turn.turnPanel',[  'video'=>$videoAll,
                                        'videoPanel'=>$video]);
    }

    public function getVideo($filename){

            $file = Storage::disk('videos')->get($filename);
            return new Response($file, 200);
    }
}
