package com.shenyubao.yunhai.ui;

import com.shenyubao.yunhai.R;

import android.content.Context;
import android.os.Bundle;
import android.support.v4.app.ListFragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class MenuListFragm extends ListFragment{
	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
		return inflater.inflate(R.layout.menu_list ,null);
	}
	
	public void onActivityCreated(Bundle savedInstanceState) {
		super.onActivityCreated(savedInstanceState);
		MenuAdapter adapter = new MenuAdapter(getActivity());
		
		for (int i = 0; i < 3; i++) {
			adapter.add(new MenuItem("Sample", R.drawable.ic_action_github));
		}
		
		setListAdapter(adapter);
	}
	
	//²Ëµ¥Ïî
	public class MenuItem {
		public String tag;
		public int iconRes;
		public MenuItem(String tag, int iconRes) {
			this.tag = tag; 
			this.iconRes = iconRes;
		}
	}
	
	//²Ëµ¥ÊÊÅäÆ÷
	public class MenuAdapter extends ArrayAdapter<MenuItem>{
		public MenuAdapter(Context context){
			super(context, 0);
		}
		
		public View getView(int position, View convertView, ViewGroup parent){
			if(convertView == null){
				convertView = LayoutInflater.from(getContext()).inflate(R.layout.menu_row, null);
			}
			
			ImageView icon = (ImageView)convertView.findViewById(R.id.row_icon);
			icon.setImageResource(getItem(position).iconRes);
			
			TextView textView = (TextView)convertView.findViewById(R.id.row_title);
			textView.setText(getItem(position).tag);
			
			return convertView;
		}
		
	}

}
