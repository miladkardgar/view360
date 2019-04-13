/*
    krpano Flash AS3 Plugin Example
    for the mxmlc compiler
*/

package
{
    import flash.display.*;
    import flash.text.*;
    import flash.events.*;
    import flash.utils.*;
    import flash.system.*;
    
    [SWF(width="200", height="200", backgroundColor="#000000")]
    public class pluginexample extends Sprite
    {
        // krpano and plugin interfacing objects
        public var krpano : Object = null;
        public var plugin : Object = null;

        private var xml_value : Number = 100.0;  // the value for a custom xml attribute
        private var text : TextField = null;     // example content (text)

        public function pluginexample()
        {
            if (stage == null)
            {
                // normal startup when loaded as plugin inside krpano
                // do nothing here, wait for the 'registerplugin' call from krpano
            }
            else
            {
                // direct/standalone startup - show the plugin information / version
                stage.scaleMode = "noScale";
                stage.align = "TL";

                var txt:TextField = new TextField();
                txt.defaultTextFormat = new TextFormat("_sans",14,0xFFFFFF,false,false,false,null,null,"center");
                txt.autoSize = "center";
                txt.htmlText = "krpano\npluginexample\nversion 1.0";
                addChild(txt);

                var resizefu:Function = function(event:Event=null):void
                {
                    txt.x = (stage.stageWidth - txt.width)/2;
                    txt.y = (stage.stageHeight - txt.height)/2;
                }

                stage.addEventListener(Event.RESIZE, resizefu);

                resizefu();
            }
        }

        // registerplugin - startup point for the plugin (required)
        // - krpanointerface = krpano interface object
        // - pluginpath = the fully qualified plugin name (e.g. "plugin[name]")
        // - pluginobject = the xml plugin object itself
        public function registerplugin(krpanointerface:Object, pluginfullpath:String, pluginobject:Object):void
        {
            // get the krpano interface and the plugin object
            krpano = krpanointerface;
            plugin = pluginobject;
            
            // first - say hello
            krpano.trace(1, "hello from plugin[" + plugin.name + "]");

            // add plugin attributes
            plugin.registerattribute("mode", "normal");
            plugin.registerattribute("value", xml_value, value_setter, value_getter);

            // add plugin action (the attribute needs to be lowercase!)
            plugin.dosomething = action_dosomething;

            // optionally - add some graphical content:

            // register the size of the content
            plugin.registercontentsize(200,200);

            // draw a background (on the plugin itself)
            var g:Graphics = this.graphics;
            g.beginFill(0x0A3264, 0.5);
            g.drawRect(0,0, 200,200);
            g.endFill();

            // add a textfield
            text = new TextField();
            text.defaultTextFormat = new TextFormat("_sans",14,0xFFFFFF,false,false,false,null,null,"center");
            text.autoSize = "center";
            text.multiline = true;
            text.mouseEnabled = false;
            text.htmlText = "Flash<br>TEST PLUGIN<br>click me";

            // the plugin itself is already a Flash Sprite Object,
            // so to add addtional Flash DisplayObjects
            // just add them to the plugin itself (to this):
            this.addChild(text);
        }

        // unloadplugin - exit point for the plugin (optionally)
        // - will be called from krpano when the plugin will be removed
        // - everything that was added by the plugin should be removed here
        public function unloadplugin():void
        {
            plugin = null;
            krpano = null;
        }

        // onresize (optionally)
        // - width,height = the new size for the plugin
        // - when not defined then only the krpano plugin html element will be sized
        // - can be used to resize sub elements manually
        // return:
        // - return true to let krpano scale the plugin automatically
        // - return false to disable any automatic scaling
        public function onresize(width:int, height:int):Boolean
        {
            // redraw the background with the new size
            var g:Graphics = this.graphics;
            g.clear();
            g.beginFill(0x0A3264, 0.5);
            g.drawRect(0,0, width,height);
            g.endFill();

            // center the text element
            text.x = width/2 - text.textWidth/2;
            text.y = height/2 - text.textHeight/2;

            return false;   // don't do any automatically scaling
        }

        private function value_setter(newvalue:Number):void
        {
            if (newvalue != xml_value)
            {
                krpano.trace(1, "'value' will be changed from " + xml_value + " to " + newvalue);
                xml_value = newvalue;
            }
        }

        private function value_getter():Number
        {
            return xml_value;
        }

        private function action_dosomething(...rest):void
        {
            // trace the given action arguments
            krpano.trace(1, "dosomething() was called with " + rest.length + " arguments:");
            for (var i:int=0; i < rest.length; i++)
                krpano.trace(1, "arguments[" + i + "]=" + rest[i]);

            // trace some infos
            krpano.trace(1, "mode=" + plugin.mode);
            krpano.trace(1, "lookat=" + krpano.view.hlookat + " / " + krpano.view.vlookat);

            // call krpano actions
            plugin.accuracy = 1;    // disable grid fitting for smoother size changes
            krpano.call("tween(width|height, 500|100)", plugin);
            krpano.call("lookto(0,0,150); wait(1.0); lookto(90,0,90);");
            krpano.call("tween(width|height, 200|200)", plugin);
        }
    }
}
