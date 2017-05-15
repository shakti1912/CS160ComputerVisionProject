from multiprocessing import Pool
from subprocess import call
from sys import argv
import os
from functools import partial

def call_long_running_openCV( path, videoID, file_num):
    program_path = '~/Downloads/OpenFace/build/bin/FaceLandmarkImg -f '
    #input_file_path='/home/shakti/PycharmProjects/shaktiisdude/80/'
    gen_file_name = videoID+'.'+str(file_num)+'.png'
    #print gen_file_name
    command = [program_path , path, '/', gen_file_name,' -ofdir ', path]
    #print str1
    str1 = ''.join(command)
    print str1
    #print command
    os.system(str1)
if __name__=='__main__':
    pool = Pool(processes=4)
    path = argv[1]
    videoID = argv[2]
    func = partial(call_long_running_openCV, path, videoID)

    print pool.map(func, range(1,int(argv[3])))
    pool.close()
    pool.join()