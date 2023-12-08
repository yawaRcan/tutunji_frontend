<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    //add agent information
    public function addAgent(){
        return view('admin.pages.agent.add-agent');
    }
    //save agent information
    public function storeAgent(Request $request){
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|digits:10',

        ]);

        if ($validator->fails()) {
            return redirect('/admin/add-agent')->withErrors($validator)->withInput();
        }else{
            $agentData = new Agent(array(
                'fullName' => $request->get('fullName'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
            ));
            $agentData->save();
            return redirect('/admin/list-agent')->with('success','Success! Agent Added.');
        }
    }
    //list agent
    public function show_agent(){
        $agentData = Agent::query()->orderBy('id','desc')->get();
        return view('admin.pages.agent.list-agent',compact('agentData'));
    }
    //edit agent
    public function edit_agent($agentId){
        $agentData = Agent::query()->where('id','=',$agentId)->get();
        return view('admin.pages.agent.edit-agent',compact('agentData'));
    }
    //update agent
    public function update_agent(Request $request,$agentId){
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|digits:10',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/add-agent')->withErrors($validator)->withInput();
        }else{

            Agent::query()->where('id','=',$agentId)
                ->update(['fullName' => $request->get('fullName'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone')
                ]);
        }
        return redirect('/admin/list-agent')->with('success','Success! Agent Updated.');
    }
    //delete agent
    public function destroy_agent($agentId){
        $agentData = Agent::findOrFail($agentId);
        if($agentData){
            $agentData->delete();
            return redirect('/admin/list-agent')->with('success', 'Success! Agent Deleted.');
        }else{
            return redirect('/admin/list-agent')->with('error', 'Error! Agent not found.');
        }
    }
}
